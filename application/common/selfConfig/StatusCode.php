<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/9
 * Time: 18:10
 */
namespace app\common\selfConfig;
class StatusCode
{
    const GET_SUCCESS                      = '200';                                      //服务器成功返回用户请求的数据
    const CREATED_SUCCESS                  = '201';                                      //用户新建数据成功。
    const UPDATE_SUCCESS                   = '201';                                      //用户修改数据成功
    const DELETE_SUCCESS                   = '204';                                      //用户删除数据成功
    const NO_PERMISSION                    = '401';                                      //表示用户没有权限（令牌、用户名、密码错误）
    const SERVER_ERROR                     = '500';                                      //服务器错误

    const GET_SUCCESS_MESSAGE              = '获取数据成功';
    const CREATED_SUCCESS_MESSAGE          = '创建数据成功';
    const UPDATE_SUCCESS_MESSAGE           = '更新数据成功';
    const DELETE_SUCCESS_MESSAGE           = '删除数据成功';
    const HAVE_DELETED                     = '该数据已不存在';

    const HAVE_SHUT_UP_MESSAGE             = '您已被禁言，此功能暂不能使用';
    const NO_PERMISSION_MESSAGE            = '无权限';
    const SERVER_ERRO_MESSAGE              = '服务器错误';
    const PICTURE_FAIL                      = '图片上传失败';
    const USERNAME_PASSWORD_WRONG          = '用户名或密码错误';
    const LOGIN_SUCCESS                     = '登录成功';
    const PLEASE_LOGIN                      = '请登录';
    const PARAM_WRONG                       = '缺少参数';
    const DOMAIN_NAME                        = 'http://p5o6x5qe1.bkt.clouddn.com';       //图片域名
    const THUMB_PIC_SUFFIX                 = '-thumb';                                   //缩略图后缀

    const CHECK_PASS                       = '1';                                        //审核通过
    const CHECK_NOT_PASS                   = '2';                                        //审核不通过

    const SUPER_ADMIN                      = '1';                                        //超级管理员
    const NORMAL_ADMIN                     = '2';                                        //普通管理员

    //配置
    const FRONT_BACKGROUND_PIC_CONFIG      = '4';                                        //前台网站背景图
    const BACK_BACKGROUND_PIC_CONFIG       = '5';                                        //后台网站背景图
    const TEACHING_VIDEO_CONFIG            = '1';                                        //教程视频网站网站
    const MAIL_CONFIG                      = '2';                                        //邮箱配置
    const MAIL_INFORM_CONFIG               = '3';                                        //邮箱通知模板配置
    const MAIL_START_CONFIG                = '8';                                        //邮箱是否开启配置
    const SHOP_URL_CONFIG                  = '9';                                        //淘宝店铺地址



}