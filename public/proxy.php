<?php 

	//添加TCP代理
	use Workerman\Worker;
	use Workerman\Connection\AsyncTcpConnection;
	require_once __DIR__ . '/Workerman-master/Autoloader.php';

	$worker = new Worker('tcp://0.0.0.0:8585');
	$worker->onConnect = function($connection)
	{
		//建立本地80端口的异步链接
		$connection_to_80 = new AsyncTcpConnection('tcp://0.0.0.0:8586');
		//设置将当期那客户端链接的数据导向8586端口的链接
		$connection->pipe($connection_to_80);
		$connection_to_80->pipe($connection);
		//执行异步链接
		$connection_to_80->connect();
	};

	Worker::runAll();

 ?>