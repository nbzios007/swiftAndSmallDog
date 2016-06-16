<?php
$con6 = mysql_connect('115.28.132.137','root','thomasandhisfriends','blizzard');
mysql_select_db('blizzard',$con6);

if(!$con6){  
    die('无法连接服务器' .mysql_error());
}
mysql_query("SET NAMES 'UTF8'");
date_default_timezone_set('Etc/GMT-8'); 

function appToken($pwd, $phone, $LoginClient, $DeviceNumber){
 $key = create_guid();
   // 加密

$iv = "";
$info = array(
    '0x13','0x34','0x56','0x78',
    '0x91','0xAB','0xCD','0xEF',
    '0x11','0x34','0x56','0x78',
    '0x91','0xAB','0xCD','0xEF'
);
for ($i = 0; $i < 16; $i ++) {
    $iv .= chr($info[$i]);
}

$userInfo["password"] = md5($pwd);  //注意故意写 根据你的需求配置

if ($userInfo["password"]) {
    $privateKey = strtolower($userInfo["password"]);
} else {
    $privateKey = strtolower(md5(""));
}
$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $privateKey, pkcs5_pad($key), MCRYPT_MODE_CBC, $iv);

$token=base64_encode($encrypted);
$res = mysql_query("INSERT INTO blizzard.encrypt (Token,Phone,LoginClient,DeviceNumber) VALUES ($key,$phone,$LoginClient,$DeviceNumber)");
return $token;
}

/**
*
* @todo 加密补齐
* @return string
*/
function pkcs5_pad($text) {
$size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
$pad = $size - (strlen($text) % $size);
return $text . str_repeat(chr($pad), $pad);
}

/**
*
* @todo 获取唯一id
* @return string
*/
function create_guid(){
$charid = strtoupper(md5(uniqid(mt_rand(), true)));
return $charid;
}