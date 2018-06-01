<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11
 * Time: 9:42
 */
namespace app\common\model;

use app\common\selfConfig\TableConfig;
use think\Db;
use think\Model;

class Config extends Model
{

    public static function selectEntity($param = [])
    {
        $whereSql = '';
        $query = Db::name(TableConfig::CONFIG_TABLE)->alias('u');
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
        $data = $query->where($whereSql)->bind($whereParam)->select();
        return $data;
    }

    public static function findEntity($param)
    {
        $whereSql = '';
        $query = Db::name(TableConfig::CONFIG_TABLE)->alias('u');
        $whereParam = array();
        if(false == empty($param['config_key'])){
            $whereSql .= 'config_key=:config_key';
            $whereParam['config_key'] = $param['config_key'];
        }
        $data = $query->where($whereSql)->bind($whereParam)->find();
        return $data;
    }

    public static function addEntity($arr)
    {
        return  Db::table(TableConfig::CONFIG_TABLE)->insertGetId($arr);
    }

    public static function updateEntity($configKey, $arr)
    {
        $num = Db::table(TableConfig::CONFIG_TABLE)->where('config_key', $configKey)->update($arr);
        return $num;
    }

    public static function deleteEntity($id)
    {
        $num = Db::table(TableConfig::CONFIG_TABLE)->delete($id);
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