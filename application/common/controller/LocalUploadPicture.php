<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/29
 * Time: 15:53
 */

namespace app\common\controller;


use gmars\qiniu\Qiniu;
use think\Config;
use think\Controller;
use think\Exception;

class LocalUploadPicture extends Controller
{
    public static function upload($file)
    {
        if($file){
            $path = DS .'static' .DS. 'uploads'.DS;
            $info = $file->move(ROOT_PATH . 'public' . $path);
            if($info){
                return '..\..'.$path.$info->getSaveName();
            }else{
                return false;
            }
        }
    }

    public static function unlink($path)
    {
        return is_file($path) && unlink($path);
    }


}