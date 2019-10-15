<?php 

    use Workerman\Worker;
    use Workerman\Connection\AsyncTcpConnection;
    require_once __DIR__ . '/Workerman-master/Autoloader.php';

    $worker = new Worker();

    $worker->onWorkerStart = function($worker){
        // 设置访问对方主机的本地ip及端口(每个socket连接都会占用一个本地端口)
        $context_option = array(
            'socket' => array(
                // ip必须是本机网卡ip，并且能访问对方主机，否则无效
                'bindto' => '114.215.84.87:2333',
            ),
        );
        echo 'aaa';
        $con = new AsyncTcpConnection('ws://0.0.0.0:8586');
        echo 'bbb';
        $con->onConnect = function($con) {
            echo 'ccc';
            $con->send('hello');
        };
        echo 'ddd';
        $con->onMessage = function($con, $data) {
            echo 'kkk';
            echo $data;
        };
        echo 'eee';
        $con->connect();
        echo 'ggg';
    };

    Worker::runAll();
 ?>