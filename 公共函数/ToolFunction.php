<?php 

//填写时间，与当前时间做对比
//当前时间大于输入时间，输出为0，否则为1
function contrastTime($inputTime) {

		$currenttime = time();

		return ($currenttime >= $inputTime ? 0 : 1);
	}
?>