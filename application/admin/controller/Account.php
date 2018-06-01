<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 16:20
 */

namespace app\admin\controller;

use app\common\selfConfig\NumberConfig;
use app\common\selfConfig\StatusCode;
use http\Env\Response;
use think\Controller;
use think\Session;
use think\Request;
use app\common\model\User as UserModel;
use app\admin\controller\Base;
use app\common\model\Admin as AdminModel;
use app\common\model\Account as AccountModel;
use app\common\model\MaterialWebsite;
use app\common\model\MaterialWebsite as MaterialWebsiteModel;
use think\Cookie;


class Account extends Base
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
        $result['data'] = AccountModel::selectEntity();
        foreach ($result['data'] as $k=>$v){
            $param['website_id'] = $v['type'];
            $website = MaterialWebsite::findEntityByParam($param);
            $result['data'][$k]['website'] = $website['website_name'];
        }
        $result['websiteList'] = MaterialWebsite::selectEntity();
        $result['activeType'] = 4;
        return $this->fetch('/account',$result);
    }

    public function add()
    {
        $requestParam = Request::instance()->param();
        if(empty($requestParam['account_number']) || empty($requestParam['password']) || empty($requestParam['type'])){
            return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::PARAM_WRONG);
        }
        $num = AccountModel::addEntity($_POST);
        if($num == 0)
            return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::SERVER_ERRO_MESSAGE);
        return $this->selfResponse(StatusCode::CREATED_SUCCESS,StatusCode::CREATED_SUCCESS_MESSAGE);
    }

    public function edit($id)
    {
        $requestParam = Request::instance()->param();
        if(empty($requestParam['account_number']) || empty($requestParam['password']) || empty($requestParam['type']))
            return $this->alert(StatusCode::PARAM_WRONG);
        unset($_POST['id']);
        $num = AccountModel::updateEntity($id, $_POST);
        if($num == 0)
            return $this->alert(StatusCode::SERVER_ERRO_MESSAGE);
        return $this->alert(StatusCode::UPDATE_SUCCESS_MESSAGE);
    }

}