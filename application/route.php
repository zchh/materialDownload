<?php
use think\Route;
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------





/*******************************************************后台管理*******************************************************************/

Route::any('admin/login', 'admin/Login/adminLogin');                                                    //管理员登录
Route::any('admin/logout', 'admin/Login/logout');                                                       //管理员退出登录
Route::post('admin/resetPassword', 'admin/Login/resetPassword');                                        //管理员密码重置
Route::get('admin/admin', 'admin/admin/index');                                                         //副管理员列表
Route::post('admin/admin/add', 'admin/admin/add');                                                      //副管理员添加
Route::post('admin/admin/edit/:id', 'admin/admin/edit');                                                //副管理员编辑
Route::get('admin/material_website', 'admin/MaterialWebsite/index');                                    //素材网站列表
Route::get('admin/account', 'admin/account/index');                                                     //素材网站账号列表
Route::post('admin/account/add', 'admin/account/add');                                                  //素材网站账号添加
Route::post('admin/account/edit/:id', 'admin/account/edit');                                            //素材网站账号编辑
Route::get('admin/config/:id', 'admin/Config/index');                                                   //素材网站配置
Route::post('admin/config/edit/:id', 'admin/Config/edit');                                              //素材网站配置编辑
Route::get('admin/notice', 'admin/Notice/index');                                                       //公告列表
Route::post('admin/notice/add', 'admin/Notice/add');                                                    //添加公告
Route::post('admin/notice/edit/:id', 'admin/Notice/edit');                                              //编辑公告
Route::post('admin/delete', 'admin/AdminDelete/delete');                                                //删除
Route::get('admin/user', 'admin/user/index');                                                           //用户列表
Route::post('admin/user/add', 'admin/user/add');                                                        //用户添加
Route::post('admin/user/edit/:id', 'admin/user/edit');                                                  //用户编辑
Route::post('admin/user/active', 'admin/user/active');                                                  //用户激活
Route::get('admin/user/export', 'admin/user/export');                                                   //导出用户

/*******************************************************前台管理***********************************************************************************/

Route::any('user/analysis','user/index/analysis');                                                      //解析
Route::any('user/login','user/Login/login');                                                            //登录
Route::get('user/logout','user/Login/logout');                                                          //退出登录
Route::get('','user/Index/index');                                                                      //首页
Route::get('user/index','user/Index/index');                                                            //首页
Route::get('user/contactService','user/Index/contactService');                                          //联系客服
Route::get('user/buyAccount','user/Index/buyAccount');                                                  //购买账号
Route::post('user/resetPassword','user/User/resetPassword');                                            //重置密码
Route::post('user/bind','user/User/bind');                                                              //绑定手机号或邮箱
Route::get('user/shop','user/User/shop');                                                               //购买流程



























