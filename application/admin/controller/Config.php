<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11
 * Time: 14:30
 */
namespace app\admin\controller;

use app\common\controller\LocalUploadPicture;
use app\common\selfConfig\StatusCode;
use http\Env\Response;
use think\Controller;
use think\Session;
use think\Request;
use app\common\model\User as UserModel;
use app\admin\controller\Base;
use app\common\model\Config as ConfigModel;
use think\Cookie;
use app\common\model\Admin as AdminModel;


class Config extends Base
{
    public function _initialize()
    {
        //校验登录
        if(false == Session::has('admin')){
            $adminId = Cookie::get('admin_id');
            $password = Cookie::get('admin_password');
            if(false == isset($adminId) || false == isset($password) || $adminId == '' || $password == ''){
                $this->redirect('/admin/login');
            }
            $admin = AdminModel::getAdminByAdminId($adminId);
            if(true == empty($admin)){
                $this->redirect('/admin/login');
            }
            if(false == password_verify($admin['password'], $password)){
                $this->redirect('/admin/login');
            }
            Session::set('admin', $admin);
        }
    }

    /**
     * 查看配置
     * @param $id
     * @return mixed
     */
    public function index($id)
    {
        $param['config_key'] = $id;
        $config = ConfigModel::findEntity($param);
        switch ($id){
            case StatusCode::TEACHING_VIDEO_CONFIG:
                $config['activeType'] = 5;
                return $this->fetch('/teachingVideo',$config);
                break;
            case StatusCode::SHOP_URL_CONFIG:
                $config['activeType'] = 9;
                return $this->fetch('/shop_url',$config);
                break;
            case StatusCode::FRONT_BACKGROUND_PIC_CONFIG:
                $param['config_key'] = StatusCode::BACK_BACKGROUND_PIC_CONFIG;
                $config2 = ConfigModel::findEntity($param);
                $config = [
                  'front_pic'=>$config['config_value'],
                  'back_pic'=>$config2['config_value']
                ];
                $config['activeType'] = 6;
                return $this->fetch('/backgroundPic',$config);
                break;
            case StatusCode::MAIL_CONFIG:
                $param['config_key'] = StatusCode::MAIL_INFORM_CONFIG;
                $config2 = ConfigModel::findEntity($param);
                $param['config_key'] = StatusCode::MAIL_START_CONFIG;
                $config3 = ConfigModel::findEntity($param);
                $config = [
                    'mail'=>$config['config_value'],
                    'mail_inform'=>$config2['config_value'],
                    'mail_start'=>$config3['config_value']
                ];
                $config['activeType'] = 8;
                return $this->fetch('/mailboxTemplate',$config);
                break;
            default:
                $this->alert('参数错误');
                break;
        }
    }

    /**
     * 编辑配置
     */
    public function edit($id)
    {
        $requestParam = Request::instance()->param();
        if($id == StatusCode::MAIL_CONFIG){
            if(empty($requestParam['config_value'])){
                return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::PARAM_WRONG);
            }
            if(empty($requestParam['config_value_2'])){
                return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::PARAM_WRONG);
            }
            if(false == isset($requestParam['config_value_3']) || $requestParam['config_value_3'] == ''){
                return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::PARAM_WRONG);
            }
            $updateArr['config_value'] = $requestParam['config_value_2'];
            ConfigModel::updateEntity(StatusCode::MAIL_INFORM_CONFIG, $updateArr);
            $updateArr['config_value'] = $requestParam['config_value_3'];
            ConfigModel::updateEntity(StatusCode::MAIL_START_CONFIG, $updateArr);
            return $this->selfResponse(StatusCode::UPDATE_SUCCESS,StatusCode::UPDATE_SUCCESS_MESSAGE);
        }elseif($id == StatusCode::FRONT_BACKGROUND_PIC_CONFIG){
            $file = request()->file('image');
            if(empty($file)){
                return $this->alert('缺少参数');
            }
            $param['config_key'] = $id;
            $config = \app\common\model\Config::findEntity($param);
            if(false == empty($config['config_value'])){
                $pathStr = str_replace('..\..',ROOT_PATH.'public', $config['config_value']);
                $result = LocalUploadPicture::unlink($pathStr);
                if($result == false)
                    return $this->alert('服务器错误');
            }
            $result = LocalUploadPicture::upload($file);
            if($result == false)
                return $this->alert('服务器错误');
            $updateArr['config_value'] = $result;
            ConfigModel::updateEntity(StatusCode::FRONT_BACKGROUND_PIC_CONFIG, $updateArr);
            $this->alert('更换前台背景成功');
        }elseif ($id == StatusCode::BACK_BACKGROUND_PIC_CONFIG){
            $file = request()->file('image');
            if(empty($file)){
                return $this->alert('缺少参数');
            }
            $param['config_key'] = $id;
            $config = \app\common\model\Config::findEntity($param);
            if(false == empty($config['config_value'])){
                $pathStr = str_replace('..\..',ROOT_PATH.'public', $config['config_value']);
                $result = LocalUploadPicture::unlink($pathStr);
                if($result == false)
                    return $this->alert('服务器错误');
            }
            $result = LocalUploadPicture::upload($file);
            if($result == false)
                return $this->alert('服务器错误');
            $updateArr['config_value'] = $result;
            ConfigModel::updateEntity(StatusCode::BACK_BACKGROUND_PIC_CONFIG, $updateArr);
            $this->alert('更换后台背景成功');
        }else{
            if(empty($requestParam['config_value'])){
                return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::PARAM_WRONG);
            }
            $updateArr['config_value'] = $requestParam['config_value'];
            ConfigModel::updateEntity($id, $updateArr);
        }
        return $this->selfResponse(StatusCode::UPDATE_SUCCESS,StatusCode::UPDATE_SUCCESS_MESSAGE);
    }

}