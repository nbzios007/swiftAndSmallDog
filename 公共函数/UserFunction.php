<?php 

//通过id获取niu_user库中user表中的realname
function realName($userid) {

		$model = M('user',NULL ,'user');

		$realname = $model
		-> field ("realname")
		-> where ("id='$userid'")
		-> select ();

		return ($realname[0]['realname'] ? $realname[0]['realname'] : "未知用户");
	}

//通过id获取niu_user库中user表中的image，并拼接成url
function getImgUrl($userid) {

		$model = M('user',NULL ,'user');

		$image = $model
		-> field ("image")
		-> where ("id='$userid'")
		-> select ();

		return ($image[0]['image'] ? "域名/".$image[0]['image'] : NULL);
	}

//niu_user库user表中是否存在username
function hasUserName($userid) {
	$model = M('user',NULL ,'user');
	$username = $model
			-> field ("username")
			-> where ("id='$userid'")
			-> select ();
	return ($username[0]['username'] ? true : false);
}

//niu_user库user表中是否存在手机号
function hasPhone($userid) {
	$model = M('user',NULL ,'user');
	$username = $model
			-> field ("phone")
			-> where ("id='$userid'")
			-> select ();
	return ($username[0]['phone'] ? true : false);
}

//niu_user库user表中获取username
function getUserName($userid) {
	$model = M('user',NULL ,'user');
	$username = $model
			-> field ("username")
			-> where ("id='$userid'")
			-> select ();
	return $username[0]['username'];
}

//niu_user库user表中获取手机号
function getPhone($userid) {
	$model = M('user',NULL ,'user');
	$username = $model
			-> field ("phone")
			-> where ("id='$userid'")
			-> select ();
	return $username[0]['phone'];
}

//niu_user库user表中获取性别
function getSex($userid) {
	$model = M('user',NULL ,'user');
	$username = $model
			-> field ("sex")
			-> where ("id='$userid'")
			-> select ();
	return $username[0]['sex'];
}

//niu_mobile库user表中获取username
function getMobileUserName($userid) {
	$model = M('user',NULL ,'mobile');
	$username = $model
			-> field ("username")
			-> where ("userid='$userid'")
			-> select ();
	return $username[0]['username'];
}

//niu_mobile库user表中获取phone
function getMobilePhone($userid) {
	$model = M('user',NULL ,'mobile');
	$username = $model
			-> field ("phone")
			-> where ("userid='$userid'")
			-> select ();
	return $username[0]['phone'];
}

?>