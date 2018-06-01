<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 20:36
 */

namespace app\user\controller;

use app\common\model\Config;
use think\Session;
use think\Request;
use app\common\selfConfig\StatusCode;

class User extends \app\user\controller\Base
{
    public function resetPassword()
    {
        if(false == Session::has('user')){
            $this->redirect('/user/login');
        }
        $requestParam = Request::instance()->param();
        if(empty($requestParam['phone_number']) || empty($requestParam['code']) || empty($requestParam['newPassword']) || empty($requestParam['newPassword2'])){
            return $this->selfResponse(StatusCode::SERVER_ERROR, StatusCode::PARAM_WRONG);
        }
        //判断原来的密码是否正确
        if($requestParam['code'] != '123'){
            return $this->selfResponse(StatusCode::SERVER_ERROR, '验证码错误！');
        }
        if($requestParam['newPassword'] != $requestParam['newPassword2']){
            return $this->selfResponse(StatusCode::SERVER_ERROR, '两次输入新密码不一致');
        }
        $updateArr['password'] =$requestParam['newPassword'];
        $user = Session::get('user');
        \app\common\model\User::updateEntity($user['user_id'], $updateArr);
        return $this->selfResponse(StatusCode::UPDATE_SUCCESS, '密码修改成功');
    }

    public function bind()
    {
        $requestParam = Request::instance()->param();
        if(empty($requestParam['type'])){
            return $this->selfResponse(StatusCode::SERVER_ERROR, StatusCode::PARAM_WRONG);
        }
        $user = Session::get('user');
        if($requestParam['type'] == 1){
            if(empty($requestParam['phone_number']) || empty($requestParam['code'])) {
                return $this->selfResponse(StatusCode::SERVER_ERROR, StatusCode::PARAM_WRONG);
            }
            if($requestParam['code'] != '123') {
                return $this->selfResponse(StatusCode::SERVER_ERROR, '验证码错误！');
            }
            $updateArr['phone_number'] = $requestParam['phone_number'];
            \app\common\model\User::updateEntity($user['user_id'], $updateArr);
            return $this->selfResponse(StatusCode::UPDATE_SUCCESS, '绑定手机号成功！');
        }
        if($requestParam['type'] == 2) {
            if(empty($requestParam['mailbox'])) {
                return $this->selfResponse(StatusCode::SERVER_ERROR, StatusCode::PARAM_WRONG);
            }
//            dump($this->selfResponse(StatusCode::SERVER_ERROR, StatusCode::PARAM_WRONG));
            $updateArr['mailbox'] = $requestParam['mailbox'];
            \app\common\model\User::updateEntity($user['user_id'], $updateArr);
            return $this->selfResponse(StatusCode::UPDATE_SUCCESS, '绑定邮箱成功！');
        }
        return $this->selfResponse(StatusCode::SERVER_ERROR, '参数错误');
    }

    public function shop()
    {
        $param['config_key'] = StatusCode::SHOP_URL_CONFIG;
        $config = Config::findEntity($param);
        return $this->fetch('/shop', $config);
    }






}