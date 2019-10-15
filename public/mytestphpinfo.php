<?php
   // require_once('http://127.0.0.1:8080/JavaBridgeTemplate721/java/Java.inc');
   // $system = new Java('java.lang.System');

// // // demonstrate property access
  // echo 'Java version=' . $system->getProperty('java.version') . '<br/>';
  // echo 'Java vendor=' . $system->getProperty('java.vendor') . '<br/>';
 //$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
 //       var_dump($manager);   
$a = null;
$b = 9;
$c = 10;
var_dump($a <=> $b);
var_dump($a ?? $b ?? $c);
echo `ls -al`;
 echo phpinfo();
?>
