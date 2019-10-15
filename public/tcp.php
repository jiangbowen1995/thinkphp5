<?php 
	use Workerman\Worker;
	require_once __DIR__ . '/Workerman-master/Autoloader.php';
	$worker = new Worker('tcp://0.0.0.0:8585');
	$worker->count = 2;
	$worker->onConnect = function($connection)
	{
	    echo $connection->id;
	    $connection->onMessage = function($connection,$data){
	    	if($connection->id == 1){
		    	$connection->send('conID this is '.$connection->id.',connect success');
		    }else{ 
		    	$connection->send('conID this is '.$connection->id.',connect success');
		    }
	    };
	};


	$worker->onMessage = function($connection,$data)
	{
		// foreach($connection->worker->connections as $con){
		// 	$con->send('server receiver...'.$data);
		// }
		$connection->send('i am '.$connection->id.',ip:'.$connection->getRemoteIp().'you send :'.$data.' success recv:aaaaa');
	};
	// 运行worker
	Worker::runAll();

 ?>
