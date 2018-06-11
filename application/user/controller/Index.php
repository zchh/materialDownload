<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11
 * Time: 10:24
 */

namespace app\user\controller;

use app\common\model\AdminToken;
use app\common\model\Config;
use app\common\model\File;
use app\common\model\MaterialWebsite;
use app\common\model\Notice;
use app\common\model\User;
use app\common\selfConfig\NumberConfig;
use think\Controller;
use think\Cookie;
use think\Request;;
use app\admin\controller\Base;
use think\Db;
use app\common\selfConfig\StatusCode;
use app\common\model\Admin;
use app\common\selfConfig\TableConfig;
use think\Session;

class Index extends Base
{
    public function _initialize(){
        //校验登录
        if(false == Session::has('user')){
             $userId = Cookie::get('user_id');
             $password = Cookie::get('password');
             if(false == isset($userId) || false == isset($password) || $userId == '' || $password == ''){
                 $this->redirect('/user/login');
             }
             $user = User::findEntity($userId);
             if(true == empty($user)){
                 $this->redirect('/user/login');
             }
             if($user['password'] != $password){
                 $this->redirect('/user/login');
             }
             Session::set('user', $user);
        }
    }

    /**
     * 网站首页
     */
    public function index()
    {
        $user = Session::get('user');
        unset($user['password']);
        $user['permission'] = explode(',', $user['permission']);
        $str = '';
        if(false == empty($user['permission'])){
            foreach ($user['permission'] as $single){
                $param['website_id'] = $single;
                $entity = MaterialWebsite::findEntityByParam($param);
                $singleStr = '['.$entity['website_name'].']';
                $str .= $singleStr.' ';
                $user['permissionArr'][] = $entity;
            }
        }
        $user['permissionStr'] = $str;
        $param['config_key'] = StatusCode::TEACHING_VIDEO_CONFIG;
        $config = Config::findEntity($param);
        $user['video_url'] = $config['config_value'];
        unset($param);
        $param['is_open'] = 1;
        $user['noticeArr'] =  Notice::selectEntity($param);
        $userEntity = User::findEntity($user['user_id']);
        $user['rest_download_times'] = $userEntity['rest_download_times'];
        return $this->fetch('/index', $user);
    }

    /**
     * 解析下载
     */
    public function analysis()
    {
        try{
            set_time_limit(0);
            $requestParam = Request::instance()->param();
            if(true == empty($requestParam['url'])){
                $this->alert('服务器错误');
            }
            $user = Session::get('user');
            $userEntity = User::findEntity($user['user_id']);
            if($userEntity['status'] == 0){
                $this->alert('您的账号目前还未激活');
            }
            if($userEntity['rest_download_times'] == 0){
                $this->alert('您达到今天下载次数的上限');
            }
            //查看本地数据库
            $param['download_url'] = $requestParam['url'];
            $fileEntity = File::findEntity($param);
            if(false == empty($fileEntity)){
                if (!file_exists($fileEntity['file_url'])) {
                    $this->alert('服务器错误');
                } else {
                    $this->downloadToBrowser($requestParam['url']);
                }
            }
            unset($param);
            $param['config_key'] = NumberConfig::QIAN_TU_LOGIN_STATUS;
            $config = Config::findEntity($param);
            if($config['config_value'] == 0){ //未登录状态
                $this->subLogin($requestParam['url']);
            }
            //登录状态
            $data = $this->requestPython(NumberConfig::PY_DOWNLOAD_URL, $requestParam['url']);
            if($data['code'] == '200'){
                $this->downloadToBrowser($requestParam['url']);
            }
            $this->alert('服务器错误');
        }catch (\Exception $e){
            $this->alert('服务器错误');
        }
    }

    //三方登录调用python登录
    private function subLogin($url)
    {
        $data = $this->requestPython(NumberConfig::PY_LOGIN_URL, null);
        if($data['code'] == '200'){
            $update['config_value'] = 1;
            Config::updateEntity(NumberConfig::QIAN_TU_LOGIN_STATUS, $update);
            unset($data);
            $data = $this->requestPython(NumberConfig::PY_DOWNLOAD_URL, $url);
            if($data['code'] == '200'){
                $this->downloadToBrowser($url);
            }elseif($data['code'] == '500'){
                $this->alert($data['msg']);
            }else{
                $this->alert('服务器错误');
            }
        }
        $this->alert('服务器错误');
    }


    //下载
    private function downloadToBrowser($downloadUrl)
    {
        Db::startTrans();
        try{
            $param['download_url'] = $downloadUrl;
            $fileEntity = File::findEntity($param);
            $file = fopen($fileEntity['file_url'], "r");
            Header("Accept-Ranges: bytes");
            Header("Accept-Length: " . filesize($fileEntity['file_url']));
            $user = Session::get('user');
            Header("Content-type: application/octet-stream");
            $fileName = $user['user_id'].'-'.time().'.zip';
            Header("Content-Disposition: attachment; filename=".$fileName);
            echo fread($file, filesize($fileEntity['file_url']));
            //记录下载
            fclose($file);
            $userEntity = User::findEntity($user['user_id']);
            $updateArr['rest_download_times'] = $userEntity['rest_download_times'] - 1;
            User::updateEntity($user['user_id'], $updateArr);
            exit ();
        }catch (\Exception $e){
            Db::rollback();
        }
    }

    //请求python接口
    private function requestPython($url, $param)
    {
        $ch = curl_init();
        if(false == empty($param)){
            $url .= "?url=$param";
        }
        curl_setopt($ch, CURLOPT_URL, $curl = $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        $data = (array)json_decode($output);
        curl_close($ch);
        return $data;
    }

    /**
     * 文件下载
     */
    public function downloadFile()
    {
        $requestParam = Request::instance()->param();
        $relativePath = $requestParam['file'];
        if (!file_exists($relativePath)) {
            echo "文件找不到";
            exit ();
        } else {
            //打开文件
            $file = fopen($relativePath, "r");
            //输入文件标签
            Header("Content-type: application/octet-stream");
            Header("Accept-Ranges: bytes");
            Header("Accept-Length: " . filesize($relativePath));
            Header("Content-Disposition: attachment; filename=" . $relativePath);
            //输出文件内容
            //读取文件内容并直接输出到浏览器
            echo fread($file, filesize($relativePath));
            fclose($file);
            exit ();
        }
    }

    public function buyAccount()
    {
        return $this->fetch('/buy_account');
    }

    public function contactService()
    {
        return $this->fetch('/contact_service');
    }




}