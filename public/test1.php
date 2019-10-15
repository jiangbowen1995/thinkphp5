<?php
	
//    $data = $_POST;
//    file_put_contents('test1.txt','111111'."\r\n",FILE_APPEND);
//    file_put_contents('test1.txt',$data."\r\n",FILE_APPEND);
      list($tmp1, $tmp2) = explode(' ', microtime());
      $start = (float)sprintf('%.0f', (floatval($tmp1) + floatval($tmp2)) * 1000);
    $arr = [2,4,6];
     echo $start;
    foreach($arr as $k=>$v){
	$ids[] =  $pid = pcntl_fork();
	if($pid === -1){
	   echo 'failed to fork!!!!';
	   exit;
	}else if($pid){
	   echo '子进程：'.$pid;
	}else{
	  getPid($v);
	  exit;	
	}
    }

    function getPid($v){
	if($v == 2){
            $test1 = array_fill(1, 100000, 'bananaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
           // $con = file_get_contents('./'.$item.'.txt');
            file_put_contents('testfork1.txt',json_encode($test1)."\r\n",FILE_APPEND);
        }else if($v == 4){
           $test2 = array_fill(1, 100000, '12222222bananaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
           // $con = file_get_contents('./'.$item.'.txt');
            file_put_contents('testfork2.txt',json_encode($test2)."\r\n",FILE_APPEND);

        }else{
           $test3 = array_fill(1, 10000, '33333333333333333000000000000000000a');
           // $con = file_get_contents('./'.$item.'.txt');
            file_put_contents('testfork3.txt',json_encode($test3)."\r\n",FILE_APPEND);
        }
    }
    
//    foreach ($ids as $i => $pid) {
//	if ($pid) {
//	$res =  pcntl_waitpid($pid, $status,WNOHANG);
//	if($res == -1 || $res == 0){
//	   unset($ids[$i]);
//	 }
//	}
 //     sleep(1);	
 //   }
    list($tmp1, $tmp2) = explode(' ', microtime());
    $end =  (float)sprintf('%.0f', (floatval($tmp1) + floatval($tmp2)) * 1000);
    echo $end;
?>
