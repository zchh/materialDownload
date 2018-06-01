<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/13
 * Time: 9:55
 */
namespace app\common\model;

use app\common\selfConfig\TableConfig;
use think\Db;
use think\Model;

class User extends Model
{
    public static function selectEntity($param = [])
    {
        $whereSql = '';
        $query = Db::name(TableConfig::USER)->alias('u');
        $whereParam = array();
        if(false == empty($param['account_number'])){
            $whereSql .= 'account_number=:account_number';
            $whereParam['account_number'] = $param['account_number'];
        }
        if(false == empty($param['password'])){
            (false == empty($whereSql))?($whereSql.= ' and '):null;
            $whereSql .= 'password=:password';
            $whereParam['password'] = $param['password'];
        }
        if(false == empty($param['keywords'])){
            (false == empty($whereSql))?($whereSql.= ' and '):null;
            $keywords = $param['keywords'];
            $whereSql .= "account_number like :keywords1 or phone_number like :keywords2 or mailbox like :keywords3";
            $whereParam['keywords1'] = $whereParam['keywords2'] = $whereParam['keywords3'] = "%$keywords%";
        }
        if(false == empty($param['open_time'])){
            (false == empty($whereSql))?($whereSql.= ' and '):null;
            $whereSql .= 'open_time>=:open_time';
            $whereParam['open_time'] = $param['open_time'];
        }
        if(false == empty($param['end_time'])){
            (false == empty($whereSql))?($whereSql.= ' and '):null;
            $whereSql .= 'open_time<=:end_time';
            $whereParam['end_time'] = $param['end_time'];
        }
        if(isset($param['status']) &&  $param['status'] != ''){
            (false == empty($whereSql))?($whereSql.= ' and '):null;
            $whereSql .= 'status=:status';
            $whereParam['status'] = $param['status'];
        }
        $data = $query->where($whereSql)->bind($whereParam)->select();
        return $data;
    }

    public static function findEntity($id)
    {
        return Db::table(TableConfig::USER)->where('user_id', $id)->find();
    }

//    public static function findEntityByParam($param)
//    {
//        $whereSql = '';
//        $query = Db::name(TableConfig::USER)->alias('u');
//        $whereParam = array();
//        if(false == empty($param['user_id']))
//        return Db::table(TableConfig::USER)->where('user_id', $id)->find();
//    }

    public static function addEntity($arr)
    {
        return  Db::table(TableConfig::USER)->insertGetId($arr);
    }

    public static function updateEntity($id, $arr)
    {
        $num = Db::table(TableConfig::USER)->where('user_id', $id)->update($arr);
        return $num;
    }

    public static function deleteEntity($id)
    {
        $num = Db::table(TableConfig::USER)->delete($id);
        return $num;
    }


    public static function checkIDPassword($id,$password){
        $user = User::findEntity($id);
        if(empty($user)){
            return false;
        }
        else{
            //校验密码
            $result = password_verify($user['password'],$password);//未加密 加密
            if($result){
                return $user;
            }
            else{
                return false;
            }

        }
    }
}