<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 15:52
 */

namespace app\admin\controller;

use app\common\selfConfig\StatusCode;
use http\Env\Response;
use think\Controller;
use think\Session;
use think\Request;
use app\common\model\User as UserModel;
use app\admin\controller\Base;
use app\common\model\MaterialWebsite as MaterialWebsiteModel;
use app\common\model\Config as ConfigModel;
use think\Cookie;
use app\common\model\Admin as AdminModel;

class MaterialWebsite extends Base
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
        $result['data'] = MaterialWebsiteModel::selectEntity();
        $result['activeType'] = 3;
        return $this->fetch('/material_website',$result);
    }



}