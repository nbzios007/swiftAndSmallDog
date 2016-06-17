<?php


function appToken($userid, $pwd, $phone, $LoginClient, $DeviceNumber){
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

$encrypt = M("encrypt",NULL,'blizzard');
$ishave = $encrypt
->where("Phone = '$phone'")
->select();

if ($ishave) {
	$data =  $encrypt
	->where("UserID=$userid")
	->save(
		array("Token"=>$key,
			"Phone"=>$phone,
			"LoginClient"=>$LoginClient,
			"DeviceNumber"=>$DeviceNumber,
			"EndTime"=>(time()+21600)
			));
}else{
$data =  $encrypt->
add(
	array("UserID"=>$userid,
			"Token"=>$key,
			"Phone"=>$phone,
			"LoginClient"=>$LoginClient,
			"DeviceNumber"=>$DeviceNumber,
			"EndTime"=>(time()+21600)
			));
}
return $key;
}

function verification($token,$userid)
{
$encrypt = M("encrypt",NULL,'blizzard');

$ishave = $encrypt
->field("EndTime")
->where("UserID = '$userid' and Token = '$token' and EndTime >".time())
->select();

if ($ishave) {
		$data =  $encrypt
	->where("UserID=$userid")
	->save(array("EndTime"=>(time()+21600)
			));
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