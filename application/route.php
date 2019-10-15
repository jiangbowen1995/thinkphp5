<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
use think\Url;
// return [
    // '__pattern__' => [
    //     'name' => '\w+',
    // ],
    // '[hello]'     => [
    //     ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
    //     ':name' => ['index/hello', ['method' => 'post']],
    // ],

	Route::rule('/','api/home.index/index','GET');
	Route::rule('/users/add','api/home.index/add','GET');
    Route::rule('/users/edit/:id','api/home.index/edit','GET');
    Route::rule('/users/insert','api/home.index/insert','POST');
    Route::rule('/users/update','api/home.index/update','POST');
    Route::rule('/users/delete/:id','api/home.index/delete','GET');
	Route::rule('type/:id','index/index/index','GET');
	Route::rule('type','index/index/sb','GET');
	Route::rule('connect','index/index/connect','GET');
	Route::rule('testcomposer','index/index/testcomposer','GET');
	Route::rule('generQrcode','index/index/generQrcode','GET');
	Route::rule('testcomposer1','index/index/testcomposer1','GET');
	Route::rule('testrabbitmq','index/index/testrabbitmq','GET');
	Route::rule('testpay','index/index/testpay','GET');
	Route::rule('redis','redis/index/index','GET');
	Route::rule('rabbitmqsend','rabbitmq/index/index','GET');
	Route::rule('rabbitmqrece','rabbitmq/index/receiver','GET');
	Route::rule('sb/[:id]','index/index/sb','GET');
	Route::rule('sb','index/index/sb','GET');
	Route::rule('getId','index/index/getId','GET');
	Route::rule('sendMessage','api/home.producter/sendMessage','GET');
    Route::rule('recMessage','api/home.consumer/receMessage','GET');
//    Url::build('sb', '[id=23]');
//	Route::rule('sb/:name','index/index/sb','GET');
// ];

