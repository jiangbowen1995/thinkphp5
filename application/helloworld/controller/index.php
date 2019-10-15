<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/25 0025
 * Time: 下午 2:31
 */
namespace  app\helloworld\controller;
use think\Controller;
class Index extends Controller{

    public function __construct()
    {
        echo 'hello world...';
    }

    public function index(){
        echo 'hello linux...';
    }

    public function __destruct()
    {
        echo 'hello php';
    }
}