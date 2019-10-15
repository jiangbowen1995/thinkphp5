<?php
namespace app\redis\controller;
use think\Db;
use think\Controller;
use think\View;
use think\log;
use think\Loader;
use think\cache\Driver;
use think\Cache;
class Index extends Controller
{
	// private static $a = '100';
	// public function __construct(){
	// 	parent::_initialize();
	// }
    public function index()
    {
        $redis = new \Redis();
        // Cache::set('name',$value,3600);
        Cache::set('name',$value,3600);
        dump($redis);
        Cache::get('name');
    }
}
