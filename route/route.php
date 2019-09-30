<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

Route::get('/about/qq123', 'about/index');

Route::get('/about/sayhi', 'about/index/sayhi');

Route::get('/about/user', 'about/index/user');
Route::post('/about/create', 'about/index/create');

Route::get('/about/list', 'about/index/all');
Route::get('/about/json', 'about/index/allJson');
Route::get('/about/height', 'about/index/height');
Route::get('/about/height_all', 'about/index/heightAll');
Route::get('/about/page', 'about/index/page');
Route::get('/about/select/:id', 'about/index/select');
Route::get('/about/delete/:id', 'about/index/delete');

Route::get('/dbexample/add', 'dbexample/index/add');
Route::get('/dbexample/update', 'dbexample/index/update');
Route::get('/dbexample/select', 'dbexample/index/select');
Route::get('/dbexample/delete', 'dbexample/index/delete');

Route::get('/dbexample/sql_add', 'dbexample/index/sqlAdd');
Route::get('/dbexample/sql_update', 'dbexample/index/sqlUpdate');
Route::get('/dbexample/sql_select', 'dbexample/index/sqlSelect');
Route::get('/dbexample/sql_delete', 'dbexample/index/sqlDelete');

Route::get('/about/helloeq/:name', 'about/index/helloeq');

Route::get('/user/index', 'user/index/getSignin');
Route::get('/user/signup', 'user/index/getSignup');
Route::post('/user/signup/add', 'user/index/add');

// 留言板功能
// 會員相關
// 登入畫面
Route::get('/message/user/login', 'message/user/index');
// 註冊畫面
Route::get('/message/user/signup', 'message/user/signup');
// 會員註冊
Route::post('/message/user/create', 'message/user/save');
// 會員登入
Route::post('/message/user/login', 'message/user/login');
// 會員登出
Route::post('/message/user/signout', 'message/user/signout');
// 留言版相關
// 留言版首頁
Route::get('/message/index', 'message/index/index');
// 新增留言
Route::get('/message/create', 'message/index/create');
Route::post('/message/create', 'message/index/save');
// 查看留言
Route::get('/message/content/:id', 'message/index/post');
// 編輯留言
Route::get('/message/edit/:id', 'message/index/read');
Route::post('/message/edit/:id', 'message/index/edit');
// 刪除留言
Route::get('/message/delete/:id', 'message/index/delete');



return [

];
