<?php

/**
 * 循环加递归，实现全排列
 * @param $arr array(2,3,6,7)
 * @param $str
 * example: func2(array(2, 3, 6, 7), '')
 */
function func2($arr, $str){
    $cnt = count($arr);
    if($cnt == 1){
        echo $str . $arr[0] . "\n<br>";
    }  else {
        for ($i = 0; $i < count($arr); $i++) {
            $tmp = $arr[0];
            $arr[0] = $arr[$i];
            $arr[$i] = $tmp;
            func2(array_slice($arr, 1), $str . $arr[0]);
        }
    }
}