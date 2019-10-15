<?php
namespace app\index\controller;
use \PhpAmqpLib\Connection;
//use Workerman\Connection;
use think\Db;
use think\Controller;
use think\View;
use think\log;
use think\Loader;
use test\test;
//use fengqi\Hanzi\Hanzi;
// use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;
//use changeLang\Hanzi;

use wxpay\WxPayApi;
use wxpay\WxPayException;
use wxpay\WxPayConfig;
use wxpay\WxPayDataBase;
use wxpay\WxPayNotify;
// use Excel\classes\PHPExcel';
class Index extends Controller
{
    public function testrabbitmq(){
        // $user = model('Index');
//    	$user = Loader::model('User');
//    	$user->index();
//    	$index = Loader::model('Index');
//    	$index->index();
        $a = \fengqi\Hanzi\Hanzi::pinyin('哈哈哈');
        dump($a);
        $test = new test();
        $test->unit_test();
        ECHO WxPayConfig::APPID;
//    	$goods = Loader::model('Goods');
//    	$goods->index();
//    	dump($user);
//        $cnn = new \PhpAmqpLib\Connection\AMQPConnection();
//        dump($cnn);
        $cnn1 = new \Workerman\Connection\TcpConnection();
        dump($cnn1);
        exit;
//		   $cnn->setHost('127.0.0.1');
//		   $cnn->setLogin('guest');
//		   $cnn->setPassword('guest');
//		   if($cnn->connect()){
//		         echo '连接成功';
//		    }
    }
	private static $a = 100;
	// public function __construct(){
	// 	parent::_initialize();
	// }
    public $arr = [
                   ['qiufa',13],
                   ['zhafa',7],
                   ['diefa',5],
                   ['difa',1],
                   ['shijing',1],
                   ['jiezhifa',6],
                   ['zhihuifa',6],
                   ['diaojiefa',7],
                   ['diancifa',2],
                   ['anquanfa',3],
                   ['zhenxingfa',2],
                   ['shushuifa',3],
                   ['jianyafa',2],
                   ['fangliaofa',1],
                   ['jiaozuofa',1],
                   ['pinghengfa',1],
                   ['guanjiafa',1],
                   ['zhusaifa',1],
                   ['paiwufa',1],
                   ['painifa',1],
                   ['zuhuoqi',1],
                   ['huxifa',1],
                   ['guolvqi',3],
                   ['paiqifa',1],
                   ['qieduanfa',1],
                   ['gemofa',1],
                   ['xuansaifa',2],
                   ['shuilikongzhifa',2],
                   ['weishengjifamen',3]
                ];
    public function index($id='qiufa')
    {
        // $arr = [
        //         ['user_name'=>'jiangbowen','sex'=>1,'age'=>12],
        //         ['user_name'=>'jiangbowen1','sex'=>1,'age'=>12],
        //         ['user_name'=>'jiangbowen2','sex'=>1,'age'=>12],
        //         ['user_name'=>'jiangbowen3','sex'=>1,'age'=>12],
        //         ['user_name'=>'jiangbowen4','sex'=>1,'age'=>12],
        //         ['user_name'=>'jiangbowen5','sex'=>1,'age'=>12],
        //         ['user_name'=>'jiangbowen6','sex'=>1,'age'=>12],
        //         ['user_name'=>'jiangbowen7','sex'=>1,'age'=>12],
        //         ['user_name'=>'jiangbowen8','sex'=>1,'age'=>12],
        //         ['user_name'=>'jiangbowen9','sex'=>1,'age'=>12],
        //     ];
        // foreach ($arr as $key => &$value) {
        //     $brr[] = $value;
        // }
 //       var_dump(file_exists('http://127.0.0.1:8080/JavaBridgeTemplate721/java/Java.inc'));
 //      	require_once('http://127.0.0.1:8080/JavaBridgeTemplate721/java/Java.inc');
//	require_once ('/soft/apache-tomcat-7.0.94/webapps/JavaBridgeTemplate721/java/Java.inc');
//       $system = new \Java('java.lang.System');

// // // demonstrate property access
//    echo 'Java version=' . $system->getProperty('java.version') . '<br/>';
//    echo 'Java vendor=' . $system->getProperty('java.vendor') . '<br/>';
    echo phpinfo();

 //       echo phpinfo();
        // var_dump($arr);
        exit;
        // Loader::import('/PHPExcel');
        // $foo = new \PHPExcel();
        // $excel = new \PHPExcel();
        // var_dump($excel);
        // $data['title'] = 'qiufa';
        if(!file_exists('test/test1')){
            $flag = mkdir('test/test1',0777,true);
            echo $flag;
        }
        foreach($this->arr as $value){
            $typeArr[] = $value[0];
        }
        if(false == empty($id)){
            if(!in_array($id, $typeArr)){
            return '不存在此类型';
        }
            // $data['columns'] = array('0'=>'关键词','1'=>'型号','2'=>'类型');
            $res = Db::table('sb')->where('type',$id)->select();
            // echo  Db::table('sb')->getLastSql();
            // var_dump($res);
            $this->assign(array('res'=>$res,'type'=>$this->arr,'id'=>$id));
            return $this->fetch('index/hello');
            // var_dump($res);
        }else{
            dump('php is world best language');
        }
        // $this->push($data);
        // var_dump($res);
        // exit;
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

    public function testcomposer($ad='江博文'){
    	$a = \fengqi\Hanzi\Hanzi::pinyin($ad);
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
//        echo $_GET['name'];
    	echo 'abc';
    	$test = Hanzi::pinyin('江博文二维');
    	dump($test);
    	// return $test;
    }



    public function testpay(){
        $a = 1 +2;
        dump($a);
        dump('aaaaaa');

//    	$s = new WxPayConfig;
//    	echo $s::APPID;
    	// dump($s);
    }

    public function sb($id,$name){
        dump($id);
        dump($name);
        exit;
        $res = Db::table('sb')->where('type','qiufa')->select();
        $data = array('type'=>'aaa');
        Db::table('sb')->where('type','qiuefa')->update($data);
        Db::table('sb')->where('type','qiuefa')->delete();
        Db::table('sb')->insert($data);
        //事务
        Db::startTrans();
        try{
            Db::table('sb')->where()->delete();
            Db::table('sb')->insert();
            Db::commit();
        }catch (\Exception $e){
            Db::rollback();
        }
        var_dump($res);
    }

    public function push($data) {
        // Create new PHPExcel object    
        ob_end_clean(); // Added by me
        ob_start(); // Added by me
        // Create new PHPExcel object  
         Loader::import('/PHPExcel');
        // $foo = new \PHPExcel()  
        $objPHPExcel = new \PHPExcel();  
        // Set properties    
        $objPHPExcel->getProperties()->setCreator("Taylor Duan")  
                ->setLastModifiedBy("Taylor Duan")  
                ->setTitle("Office 2007 XLSX Test Document")  
                ->setSubject("Office 2007 XLSX Test Document")  
                ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")  
                ->setKeywords("office 2007 openxml php")  
                ->setCategory("Test result file");  
        //Excel表格式,这里简略写了7列
        $columnCount=count($data['columns']);
        $letters = array('B','C','D');
        foreach ($letters as $letter ){
            // set width
            $width=30;
            $objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setWidth($width);
        }
  
        // 设置行高度    
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(22);  
      
        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(25);  
      
        // 字体和样式  
        $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10); 
        
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);  
      
        if(7==$columnCount){
            $objPHPExcel->getActiveSheet()->getStyle('B2:H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
            $objPHPExcel->getActiveSheet()->getStyle('B2:H2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);  
            $objPHPExcel->getActiveSheet()->getStyle('B2:H2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        }else if(8==$columnCount){
            $objPHPExcel->getActiveSheet()->getStyle('B2:I2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
            $objPHPExcel->getActiveSheet()->getStyle('B2:I2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('B2:I2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        }else if(6==$columnCount){
             $objPHPExcel->getActiveSheet()->getStyle('B2:G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('B2:G2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('B2:G2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);  
        }else if(11==$columnCount){
            $objPHPExcel->getActiveSheet()->getStyle('B2:L2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
            $objPHPExcel->getActiveSheet()->getStyle('B2:L2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('B2:L2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        }else if(12==$columnCount){
            $objPHPExcel->getActiveSheet()->getStyle('B2:M2')->getAlignment()->setHorizontal
            (PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('B2:M2')->getAlignment()->setVertical
            (PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('B2:M2')->getBorders()->getAllBorders()->setBorderStyle
            (PHPExcel_Style_Border::BORDER_THIN);
        }else if(3==$columnCount){
            $objPHPExcel->getActiveSheet()->getStyle('B2:D2')->getAlignment()->setHorizontal
            ('general');
            $objPHPExcel->getActiveSheet()->getStyle('B2:D2')->getAlignment()->setVertical
            ('center');
            $objPHPExcel->getActiveSheet()->getStyle('B2:D2')->getBorders()->getAllBorders()->setBorderStyle
            ('thin');
        }
       
      
        // 设置水平居中    
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setSize(12);
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal('general'); 
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical('center');
        foreach ($letters as $letter ){
            // set width
            $objPHPExcel->getActiveSheet()->getStyle($letter)->getAlignment()->setHorizontal('general');
        }  
      
        //  合并  
        if(7==$columnCount){
            $objPHPExcel->getActiveSheet()->mergeCells('B1:H1');
        }else if(8==$columnCount){
            $objPHPExcel->getActiveSheet()->mergeCells('B1:I1');
        }else if(6==$columnCount){
            $objPHPExcel->getActiveSheet()->mergeCells('B1:G1');
        }else if(11==$columnCount){
            $objPHPExcel->getActiveSheet()->mergeCells('B1:L1');
        }else if(17==$columnCount){
            $objPHPExcel->getActiveSheet()->mergeCells('B1:M1');
        }else if(3==$columnCount){
            $objPHPExcel->getActiveSheet()->mergeCells('B1:D1');
        }
      
        // 表头  
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', $data['title']);
        foreach ($letters as $key=>$letter ){
            // set width
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($letter.'2', $data['columns'][$key]);
        }              
      
        // 内容  
        for ($i = 0, $len = count($data['rows']); $i < $len; $i++) {            
            $objPHPExcel->getActiveSheet(0)->setCellValue('B' . ($i + 3), $data['rows'][$i][0]);
            $objPHPExcel->getActiveSheet(0)->setCellValue('C' . ($i + 3), $data['rows'][$i][1]);
            $objPHPExcel->getActiveSheet(0)->setCellValue('D' . ($i + 3), $data['rows'][$i][2]);
            // $objPHPExcel->getActiveSheet(0)->setCellValue('E' . ($i + 3), $data['rows'][$i][3]);
            // $objPHPExcel->getActiveSheet(0)->setCellValue('F' . ($i + 3), $data['rows'][$i][4]);
            // $objPHPExcel->getActiveSheet(0)->setCellValue('G' . ($i + 3), $data['rows'][$i][5]);
            $objPHPExcel->getActiveSheet()->getStyle('B' . ($i + 3) . ':D' . ($i + 3))->getAlignment()->setVertical('center');
                $objPHPExcel->getActiveSheet()->getStyle('B' . ($i + 3) . ':D' . ($i + 3))->getBorders()->getAllBorders()->setBorderStyle('thin');
            $objPHPExcel->getActiveSheet()->getRowDimension($i + 3)->setRowHeight(16);  
        }  
      
        // Rename sheet    
        $objPHPExcel->getActiveSheet()->setTitle($data['title']);  
      
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet    
        $objPHPExcel->setActiveSheetIndex(0);  
      
        // 输出  
        $ua = $_SERVER["HTTP_USER_AGENT"];
        $filename = $data['title'].'.xls';
        $encoded_filename = urlencode($filename);
        $encoded_filename = str_replace("+", "%20", $encoded_filename);
        // echo 'gg';
        // header('Content-Type: application/vnd.ms-excel');  
        // if (preg_match("/MSIE/", $ua)||strpos ( $ua, "rv:11.0" )) {
        //     echo 'a';
        //     exit;
        //     header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
        // } else if (preg_match("/Firefox/", $ua)) {
        //     echo 'b';
        //     exit;
        //     header('Content-Disposition: attachment; filename*="utf8\'\'' . $filename . '"');
        // } else {
        //     echo 'c';
        //     exit;
        //     header('Content-Disposition: attachment; filename="' . $filename . '"');
        // }
 
        header('Cache-Control: max-age=0');  
      
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
        $objWriter->save('php://output');   
    }


    public function setId(&$id){
//        $id = 2;
        $id = $id + 1;
        return $id;
    }
    public function getId(){
        echo call_user_func_array(array($this,'setId'),array(3));
    }


}
