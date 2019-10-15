<?php

// $str =  '"s:565:"484D34F8100000012874010130818B022035F7A856C43908F995840064FA17679B5AC13E24E6005B14479CB944BA422BC80220766D8192A1B0AABA324A718CF34F634DD99DA60F2908038C3B58CA409DC2B39E0420687A72EF9B4450895A90D042DA7F44B7133C17DC78F94EAC3B700D81E30E1F11042370C2806D4AEDBF899B7A51F00E4E2CA4BF680103BCD38CE2EA44E94162A8057AADEAD2|3707E56E45035A21324D8C3B52E208E36C79995257C47CB80572076E166D86F4D571B9DF24E849DF4FF2EF219CCCE3E2D12207D7F4146D0D6008B22E31E0D50BFF2A08DC36E6E14BA8CFB2DDC3E8558ABB79B92676588CDF2C63D66134D1199583CD6A83EBA0AAF667120B53F13B96AE3DA62AE31E540EA9C9C57E1EB05B203F";"';

// // preg_match_

// exit;
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//header('Content-type: text/html; charset=utf-8');
require_once('http://127.0.0.1:8080/JavaBridgeTemplate721/java/Java.inc');
// require_once('/soft/apache-tomcat-7.0.94/webapps/JavaBridgeTemplate721/java/Java.inc');
// get instance of Java class java.lang.System in PHP
 // $system = new Java('java.lang.System');

// // // demonstrate property access
// echo 'Java version=' . $system->getProperty('java.version') . '<br/>';
// echo 'Java vendor=' . $system->getProperty('java.vendor') . '<br/>';
// echo 'OS=' . $system->getProperty('os.name') . ' ' .
//              $system->getProperty('os.version') . ' on ' .
//              $system->getProperty('os.arch') . ' <br/>';

// // java.util.Date example
// $formatter = new Java('java.text.SimpleDateFormat',
//                      "EEEE, MMMM dd, yyyy 'at' h:mm:ss a zzzz");

// echo $formatter->format(new Java('java.util.Date'));

// echo '<br/>';

//下面是php调用自己编写的test.java的方法。
//  $test=new Java("Test");
//  $test->setName("bbbbbbbbbb");
//  echo  $test->getName();
  // echo "vvv<br>";
  // echo "basename(path)bb<br>";
 //$test2 = new Java("test2a");
 // var_dump($test2);
 //echo $test2->getParam(12.8);

	 $arr = array(
                'head' =>array(
		        'CustCode'=>'100000012874',
		        'Mercode' => '4e44c4a22faa4e169dd4e74f8592b5f0',
		        'MerAcctNo' => '609996963',
		        'MerCurrCode'=>'01',
		        'FunCode' => '030503C301',
		        'ChanCode'=>'15',
		        'OrderNo' => microtime(true),
		        'OrderDate' => date('Ymd'),
		        'OrderTime' => date('His'),
		        'RebackURL' => 'http://mt.zufun.cn/redirectView',
		        'NotifyURL' => 'http://14.18.161.58:9799/bsb_nofify',
		    ),
		    'body'=> array(
		        'CustNo'=> '67',
		        'CustName'=>'江博文',
		        'CertTye' => '01',
		        'CertNo' => '360428199508072277',
		        'MobileNo' => '13802255195'

		    )
            );
            $sendData = json_encode($arr);
            echo $sendData;
            // var_dump($sendData);
            //  "{
            //  	"head":
            //      {
            //      	"CustCode":"100000012874",
            //      	"Mercode":"4e44c4a22faa4e169dd4e74f8592b5f0",
            //      	"MerAcctNo":"609996963",
            //      	"MerCurrCode":"01",
            //      	"FunCode":"030503C301",
            //      	"ChanCode":"15",
            //      	"OrderNo":1563452030.7615,
            //      	"OrderDate":"20190718",
            //      	"OrderTime":"201350",
            //      	"RebackURL":"http:\/\/mt.zufun.cn\/redirectView",
            //      	"NotifyURL":"http:\/\/14.18.161.58:9799\/bsb_nofify"
            //      },
            //     "body":{
            //     	"CustNo":"67",
            //     	"CustName":"\u6c5f\u535a\u6587",
            //     	"CertTye":"01",
            //     	"CertNo":"360428199508072277",
            //     	"MobileNo":"13802255195"
            //     }
            // }"
       		$encodeObject = new \Java("com.hundsun.tbsp.adapter.suite.cipher.client.EncrAndDecryptForClient");

	        // echo 'aaa'
        	// echo 'ccc';
        	$encodeData = $encodeObject->encryptAndSign($sendData);
        	$php_encode = (string)$encodeData;
        	echo '-------sign--------------------';
	        var_dump($php_encode);
	        echo '-------send--------------------';
	        $rdata = sendData($php_encode);
	        var_dump($rdata);
	        echo '-------sendSuccess--------------------';
	        $decodeData = $encodeObject->decryptAndVertify($rdata['response_body']);
       	    $php_decodeData = (string) $decodeData;
        	var_dump($php_decodeData);
        	echo '-------sign-aaaaaaa-------------------';
	        function sendData($data){
	        	$url ='http://test2.thinksofterp.com:7052/adapter-extranet/receiveGateway';
				    echo 'curl-----start---';
			        var_dump(gettype($data));
			        $curl = curl_init();
			        curl_setopt($curl, CURLOPT_URL, $url);
			        if (!empty($data)) {
			            curl_setopt($curl, CURLOPT_POST, 1);
			            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			        }
			        //设置超时
			        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);

			        if (substr($url, 0, 5) == 'https') {
			                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书
			                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // 检查证书中是否设置域名
			        }
			        if (!empty($headers)) {
			            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			            // curl_setopt($curl, CURLINFO_HEADER_OUT, true); //TRUE 时追踪句柄的请求字符串，从 PHP 5.1.3 开始可用。这个很关键，就是允许你查看请求header
			            // $headers = curl_getinfo($curl, CURLINFO_HEADER_OUT); //官方文档描述是“发送请求的字符串”，其实就是请求的header。这个就是直接查看请求header，因为上面允许查看
			        }
			        curl_setopt($curl, CURLOPT_HEADER, true);    // 是否需要响应 header
			        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			        $output          = curl_exec($curl);
			        $header_size     = curl_getinfo($curl, CURLINFO_HEADER_SIZE);    // 获得响应结果里的：头大小
			        $response_header = substr($output, 0, $header_size);    // 根据头大小去获取头信息内容
			        $http_code       = curl_getinfo($curl, CURLINFO_HTTP_CODE);    // 获取响应状态码
			        $response_body   = substr($output, $header_size);
			        $error           = curl_error($curl);
			        curl_close($curl);
			        $data = [
			            'request_url'        => $url,
			            'request_body'       => $data,
			            'request_header'     => $headers,
			            'response_http_code' => $http_code,
			            'response_body'      => $response_body,
			            'response_header'    => $response_header,
			            'error'              => $error
			        ];
			        echo 'mmmmmmmmmmm';
			        var_dump($output);
			        echo 'mmmmmmmmmmmm';
			        return $data;
	        }
	        // var_dump($encodeData);
?>
