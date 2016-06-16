<?php 

function realname($id) {

		$model = M('user',NULL ,'user');

		$realname = $model
		-> field ("realname")
		-> where ("id='$id'")
		-> select ();

		return ($realname[0]['realname'] ? $realname[0]['realname'] : "未知用户");
	}
?>