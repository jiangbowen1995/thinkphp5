<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/11 0011
 * Time: 上午 11:55
 */
//$arr = [1,2,3];
//foreach ($arr as &$item) {
//    $item = 5;
//}
//var_dump($arr);
//foreach ($arr as $item) {
//    $item = 6;
//}
//var_dump($arr);
//
//$arr[2] = &$item;
//$arr[2] = $arr[0];  //5
//$arr[2] = 6;
//$arr[2]= $arr[1];  //5
//$arr[2]= 6;
//$arr[2] = $arr[2]; //6
//$arr[2] = 6;
//$num = 0;
//for($i=1;$i<=4;$i++) {
//    for($j=1;$j<=4;$j++) {
//        for($k=1;$k<=4;$k++) {
//            if($i != $j && $j != $k&& $i != $k) {
//                $num[] = $i.$j.$k;
//            }
//        }
//    }
//}
//var_dump($num);
//
for($i=0;$i<5;$i++){

}
for($i=1; ;$i++) {
    if($i % 5 == 1) {
//第一次
        $t = $i - round($i/5) - 1;
        if($t % 5 == 1) {
//第二次
            $r = $t - round($t/5) - 1;
            if($r % 5 == 1) {
//第三次
                $x = $r - round($r/5) - 1;
                if($x % 5 == 1) {
//第四次
                    $y = $x - round($x/5) - 1;
                    if($y % 5 == 1) {
//第五次
                        $s = $y - round($y/5) - 1;
                        if($s % 5 == 1) {
                            echo $i;
                            break;
                        }
                    }
                }
            }
        }
    }
}