<?php
namespace Home\Controller;
use Think\Controller;

class KeyController extends Controller
{
public function arrays($userid, $pwd, $phone, $LoginClient, $DeviceNumber){


//   写入token （一般在登录时使用）
$token = appToken($userid, $pwd, $phone, $LoginClient, $DeviceNumber);
echo($token);



// 验证token  （6小时过期，若使用此函数token时间会续期）
$istoken = verification($token, $userid);
echo "<br/>";
echo($istoken?"yes":"NO");
}
}
