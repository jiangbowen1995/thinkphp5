<?php

for($i=0;$i<3;$i++){
    $id[] = fork_worker();
}


function fork_worker(){
    $pid = pcntl_fork();
    if($pid == 0){ //child processes
        echo "子进程\r\n";
        $this_id = posix_getpid();
        echo  $this_id."\r\n";
        exit(1);
    }elseif($pid > 0){ //master processes
        echo "父进程\r\n";
    }
}
foreach($id as $i) {
    pcntl_wait($i);
}
while(1);