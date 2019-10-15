<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\View;
use think\log;
use think\Loader;
use fengqi\Hanzi\Hanzi;
// use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;
// use changeLang\Hanzi;
use wxpay\WxPayApi;
use wxpay\WxPayException;
use wxpay\WxPayConfig;
use wxpay\WxPayDataBase;
use wxpay\WxPayNotify;
class Index extends Controller
{
	private static $a = '100';
	// public function __construct(){
	// 	parent::_initialize();
	// }
    public function index()
    {
        echo 'aaa';
        exit;
        $res = Db::table('sb')->where('type','diefa')->get();
        var_dump($res);
        exit;
        // echo phpinfo();
        // $feres = file_exists('test/test_1121.txt');
        // var_dump($feres);
        // file_put_contents('./../test_jiangbowen/record.txt', 'jiangbowen is good  god',FILE_APPEND);
        // return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }

    public  function test($id){
    
    	// echo 'a';
    	$this->assign('name','jiangbowen is good boy');
    	$this->assign('email','1751856100@qq.com');
    	 return $this->fetch('hello');
    }

    public function connect(){
    	$res = Db::table('front_user')->where('fu_mobile','13802255195')->find();
    	dump($res);
    	Log::record('ok');
    	echo 'connect';
    }

    public function testcomposer(){
    	$a = Hanzi::pinyin('江博文为');
    	dump($a);
    }

  //   public function generQrcode(){

  //   	$qrCode = new QrCode('Life is too short to be generating QR codes');
		// $qrCode->setSize(300);
		// // Set advanced options
		// $qrCode->setWriterByName('png');
		// $qrCode->setMargin(10);
		// $qrCode->setEncoding('UTF-8');
		// $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
		// $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
		// $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
		// // dump( __DIR__.'\..\..\..\vendor\endroid\qr-code\assets\fonts\noto_sans.otf');
		// // die();
		// $qrCode->setLabel('Scan the code', 16, __DIR__.'\..\..\..\vendor\endroid\qr-code\assets\noto_sans.otf', LabelAlignment::CENTER);
		// $qrCode->setLogoPath(__DIR__.'\..\..\..\vendor\endroid\qr-code\assets\symfony.png');
		// // $qrCode->setLogoSize(150, 200);
		// // $qrCode->setRoundBlockSize(true);
		// // $qrCode->setValidateResult(false);
		// // $qrCode->setWriterOptions(['exclude_xml_declaration' => true]);

		// // Directly output the QR code
		// header('Content-Type: '.$qrCode->getContentType());
		// echo $qrCode->writeString();

		// // Save it to a file
		// $qrCode->writeFile(__DIR__.'/qrcode.png');

		// // Create a response object
		// $response = new QrCodeResponse($qrCode);
        
  //   }

    public function testcomposer1(){
    	echo 'abc';
    	$test = Hanzi::pinyin('曹玲');
    	dump($test);
    	// return $test;
    }

    public function testrabbitmq(){
    	// $user = model('Index');
    	$user = Loader::model('Index');
    	dump($user);
    // 	 $cnn = new AMQPConnection();
		  // $cnn->setHost('127.0.0.1');
		  // $cnn->setLogin('guest');
		  // $cnn->setPassword('guest');
		  // if($cnn->connect()){
		  //       echo '连接成功';
		  //  }
    }

    public function testpay(){
    	$s = new WxPayConfig;
    	echo $s::APPID;
    	// dump($s);
    }

    public function sb(){
        $res = Db::table('sb')->where('type','qiufa')->get();
        var_dump($res);
    }
}
