<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/25
 * Time: 17:16
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
use think\Cookie;
use app\common\model\Admin as AdminModel;

class User extends Base
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
     * 账号列表
     */
    public function index()
    {
        $requestParam = Request::instance()->param();
        $result['data'] = UserModel::selectEntity($requestParam);
        foreach ($result['data'] as $k=>$v){
            $result['data'][$k]['permission'] = $this->getWebsiteByUserId($v['user_id']);
            $result['data'][$k]['days'] = '';
            if(false == empty($v['open_time']))
                $result['data'][$k]['days'] = $this->count_days($v['open_time'], $v['end_time']);
            if($v['is_permanent'] == 1)
                $result['data'][$k]['days'] = '永久';
            $result['data'][$k]['permissionStr'] = $v['permission'];
        }
        $result['websiteList'] = \app\common\model\MaterialWebsite::selectEntity();
        $result['requestParam'] = [
            'open_time' => isset($requestParam['open_time']) ? $requestParam['open_time'] : '',
            'end_time' => isset($requestParam['end_time']) ? $requestParam['end_time'] : '',
            'status' => isset($requestParam['status']) ? $requestParam['status'] : '',
            'keywords' => isset($requestParam['keywords']) ? $requestParam['keywords'] : '',
        ];
        $result['activeType'] = 2;
        return $this->fetch('/accountNumber',$result);
    }

    /**
     * 添加账号
     */
    public function add()
    {
        $requestParam = Request::instance()->param();
        if(empty($requestParam['number']) || empty($requestParam['download_times'])){
            return $this->selfResponse(StatusCode::SERVER_ERROR,  StatusCode::PARAM_WRONG);
        }
        if(false == isset($requestParam['status']) || $requestParam['status'] == ''){
            return $this->selfResponse(StatusCode::SERVER_ERROR,  StatusCode::PARAM_WRONG);
        }
        if(false == isset($requestParam['is_permanent']) || $requestParam['is_permanent'] == ''){
            return $this->selfResponse(StatusCode::SERVER_ERROR,  StatusCode::PARAM_WRONG);
        }
        if($requestParam['is_permanent'] == 0){
            if(empty($requestParam['open_time']) || empty($requestParam['end_time'])) {
                return $this->selfResponse(StatusCode::SERVER_ERROR,  StatusCode::PARAM_WRONG);
            }
        }
        $permissionStr = '';
        if(false == empty($requestParam['permission'])){
            $arr = [];
            foreach ($requestParam['permission'] as $single){
                array_push($arr, $single);
            }
            $permissionStr = implode(',', $arr);
        }
        unset($_POST['number']);
        for($i=1; $i<$requestParam['number']; $i++){
            $id = UserModel::addEntity($_POST);
            $updateArr['account_number'] = 'ACCOUNT'.$id;
            $updateArr['password'] = 'a123';
            $updateArr['permission'] = $permissionStr;
            $updateArr['rest_download_times'] = $_POST['download_times'];
            UserModel::updateEntity($id, $updateArr);
        }
        return $this->selfResponse(StatusCode::CREATED_SUCCESS,  StatusCode::CREATED_SUCCESS_MESSAGE);
    }


    /**
     * 编辑用户
     */
    public function edit($id)
    {
        $requestParam = Request::instance()->param();
        if(empty($requestParam['account_number']) || empty($requestParam['password'])){
            $this->alert('缺少参数1');
        }
        if(false == isset($requestParam['download_times']) || $requestParam['download_times'] == ''){
            $this->alert('缺少参数');
        }
        if(false == isset($requestParam['rest_download_times']) || $requestParam['rest_download_times'] == ''){
            $this->alert('缺少参数');
        }
        if(false == isset($requestParam['status']) || $requestParam['status'] == ''){
            $this->alert('缺少参数');
        }

        if(false == isset($requestParam['is_permanent']) || $requestParam['is_permanent'] == ''){
            if(empty($requestParam['open_time']) || empty($requestParam['end_time'])) {
                $this->alert('缺少参数4');
            }
        }
        $permissionStr = '';
        if(false == empty($requestParam['permission'])){
            $arr = [];
            foreach ($requestParam['permission'] as $single){
                array_push($arr, $single);
            }
            $permissionStr = implode(',', $arr);
        }
        $_POST['permission'] = $permissionStr;
        UserModel::updateEntity($id, $_POST);
        return $this->alert('修改用户信息成功');
    }

    /**
     * 激活用户
     */
    public function active()
    {
        $requestParam = Request::instance()->param();
        if(empty($requestParam['check_num'])){
            return $this->selfResponse(StatusCode::SERVER_ERROR,  '未选择要激活的用户');
        }
        $idArr = explode(',', $requestParam['check_num']);
        array_pop($idArr);
        foreach($idArr as $id){
            $updateArr['status'] = 1;
            \app\common\model\User::updateEntity($id, $updateArr);
        }
        return $this->selfResponse(StatusCode::UPDATE_SUCCESS,  '激活成功！');
    }

    public function shop()
    {
        
    }

    /**
     * 导出用户
     */
    public function export()
    {
        //获取选中的id值
        $id_array =Request::instance()->param('check_num');
        $ids = explode(',',$id_array);//所有id的组成数组
        array_pop($ids);
        Vendor('PHPExcel.Classes.PHPExcel');//调用类库,路径是基于vendor文件夹的
        Vendor('PHPExcel.Classes.PHPExcel.Worksheet.Drawing');
        Vendor('PHPExcel.Classes.PHPExcel.Writer.Excel2007');
        $objExcel = new \PHPExcel();
        $objWriter = \PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
        $objActSheet = $objExcel->getActiveSheet();
        $letter =explode(',',"A,B,C,D,E,F,G,H,I,J,K");
        $arrHeader =  array('ID','账号','密码','手机号','邮箱','开通日期','剩余开通天数','截止日期','当天剩余下载次数','账号权限','状态');
        //填充表头信息
        $lenth =  count($arrHeader);
        for($i = 0;$i < $lenth;$i++) {
            $objActSheet->setCellValue("$letter[$i]1","$arrHeader[$i]");
        };
        //填充表格信息
        $k = 2;
        foreach($ids as $id){
            $user = \app\common\model\User::findEntity($id);
            $objActSheet->setCellValue('A'.$k, $user['user_id']);
            $objActSheet->setCellValue('B'.$k, $user['account_number']);
            $objActSheet->setCellValue('C'.$k, $user['password']);
            $objActSheet->setCellValue('D'.$k, $user['phone_number']);
            $objActSheet->setCellValue('E'.$k, $user['mailbox']);
            $objActSheet->setCellValue('F'.$k, $user['open_time']);
            $days = $this->count_days($user['open_time'], $user['end_time']);
            $objActSheet->setCellValue('G'.$k, $days);
            $objActSheet->setCellValue('H'.$k, $user['end_time']);
            $objActSheet->setCellValue('I'.$k, $user['rest_download_times']);
            $permission = $this->getWebsiteByUserId($id);
            $objActSheet->setCellValue('J'.$k, $permission);
            $status = ($user['status'] == 1)?'已激活':'未激活';
            $objActSheet->setCellValue('K'.$k, $status);
            $objActSheet->getRowDimension($k)->setRowHeight(20);//表格高度
            $k +=1;
        }
        //设置表格的宽度
        $objActSheet->getColumnDimension('A')->setWidth(5);
        $objActSheet->getColumnDimension('B')->setWidth(10);
        $objActSheet->getColumnDimension('C')->setWidth(10);
        $objActSheet->getColumnDimension('D')->setWidth(15);
        $objActSheet->getColumnDimension('E')->setWidth(20);
        $objActSheet->getColumnDimension('F')->setWidth(20);
        $objActSheet->getColumnDimension('G')->setWidth(10);
        $objActSheet->getColumnDimension('H')->setWidth(20);
        $objActSheet->getColumnDimension('I')->setWidth(20);
        $objActSheet->getColumnDimension('J')->setWidth(25);
        $objActSheet->getColumnDimension('K')->setWidth(10);
        $outfile = "素材下载用户信息".date("Y-m-d").".xls";
        ob_end_clean();
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header('Content-Disposition:inline;filename="'.$outfile.'"');
        header("Content-Transfer-Encoding: binary");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        $objWriter->save('php://output');
    }

    /**
     * 编辑用户流量计划状态
     */
    public function editUserStatus()
    {
        $requestParam = Request::instance()->param();
        if(empty($requestParam['user_id']) || empty($requestParam['flow_plan_status'])){
            return $this->selfResponse(StatusCode::SERVER_ERROR,  StatusCode::PARAM_WRONG);
        }
        $updateArr['flow_plan_status'] = $requestParam['flow_plan_status'];
        UserModel::updateEntity($requestParam['user_id'], $updateArr);
        return $this->selfResponse(StatusCode::UPDATE_SUCCESS,  StatusCode::UPDATE_SUCCESS_MESSAGE);
    }
}