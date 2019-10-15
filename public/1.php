<?php 

	use Workerman\Worker;
	require_once __DIR__ . '/Workerman-master/Autoloader.php';

	// worker实例1有4个进程，进程id编号将分别为0、1、2、3
	$worker1 = new Worker('websocket://0.0.0.0:8585');
	// 设置启动4个进程
	$worker1->count = 2;
	// 每个进程启动后打印当前进程id编号即 $worker1->id
	$worker1->onWorkerStart = function($worker1)
	{
	    echo "worker1->id={$worker1->id}\n";
	
	   $inner_worker = new Worker('text://0.0.0.0:8586');
           $inner_worker->reusePort = true;
           $inner_worker->onMessage = function($connection,$data){
		global $worker1;
		echo $worker->id;
                $data = json_decode($data,true);
                $uid = $data['uid'];
                $connection->uid = $uid;
                if(!isset($worker1->uidConnections[$connection->uid])){
		   $worker1->uidConnections[$connection->uid] = $connection;
		}
                $ret = sendMessage($uid,'hello i received... thanks');
		$connection->send($ret ? 'ok' : 'fail');
	 	//echo $worker1->id;
	 	//var_dump($data);
	       // $connection->send('i am 8586 port,receive success...');	
           };
	   $inner_worker->listen();		
	};
        
	$worker1->uidConnections = array();
	$worker1->onMessage = function($connection,$data)
	{
           global $worker1;
           echo $worker1->id;
	  // var_dump($connection);
	  // var_dump($data);
	  $info = explode('|',$data);
	  $connection->uid = $info[0];
           // $age = $info[1];
	   //关联用户与链接
	   $worker1->uidConnections[$connection->uid] = $connection;
	   var_dump($worker1);
	   $connection->send('i am 8585 port,server receive success....');
	  // $inner_work = new Worker('tcp://0.0.0.0:8586');
           	
        };
	// worker实例2有两个进程，进程id编号将分别为0、1
	// $worker2 = new Worker('tcp://0.0.0.0:8686');
	// // 设置启动2个进程
	// $worker2->count = 2;
	// // 每个进程启动后打印当前进程id编号即 $worker2->id
	// $worker2->onWorkerStart = function($worker2)
	// {
	//     echo "worker2->id={$worker2->id}\n";
	// };

	function sendMessage($id,$data){
	  global $worker1;
	 var_dump($id);
	 var_dump($worker1);
         var_dump(isset($worker1->uidConnections[$id]));
          
          if(isset($worker1->uidConnections[$id])){
	    $connection = $worker1->uidConnections[$id];
            $connection->send($data);
	    return true;
	 }
	  return false;
	}

	// 运行worker
	Worker::runAll();

 ?>
