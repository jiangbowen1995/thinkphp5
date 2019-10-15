<?php 
	use Workerman\Worker;
	require_once __DIR__ . '/Workerman-master/Autoloader.php';
	require_once __DIR__ . '/channel-master/src/Server.php';

	// 不传参数默认是监听0.0.0.0:2206
	$channel_server = new Channel\Server();

	if(!defined('GLOBAL_START'))
	{
	    Worker::runAll();
	}



 ?>