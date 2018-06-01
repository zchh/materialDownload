<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 10:33
 */

namespace app\common\model;

use app\common\selfConfig\TableConfig;
use think\Db;
use think\Model;

class MaterialWebsite extends Model
{

    public static function selectEntity($param = [])
    {
        $whereSql = '';
        $query = Db::name(TableConfig::MATERIAL_WEBSITE)->alias('u');
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

    public static function findEntityByParam($param)
    {
        $whereSql = '';
        $query = Db::name(TableConfig::MATERIAL_WEBSITE)->alias('u');
        $whereParam = array();
        if(false == empty($param['website_id'])){
            $whereSql .= 'website_id=:website_id';
            $whereParam['website_id'] = $param['website_id'];
        }
        $data = $query->where($whereSql)->bind($whereParam)->find();
        return $data;
    }

    public static function addEntity($arr)
    {
        return  Db::table(TableConfig::MATERIAL_WEBSITE)->insertGetId($arr);
    }

    public static function updateEntity($configKey, $arr)
    {
        $num = Db::table(TableConfig::MATERIAL_WEBSITE)->where('config_key', $configKey)->update($arr);
        return $num;
    }

    public static function deleteEntity($id)
    {
        $num = Db::table(TableConfig::MATERIAL_WEBSITE)->delete($id);
        return $num;
    }

}