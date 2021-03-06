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

class File extends Model
{
    public static function selectFile($param)
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
        if(false == empty($param['page']) && false == empty($param['pageSize'])){ //分页
            if(false == empty($whereSql)){
                $result['data'] = $query->where($whereSql)->bind($whereParam)->page($param['page'], $param['pageSize'])->select();
                $countQuery = $query->where($whereSql)->bind($whereParam)->select();
            }else{
                $result['data'] = $query->page($param['page'], $param['pageSize'])->select();
                $countQuery = $query->where($whereSql)->select();
            }
            $result['count'] = count($countQuery);
        }else{ //不分页
            if(false == empty($whereSql)){
                $result['data'] = $query->where($whereSql)->bind($whereParam)->select();
            }else{
                $result['data'] = $query->select();
            }
            $result['count'] = count($result['data']);
        }
        return $result;
    }

    public static function findEntity($param)
    {
        $whereSql = '';
        $query = Db::name(TableConfig::FILE_TABLE)->alias('u');
        $whereParam = array();
        if(false == empty($param['download_url'])){
            $whereSql .= 'download_url=:download_url';
            $whereParam['download_url'] = $param['download_url'];
        }
        return $query->where($whereSql)->bind($whereParam)->find();
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