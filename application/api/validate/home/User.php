<?php
namespace app\api\validate\home;
use think\Validate;
class User extends Validate
{
    protected $rule = [
        'name'  =>  'require|max:25|token',
        'email' =>  'email',
        'age'=>'number|between:1,120',
        'password' => 'require|max:5',
    ];

    protected  $message = [
    'name.require' => '名称必须1',
    'name.max'     => '名称最多不能超过25个字符1',
    'age.number'   => '年龄必须是数字1',
    'age.between'  => '年龄必须在1~120之间1',
    'email'        => '邮箱格式错误1',
    'password.require' => '密码必须1',
    'password.max'     => '密码最多不能超过5个字符1',
    ];

    protected $scene = [
        'login'  =>  ['name','email','age','password'],
        'edit'   =>  ['name','email','age']
    ];
}