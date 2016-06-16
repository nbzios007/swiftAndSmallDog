<?php 

function realName($id) {

		$model = M('user',NULL ,'user');

		$realname = $model
		-> field ("realname")
		-> where ("id='$id'")
		-> select ();

		return ($realname[0]['realname'] ? $realname[0]['realname'] : "未知用户");
	}

function getImgUrl($id) {

		$model = M('user',NULL ,'user');

		$image = $model
		-> field ("image")
		-> where ("id='$id'")
		-> select ();

		return ($image[0]['image'] ? "域名/".$image[0]['image'] : "没有图片");
	}
?>