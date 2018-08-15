<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(['prefix' => '', 'namespace' => 'Frontend'], function () {
    //前台首页
    Route::get('/', 'IndexController@index');
    //亿航微课
    Route::get('microlesson', 'IndexController@microlesson');
    //亿航微课详情
    Route::get('microlesson/{id}', 'IndexController@lessonDetail');
    //亿航微课视频
    Route::get('microlesson/video/{id}', 'IndexController@lessonVideo');
    //私教一对一
    Route::get('course', 'IndexController@course');
    //师资团队
    Route::get('teacher', 'IndexController@teacher');
    //师资详情
    Route::get('teacher/detail/{id}', 'IndexController@teacherDetail');
    //合作院校
    Route::get('partner', 'IndexController@partner');
    //登录验证
    Route::post('login', 'UserController@login');
    //身份验证
    Route::get('checkType', 'UserController@checkType');
    //退出
    Route::post('logout', 'UserController@logout');
    //退出
    Route::post('register/code', 'UserController@getcode');

    //研究生注册页面
    Route::get('register/teacher/account', 'UserController@regTeacher');
    //研究生注册验证
    Route::post('doregister/teacher/account', 'UserController@doRegTeacher');
    //研究生注册详情页面
    Route::get('register/teacher/info', 'UserController@infoTeacher')->middleware('flogin');
    //研究生注册详情验证
    Route::post('doregister/teacher/info', 'UserController@doInfoTeacher')->middleware('flogin');
    //研究生注册详情验证
    Route::get('register/teacher/success', 'UserController@successTeacher')->middleware('flogin');
    //研究生中心
    Route::get('teacherCenter', 'UserController@teacherCenter')->middleware('flogin');
    //研究生确认课程
    Route::post('teacher/change-subject-status', 'SubjectController@changeSubjectStatus')->middleware('flogin');
    //研究生添加课程详情
    Route::post('teacher/add-subject-detail', 'SubjectController@addSubjectDetail')->middleware('flogin');
    //修改课程详情状态
    Route::post('change-subject-detail-status', 'SubjectController@changeSubjectDetailStatus')->middleware('flogin');

    //考生注册页面
    Route::get('register/student/account', 'UserController@regStudent');
    //考生注册验证
    Route::post('doregister/student/account', 'UserController@doRegStudent');
    //考生注册详情页面
    Route::get('register/student/info', 'UserController@infoStudent')->middleware('flogin');
    //考生注册详情验证
    Route::post('doregister/student/info', 'UserController@doInfoStudent')->middleware('flogin');
    //考生注册成功页面
    Route::get('register/student/success', 'UserController@successStudent')->middleware('flogin');
    //考生中心
    Route::get('studentCenter', 'UserController@studentCenter')->middleware('flogin');
    //考生中心
    Route::post('student/add-subject', 'SubjectController@addSubject')->middleware('flogin');

    //用户信息修改
    Route::post('usercenter/edit', 'UserController@edit')->middleware('flogin');
    //用户头像修改
    Route::post('usercenter/upload/avatar', 'UserController@avatar')->middleware('flogin');

});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //后台首页
    Route::get('/', 'IndexController@index')->middleware('alogin');

    //登录
    Route::match(['get', 'post'], 'login', 'UserController@login');
    //退出
    Route::post('logout', 'UserController@logout');

    //合作院校
    Route::get('partner', 'PartnerController@index')->middleware('alogin');
    //院校logo上传
    Route::post('upload/partner', 'PartnerController@upload')->middleware('alogin');
    //院校添加
    Route::post('partner/store', 'PartnerController@store')->middleware('alogin');
    //院校修改展示
    Route::get('partner/show', 'PartnerController@show')->middleware('alogin');
    //院校删除
    Route::get('partner/destroy', 'PartnerController@destroy')->middleware('alogin');

    //师资团队
    Route::get('teacher', 'TeacherController@index')->middleware('alogin');
    //教师照片上传
    Route::post('upload/teacher', 'TeacherController@upload')->middleware('alogin');
    //教师添加
    Route::post('teacher/store', 'TeacherController@store')->middleware('alogin');
    //教师修改展示
    Route::get('teacher/show', 'TeacherController@show')->middleware('alogin');
    //教师删除
    Route::get('teacher/destroy', 'TeacherController@destroy')->middleware('alogin');

    //课程管理
    Route::get('course', 'CourseController@index')->middleware('alogin');
    //课程照片上传
    Route::post('upload/course', 'CourseController@upload')->middleware('alogin');
    //课程添加
    Route::post('course/store', 'CourseController@store')->middleware('alogin');
    //课程修改展示
    Route::get('course/show', 'CourseController@show')->middleware('alogin');
    //课程删除
    Route::get('course/destroy', 'CourseController@destroy')->middleware('alogin');

    //轮播管理
    Route::get('banner', 'BannerController@index')->middleware('alogin');
    //轮播上传
    Route::post('upload/banner', 'BannerController@upload')->middleware('alogin');
    //轮播添加
    Route::post('banner/store', 'BannerController@store')->middleware('alogin');
    //轮播修改展示
    Route::get('banner/show', 'BannerController@show')->middleware('alogin');
    //轮播删除
    Route::get('banner/destroy', 'BannerController@destroy')->middleware('alogin');

    //考生管理
    Route::get('student', 'StudentController@index')->middleware('alogin');

    //老用户管理
    Route::get('olduser', 'OlduserController@index')->middleware('alogin');

    //管理员管理
    Route::get('adminuser', 'AdminuserController@index')->middleware('alogin');
    //添加管理员
    Route::post('adminuser/store', 'AdminuserController@store')->middleware('alogin');
    //禁用管理员
    Route::get('adminuser/disable', 'AdminuserController@disable')->middleware('alogin');
    //启用管理员
    Route::get('adminuser/enabled', 'AdminuserController@enabled')->middleware('alogin');

    //研究生管理
    Route::get('postgraduate', 'PostgraduateController@index')->middleware('alogin');
    //分配研究生
    Route::get('postgraduate/distribute', 'PostgraduateController@distribute')->middleware('alogin');
    Route::get('postgraduate/searchdist', 'PostgraduateController@searchdist')->middleware('alogin');

    //督学管理
    Route::get('supervise', 'SuperviseController@index')->middleware('alogin');

});
