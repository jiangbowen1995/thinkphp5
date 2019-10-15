<?php 

	// use Workerman\worker;
	use \Workerman\Worker;
    // use \Workerman\Connection\AsyncTcpConnection;
    require_once __DIR__ . '/Workerman-master/Autoloader.php';
    require_once __DIR__ . '/channel-master/src/Client.php';
    require_once __DIR__ . '/channel-master/src/Server.php';

    $worker = new Worker('websocket://0.0.0.0:8585');

    $worker->count = 2;

    $channel->master = new Channel\server();

    $global_con_arr = [];

    $worker->onWorkerStart = function($worker){

    	 // Channel客户端连接到Channel服务端
         Channel\Client::connect();

         //监听事件
         Channel\Client::on('send_to_group',function($event_data){
            $group_id = $event_data['group_id'];
            $message = $event_data['message'];
            global $global_con_arr;
            // var_dump(array_keys($group_con_map));
            if (isset($global_con_arr[$group_id])) {
                foreach ($global_con_arr[$group_id] as $con) {
                    $con->send($message);
                }
            }
         });


    };

    $worker->onMessage = function($conn,$rdata){
    	// var_dump($data);
    	//$data = json_decode(json_encode($rdata),true);
        $data = json_decode($rdata, true);
    	$cmd = $data['cmd'];
    	$group_id = $data['group_id'];

    	switch ($cmd) {
    		case 'add_group':
    			//添加映射关系
    			global $global_con_arr;
    			$global_con_arr[$group_id][$conn->id] = $conn;
    			$conn->group_id[$group_id] = $group_id;
     			break;
    		case 'send_to_group':
    		 Channel\Client::publish('send_to_group', array(
                    'group_id'=>$group_id,
                    'message'=>$data['message']
                ));
    		 break;
    		default:
    			# code...
    			break;
    	}
    };


    // 这里很重要，连接关闭时把连接从全局群组数据中删除，避免内存泄漏
    $worker->onClose = function($con){
        global $global_con_arr;
        // 遍历连接加入的所有群组，从group_con_map删除对应的数据
        if (isset($con->group_id)) {
            foreach ($con->group_id as $group_id) {
                unset($global_con_arr[$group_id][$con->id]);
            }
            if (empty($global_con_arr[$group_id])) {
                unset($global_con_arr[$group_id]);
            }
        }
    };

    Worker::runAll();


 ?>
