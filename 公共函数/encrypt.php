<?php

/*获取token
userid 老师id
pwd 密码
phone 手机号
loginclient 客户端类型
devicenumber 设备唯一码（ios为随机数）

*/
function appToken($userid, $pwd, $phone, $LoginClient, $DeviceNumber, $DeviceInfo){
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

$encrypt = M("encrypt",NULL,'mobile');
$ishave = $encrypt
->where("Phone = '$phone' and DeviceNumber = $DeviceNumber and LoginClient = $LoginClient")
->select();

if ($ishave) {
// 下线所有设备
		$temp =  $encrypt
	->where("UserID = $userid and IsUse = 1")
	->save(
		array("IsUse = 0"));

// 登录此设备
	$data =  $encrypt
    ->where("Phone = '$phone' and DeviceNumber = $DeviceNumber and LoginClient = $LoginClient")
	->save(
		array("Token"=>$key,
			"EndTime"=>(time()+21600),
			"IsUser"=>1
			));
}else{
// 下线所有设备
		$temp =  $encrypt
	->where("UserID = $userid and IsUse = 1")
	->save(
		array("IsUse = 0"));

// 添加设备
$data =  $encrypt->
add(
	array("UserID"=>$userid,
			"Token"=>$key,
			"Phone"=>$phone,
			"LoginClient"=>$LoginClient,
			"DeviceNumber"=>$DeviceNumber,
			"DeviceInfo"=>$DeviceInfo,
			"EndTime"=>(time()+21600),
		    "IsUser"=>1
			));
}
return $token;
}


/* 验证token
token app上传
userid 用户id
*/
function verification($token,$userid)
{
$encrypt = M("encrypt",NULL,'mobile');

// 验证
$ishave = $encrypt
->field("EndTime")
->where("UserID = '$userid' and Token = '$token' and IsUse = 1 and EndTime >".time())
->select();

if ($ishave) {
	// 续费认证
		$data =  $encrypt
	->where("UserID=$userid and IsUse = 1")
	->save(array("EndTime"=>(time()+21600)
			));
}else
{
	// 认证过期
	$data =  $encrypt
	->where("UserID=$userid and IsUse = 1")
	->save(array("IsUse"=>0));
}

return $ishave;
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