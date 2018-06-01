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

class Admin extends Model
{
    public static function selectAdmin($param = null)
    {
        $whereSql = '';
        $query = Db::name(TableConfig::ADMIN_TABLE)->alias('u');
        $whereParam = array();
        if(false == empty($param['role'])){
            $whereSql .= 'role=:role';
            $whereParam['role'] = $param['role'];
        }
        if(false == empty($param['username'])){
            (false == empty($whereSql))?($whereSql.= ' and '):null;
            $whereSql .= 'username=:username';
            $whereParam['username'] = $param['username'];
        }
        $result = $query->where($whereSql)->bind($whereParam)->select();
        return $result;
    }

    public static function addEntity($arr)
    {
        $arr['password'] = password_hash($arr['password'], PASSWORD_DEFAULT);
        return  Db::table(TableConfig::ADMIN_TABLE)->insertGetId($arr);
    }

    public static function findAdmin($param)
    {
        $whereSql = '';
        $query = Db::name(TableConfig::ADMIN_TABLE)->alias('u');
        $whereParam = array();
        if(false == empty($param['role'])){
            $whereSql .= 'role=:role';
            $whereParam['role'] = $param['role'];
        }
        if(false == empty($param['username'])){
            (false == empty($whereSql))?($whereSql.= ' and '):null;
            $whereSql .= 'username=:username';
            $whereParam['username'] = $param['username'];
        }
        $result = $query->where($whereSql)->bind($whereParam)->find();
        return $result;
    }

    public static function getAdminByAdminId($adminId)
    {
        return Db::table(TableConfig::ADMIN_TABLE)->where('admin_id', $adminId)->find();
    }

    public static function updateAdmin($adminId, $arr)
    {
        $num = Db::table(TableConfig::ADMIN_TABLE)->where('admin_id', $adminId)->update($arr);
        return $num;
    }

    public static function deleteAdmin($adminId)
    {
        $num = Db::table(TableConfig::ADMIN_TABLE)->delete($adminId);
        return $num;
    }
}