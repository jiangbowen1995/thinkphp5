<?php
namespace app\redis\controller;
use think\Db;
use think\Controller;
use think\View;
use think\log;
use think\Loader;
use think\cache\Driver;
class Index extends Controller
{
	// private static $a = '100';
	// public function __construct(){
	// 	parent::_initialize();
	// }
    public function index()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1', '6379');//php客户端设置的ip及端口
        // $redis->auth(config('redisInfo.password')); //设置密码
        $redis->set('name', 'jiangbowen1', 20);
        $redis->setnx('name', 'jiangbowen');
        dump($redis->get('name'));
    }
}
