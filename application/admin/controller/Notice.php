<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11
 * Time: 14:28
 */
namespace app\admin\controller;

use app\common\model\City;
use app\common\model\MaterialLibrary;
use app\common\selfConfig\StatusCode;
use http\Env\Response;
use think\Controller;
use think\Session;
use think\Request;
use app\common\model\User as UserModel;
use app\admin\controller\Base;
use app\common\model\Provincial;
use app\common\model\MaterialWebsite as MaterialWebsiteModel;
use app\common\model\Config as ConfigModel;
use think\Cookie;
use app\common\model\Admin as AdminModel;

class Notice extends Base
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
        $result['data'] = \app\common\model\Notice::selectEntity();
        $result['activeType'] = 7;
        return $this->fetch('/notice', $result);
    }

    public function add()
    {
        $requestParam = Request::instance()->param();
        if(empty($requestParam['notice_content'])){
            return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::PARAM_WRONG);
        }
        if(false == isset($requestParam['is_open']) || $requestParam['is_open'] == ''){
            return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::PARAM_WRONG);
        }
        $num = \app\common\model\Notice::addEntity($_POST);
        if($num == 0)
            return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::SERVER_ERRO_MESSAGE);
        return $this->selfResponse(StatusCode::CREATED_SUCCESS,StatusCode::CREATED_SUCCESS_MESSAGE);
    }

    public function edit($id)
    {
        $requestParam = Request::instance()->param();
        if(empty($requestParam['notice_content'])){
            return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::PARAM_WRONG);
        }
        if(false == isset($requestParam['is_open']) || $requestParam['is_open'] == ''){
            return $this->selfResponse(StatusCode::SERVER_ERROR,StatusCode::PARAM_WRONG);
        }
        unset($_POST['id']);
        \app\common\model\Notice::updateEntity($id, $_POST);
        return $this->alert(StatusCode::UPDATE_SUCCESS_MESSAGE);
    }






}