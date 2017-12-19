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

//人民币数字转大写
function cny($ns) {
	$cnums = array("零", "壹", "贰", "叁", "肆", "伍", "陆", "柒", "捌", "玖");
	$cnyunits = array("圆", "角", "分");
	$grees = array("拾", "佰", "仟", "万", "拾", "佰", "仟", "亿");

	$ns = str_replace(',', '', $ns);

	list($ns1, $ns2) = explode(".", $ns, 2);
	$ns2 = array_filter(array($ns2[1], $ns2[0]));
	$ret = array_merge($ns2, array(implode("", _cny_map_unit(str_split($ns1), $grees)), ""));
	$ret = implode("", array_reverse(_cny_map_unit($ret, $cnyunits)));
	return str_replace(array_keys($cnums), $cnums, $ret);
}

function _cny_map_unit($list, $units) {
	$ul = count($units);
	$xs = array();
	foreach(array_reverse($list) as $x) {
		$l = count($xs);
		if($x != "0" || !($l % 4))
			$n = ($x == '0' ? '' : $x) . ($units[($l - 1) % $ul]);
		else
			$n = is_numeric($xs[0][0]) ? $x : '';
		array_unshift($xs, $n);
	}
	return $xs;
}