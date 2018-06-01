<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 16:22
 */

namespace app\common\model;

use app\common\selfConfig\TableConfig;
use think\Db;
use think\Model;

class Account extends Model
{

    public static function selectEntity($param = [])
    {
        $whereSql = '';
        $query = Db::name(TableConfig::ACCOUNT)->alias('u');
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
        $query = Db::name(TableConfig::ACCOUNT)->alias('u');
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
        return  Db::table(TableConfig::ACCOUNT)->insertGetId($arr);
    }

    public static function updateEntity($id, $arr)
    {
        $num = Db::table(TableConfig::ACCOUNT)->where('notice_id', $id)->update($arr);
        return $num;
    }

    public static function deleteEntity($id)
    {
        $num = Db::table(TableConfig::ACCOUNT)->delete($id);
        return $num;
    }

}