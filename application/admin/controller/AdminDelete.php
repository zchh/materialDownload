<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/28
 * Time: 10:07
 */

namespace app\admin\controller;

use app\common\controller\LocalUploadPicture;
use app\common\selfConfig\NumberConfig;
use app\common\selfConfig\StatusCode;
use http\Env\Response;
use think\Controller;
use think\Session;
use think\Request;
use app\common\model\User as UserModel;
use app\admin\controller\Base;
use think\Cookie;
use app\common\model\Admin as AdminModel;

class AdminDelete extends Base
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
     * 删除
     */
    public function delete()
    {
        $requestParam = Request::instance()->param();
        if(empty($requestParam['id']) || empty($requestParam['type'])){
            return $this->selfResponse(StatusCode::SERVER_ERROR,  StatusCode::PARAM_WRONG);
        }
        switch ($requestParam['type']){
            case NumberConfig::DELETE_USER:
                UserModel::deleteEntity($requestParam['id']);
                return $this->selfResponse(StatusCode::DELETE_SUCCESS,  StatusCode::DELETE_SUCCESS_MESSAGE);
                break;
            case NumberConfig::DELETE_ACCOUNT:
                $num = \app\common\model\Account::deleteEntity($requestParam['id']);
                if($num == 0)
                    return $this->selfResponse(StatusCode::SERVER_ERROR,  StatusCode::HAVE_DELETED);
                else
                    return $this->selfResponse(StatusCode::DELETE_SUCCESS,  StatusCode::DELETE_SUCCESS_MESSAGE);
                break;
            case NumberConfig::DELETE_NOTICE:
                \app\common\model\Notice::deleteEntity($requestParam['id']);
                return $this->selfResponse(StatusCode::DELETE_SUCCESS,  StatusCode::DELETE_SUCCESS_MESSAGE);
                break;
            case NumberConfig::DELETE_CONFIG:
                if($requestParam['id'] == StatusCode::FRONT_BACKGROUND_PIC_CONFIG){
                    $param['config_key'] = $requestParam['id'];
                    $config = \app\common\model\Config::findEntity($param);
                    $pathStr = str_replace('..\..',ROOT_PATH.'public', $config['config_value']);
                    $result = LocalUploadPicture::unlink($pathStr);
                    if($result == false)
                        return $this->selfResponse(StatusCode::SERVER_ERROR,  StatusCode::SERVER_ERRO_MESSAGE);
                    $updateArr['config_value'] = '';
                    \app\common\model\Config::updateEntity($requestParam['id'], $updateArr);
                    return $this->selfResponse(StatusCode::DELETE_SUCCESS,  StatusCode::DELETE_SUCCESS_MESSAGE);
                    }
                if($requestParam['id'] == StatusCode::BACK_BACKGROUND_PIC_CONFIG){
                    $param['config_key'] = $requestParam['id'];
                    $config = \app\common\model\Config::findEntity($param);
                    $pathStr = str_replace('..\..',ROOT_PATH.'public', $config['config_value']);
                    $result = LocalUploadPicture::unlink($pathStr);
                    if($result == false)
                        return $this->selfResponse(StatusCode::SERVER_ERROR,  StatusCode::SERVER_ERRO_MESSAGE);
                    $result = LocalUploadPicture::unlink($config['config_value']);
                    if($result){
                        $updateArr['config_value'] = '';
                        \app\common\model\Config::updateEntity($requestParam['id'], $updateArr);
                    }
                    return $this->selfResponse(StatusCode::DELETE_SUCCESS,  StatusCode::DELETE_SUCCESS_MESSAGE);
                }
                break;
            case NumberConfig::DELETE_ADMIN:
                $num = \app\common\model\Admin::deleteAdmin($requestParam['id']);
                if($num == 0)
                    return $this->selfResponse(StatusCode::SERVER_ERROR,  StatusCode::HAVE_DELETED);
                else
                    return $this->selfResponse(StatusCode::DELETE_SUCCESS,  StatusCode::DELETE_SUCCESS_MESSAGE);
                break;
            default:
                return $this->selfResponse(StatusCode::SERVER_ERROR,  StatusCode::PARAM_WRONG);
        }
    }


}