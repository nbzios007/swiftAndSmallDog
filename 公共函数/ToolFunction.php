<?php 

use Think\Upload;

//填写时间，与当前时间做对比
//当前时间大于输入时间，输出为0，否则为1
function contrastTime($inputTime) {

		$currenttime = time();

		return ($currenttime >= $inputTime ? 0 : 1);
	}

//返回锦囊的type
function silkbagType($direct) {
	return $direct % 4;
}

//删除文件
function deleteFile ($filepath) {

       if( is_file( $filepath ) ) {
            if( unlink($filepath) ) {
            return "删除成功";
        }
        else {
            return "文件删除失败，权限不够";
        }
    }
    else {
        return "不是有一个有效的文件";
    }
}
?>