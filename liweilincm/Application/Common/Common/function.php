<?php

function getfirstchar($s0){ 
	$firstchar_ord=ord(strtoupper($s0{0})); 
	if (($firstchar_ord>=65 and $firstchar_ord<=91)or($firstchar_ord>=48 and $firstchar_ord<=57)) return $s0{0}; 
	$s=iconv("UTF-8","gb2312", $s0); 
	$asc=ord($s{0})*256+ord($s{1})-65536; 
	if($asc>=-20319 and $asc<=-20284)return "A"; 
	if($asc>=-20283 and $asc<=-19776)return "B"; 
	if($asc>=-19775 and $asc<=-19219)return "C"; 
	if($asc>=-19218 and $asc<=-18711)return "D"; 
	if($asc>=-18710 and $asc<=-18527)return "E"; 
	if($asc>=-18526 and $asc<=-18240)return "F"; 
	if($asc>=-18239 and $asc<=-17923)return "G"; 
	if($asc>=-17922 and $asc<=-17418)return "H"; 
	if($asc>=-17417 and $asc<=-16475)return "J"; 
	if($asc>=-16474 and $asc<=-16213)return "K"; 
	if($asc>=-16212 and $asc<=-15641)return "L"; 
	if($asc>=-15640 and $asc<=-15166)return "M"; 
	if($asc>=-15165 and $asc<=-14923)return "N"; 
	if($asc>=-14922 and $asc<=-14915)return "O"; 
	if($asc>=-14914 and $asc<=-14631)return "P"; 
	if($asc>=-14630 and $asc<=-14150)return "Q"; 
	if($asc>=-14149 and $asc<=-14091)return "R"; 
	if($asc>=-14090 and $asc<=-13319)return "S"; 
	if($asc>=-13318 and $asc<=-12839)return "T"; 
	if($asc>=-12838 and $asc<=-12557)return "W"; 
	if($asc>=-12556 and $asc<=-11848)return "X"; 
	if($asc>=-11847 and $asc<=-11056)return "Y"; 
	if($asc>=-11055 and $asc<=-10247)return "Z"; 
	return null; 
}

/**
 * 随机字符串生成
 * @param int $len 生成的字符串长度
 * @return string
 */
function sp_random_string($len = 6) {
	$chars = array(
			"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
			"l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
			"w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
			"H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
			"S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
			"3", "4", "5", "6", "7", "8", "9"
	);
	$charsLen = count($chars) - 1;
	shuffle($chars);    // 将数组打乱
	$output = "";
	for ($i = 0; $i < $len; $i++) {
		$output .= $chars[mt_rand(0, $charsLen)];
	}
	return $output;
}

function upload($upload){
	$upload = new \Think\Upload();
    $upload->maxSize = 3145728;
    $upload->saveName = 'time';
    $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
    $upload->rootPath = "./Uploads/";
    $info = $upload->upload();
    return $info;
}


function getWay($type){
	switch ($type){
		case 1:
			echo "用于幻灯片";
			break;
		case 2:
			echo "用于页面修饰";
			break;
	}
}
