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
// return [
    // '__pattern__' => [
    //     'name' => '\w+',
    // ],
    // '[hello]'     => [
    //     ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
    //     ':name' => ['index/hello', ['method' => 'post']],
    // ],

	Route::rule('/','index/index/index','GET');
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
// ];

