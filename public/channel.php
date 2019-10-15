<?php 

	// use Workerman\worker;
	use \Workerman\Worker;
    // use \Workerman\Connection\AsyncTcpConnection;
    require_once __DIR__ . '/Workerman-master/Autoloader.php';
    require_once __DIR__ . '/channel-master/src/Client.php';
    require_once __DIR__ . '/channel-master/src/Server.php';

    //初始化一个channel

    $channel_server = new Channel\Server();

    $worker = new Worker('tcp://0.0.0.0:8585');

    $worker->name = 'websocket';

    $worker->count = 2;

    $worker->onWorkerStart = function($worker){
    	 // Channel客户端连接到Channel服务端

	    Channel\Client::connect();
	    // 订阅broadcast事件，并注册事件回调
	    if($worker->id == 0){
	    	$sub = 'jiangbowen';
	    }else if($worker->id == 1){
	    	$sub = 'caoling';
	    }
	    // var_dump($worker->id);
	    Channel\Client::on($sub, function($event_data)use($worker,$sub){
	        // 向当前worker进程的所有客户端广播消息
	        foreach($worker->connections as $connection)
	        {
	            $connection->send('sub:'.$sub.','.$event_data);
	        }
	    });
    };

    $worker->onMessage = function($connection, $data) use($worker)
	{
		// $connection->send($worker->id);
		if($worker->id == 0){
	    	$sub = 'jiangbowen';
	    }else if($worker->id == 1){
	    	$sub = 'caoling';
	    }
	   // 将客户端发来的数据当做事件数据
	   $event_data = $data;
	   // 向所有worker进程发布broadcast事件
	   \Channel\Client::publish($sub, $event_data);

	};

    Worker::runAll();




 ?>