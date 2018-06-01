<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/9
 * Time: 18:53
 */
namespace app\admin\controller;

use app\common\model\AdminToken;
use app\common\selfConfig\StatusCode;
use http\Env\Response;
use think\Controller;
use think\Session;
use think\Request;

class Base extends Controller
{

    //json封装
    protected function selfResponse($code, $message, $data=null)
    {
        $response['code'] = $code;
        $response['msg'] = $message;
        if($data == null && $code == StatusCode::GET_SUCCESS){
            $response['data'] = [];
        }
        if($data != null){
            $response['data'] = $data;
        }
        return json($response);
    }

    /**
     * 分页信息封装
     * @param $total          //查询结果总条数
     * @param $pageSize       //每页条数
     * @param $currentPage    //当前页数
     * @return array
     */
    protected function pageInfoConfig($total, $pageSize, $currentPage)
    {
        return  [
            'total' => (int)$total,
            'pageSize' => (int)$pageSize,
            'currentPage' => (int)$currentPage
        ];
    }

    //失败的反馈
    protected function selfFailResponse()
    {
        return $this->selfResponse(StatusCode::SERVER_ERROR, StatusCode::SERVER_ERRO_MESSAGE);
    }

    //管理员校验登录
    protected function checkAdminLogin()
    {
        $header = Request::instance()->header();
        if(empty($header['adminid']) || empty($header['token'])){
            return false;
        }
        $adminToken = AdminToken::getAdminTokenByAdminId($header['adminid']);
        if(empty($adminToken)){
            return false;
        }
        if($header['token'] != $adminToken['token'] || $adminToken['lose_time']<=time()){
            return false;
        }
        return $header['adminid'];
    }

    public function count_days($time1, $time2)
    {
        $a_dt=getdate(strtotime($time1));
        $b_dt=getdate(strtotime($time2));
        $a_new=mktime(12,0,0,$a_dt['mon'],$a_dt['mday'],$a_dt['year']);
        $b_new=mktime(12,0,0,$b_dt['mon'],$b_dt['mday'],$b_dt['year']);
        return round(abs($a_new-$b_new)/86400);
    }

    //时间戳到时间转化
    public function timeToDate($time)
    {
        return  date('Y-m-d H:i:s', $time);
    }

    public function dateToTime($date)
    {
        return strtotime($date);
    }

    //alert弹出框
    protected function alert($message = '', $return_url = null, $isLeftMenu = false)
    {
        if (is_null($return_url) && $isLeftMenu == false) {
            $return_url = '/';
            if (isset ($_SERVER ['HTTP_REFERER'])) {
                $return_url = $_SERVER ['HTTP_REFERER'];
            }
            $html = '<script>' . (empty($message) ? '' : 'alert("' . $message . '");') .'location.href="' . $return_url . '";</script>'; //内联框架内跳转
        } else{
            if(is_null($return_url)){
                if (isset ($_SERVER ['HTTP_REFERER'])) {
                    $return_url = $_SERVER ['HTTP_REFERER'];
                }
            }
            $html = '<script>' . (empty($message) ? '' : 'alert("' . $message . '");') . 'window.parent.window.location.href ="' . $return_url . '";</script>'; //跳出内联框架
        }
        header('Content-Type: text/html; charset=utf-8');
        die ($html);
    }

    //获取用户权限
    protected function getWebsiteByUserId($userId)
    {
        $user = \app\common\model\User::findEntity($userId);
        $permissionArr = explode(',', $user['permission']);
        $permissionStr = '';
        $arr = [];
        if($permissionArr[0] != ''){
            foreach ($permissionArr as $single) {
                $param['website_id'] = $single;
                $entity = \app\common\model\MaterialWebsite::findEntityByParam($param);
                array_push($arr, $entity['website_name']);
//                $str = $this->getWebsiteConfig($single);
//                $permissionStr .= ' ';
//                $permissionStr .= $str;
            }
        }
        $permissionStr = implode(',', $arr);
        return $permissionStr;
    }

    //获取素材网站
    protected function getWebsiteConfig($configId = null, $configName = null)
    {
        $config = [
            '1' => '千图网',
            '2' => '摄图网',
            '3' => '我图网',
            '4' => '千库网',
            '5' => '90设计网',
            '6' => '包图网',
        ];
        if(false == empty($configName)){
            $config = array_flip($config);
            return $config[$configName];
        }
        if(false == empty($configId)){
            return $config[$configId];
        }
        return $config;
    }

}