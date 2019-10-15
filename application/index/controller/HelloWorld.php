<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/25 0025
 * Time: 下午 2:39
 */
namespace app\index\controller;

use think\Controller;
class HelloWorld extends Controller{

    public function __construct()
    {
        echo 'aaaaaaaaaaaaaaa';
    }

    public function index(){
        echo 'bbbbbbbbbbbbbb';
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo 'ccccccccccccccc';
    }
}