<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 11:18
 */

namespace app\admin\controller;

use app\common\selfConfig\NumberConfig;
use app\common\selfConfig\StatusCode;
use http\Env\Response;
use think\Controller;
use think\Cookie;
use think\Session;
use think\Request;
use app\common\model\User as UserModel;
use app\admin\controller\Base;
use app\common\model\Admin as AdminModel;


class Admin extends Base
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

    public function index()
    {
        $param['role'] = 2;
        $admin = AdminModel::selectAdmin($param);
        foreach ($admin as $k=>$v){
            unset($admin[$k]['password']);
        }
        $result['data'] = $admin;
        $result['activeType'] = 1;
        $admin = Session::get('admin');
        ($admin['role'] == 1) ? $result['admin'] = 1 : null;
        return $this->fetch('/admin', $result);
    }

    public function add()
    {
        $requestParam = Request::instance()->param();
        if(empty($requestParam['username']) || empty($requestParam['password']) || empty($requestParam['email']) || empty($requestParam['tel'])){
            return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::PARAM_WRONG);
        }
        $param['username'] = $requestParam['username'];
        $admins = AdminModel::selectAdmin($param);
        if(false == empty($admins)){
            return $this->selfResponse(StatusCode::SERVER_ERROR,'此管理员名已存在，请重新录入！');
        }
        $_POST['role'] = 2;
        $num = AdminModel::addEntity($_POST);
        if($num == 0)
            return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::SERVER_ERRO_MESSAGE);
        return $this->selfResponse(StatusCode::CREATED_SUCCESS,StatusCode::CREATED_SUCCESS_MESSAGE);
    }

    public function edit($id)
    {
        $requestParam = Request::instance()->param();
        if(empty($requestParam['username']) || empty($requestParam['email']) || empty($requestParam['tel']))
            return $this->alert(StatusCode::PARAM_WRONG);
        unset($_POST['id']);
        AdminModel::updateAdmin($id, $_POST);
        return $this->alert(StatusCode::UPDATE_SUCCESS_MESSAGE);
    }


}