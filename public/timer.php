<?php 

	use Workerman\Worker;
	use Workerman\Connection\AsyncUdpConnection;
	use Workerman\Lib\Timer;
    require_once __DIR__ . '/Workerman-master/Autoloader.php';

    $ws_worker = new Worker('websocket://0.0.0.0:8585');
	// 连接建立时给对应连接设置定时器
	$ws_worker->onConnect = function($connection)
	{
	    // 每10秒执行一次
	    $time_interval = 10;
	    $connect_time = time();
	    // 给connection对象临时添加一个timer_id属性保存定时器id
	    // $connection->timer_id = Timer::add($time_interval, function($connection, $connect_time)
	    // {
	    //      $connection->send($connect_time);
	    // }, array($connection, $connect_time));
	    $connection->send('aaa');
	};
	// 连接关闭时，删除对应连接的定时器
	$ws_worker->onClose = function($connection)
	{
		$connection->send('bbb');
	    // 删除定时器
	    // Timer::del($connection->timer_id);
	};

	// 运行worker
	Worker::runAll();



 ?>