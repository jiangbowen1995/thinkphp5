<?php 

	use Workerman\Worker;
	require_once __DIR__ . '/Workerman-master/Autoloader.php';
	require_once __DIR__ . '/vendor/autoload.php';

	$worker = new Worker('tcp://0.0.0.0:8585');
	$worker->onWorkerStart = function($worker)
	{
	    // 将db实例存储在全局变量中(也可以存储在某类的静态成员中)
	    global $db;
	    $db = new \Workerman\MySQL\Connection('127.0.0.1', '3306', 'root', 'jiangbowen', 'test');
	};
	$worker->onMessage = function($connection, $data)
	{
	    // 通过全局变量获得db实例
	    global $db;
	    // 执行SQL
	    $all_tables = $db->query("SELECT * FROM `user` WHERE id= {$data}");
	    $connection->send(json_encode($all_tables));
	};
	// 运行worker
	Worker::runAll();



 ?>