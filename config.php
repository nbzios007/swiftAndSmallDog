<?php

return array(
    //'配置项'=>'配置值'
    //数据库配置信息
'DB_TYPE'   => 'mysql', // 数据库类型
// 'DB_HOST'   => ’lacalhost’, // 服务器地址
'DB_HOST'   => '115.28.132.137', // 服务器地址
'DB_NAME'   => 'niu_learn', // 数据库名
'DB_USER'   => 'root', // 用户名
'DB_PWD'    => 'thomasandhisfriends', // 密码
'DB_PORT'   => 3306, // 端口
'DB_PREFIX' => '', // 数据库表前缀 
'DB_CHARSET'=> 'utf8', // 字符集
'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增

'blog' => array(
    'DB_TYPE'   => 'mysql', // 数据库类型
'DB_HOST'   => '115.28.132.137', // 服务器地址
'DB_NAME'   => 'niu_blog', // 数据库名
'DB_USER'   => 'root', // 用户名
'DB_PWD'    => 'thomasandhisfriends', // 密码
'DB_PORT'   => 3306, // 端口
'DB_PREFIX' => '', // 数据库表前缀 
'DB_CHARSET'=> 'utf8', // 字符集
'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增

),

'user' => array(
    'DB_TYPE'   => 'mysql', // 数据库类型
'DB_HOST'   => '115.28.132.137', // 服务器地址
'DB_NAME'   => 'niu_user', // 数据库名
'DB_USER'   => 'root', // 用户名
'DB_PWD'    => 'thomasandhisfriends', // 密码
'DB_PORT'   => 3306, // 端口
'DB_PREFIX' => '', // 数据库表前缀 
'DB_CHARSET'=> 'utf8', // 字符集
'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增

),

'mobile' => array(
    'DB_TYPE'   => 'mysql', // 数据库类型
'DB_HOST'   => '115.28.132.137', // 服务器地址
'DB_NAME'   => 'niu_mobile', // 数据库名
'DB_USER'   => 'root', // 用户名
'DB_PWD'    => 'thomasandhisfriends', // 密码
'DB_PORT'   => 3306, // 端口
'DB_PREFIX' => '', // 数据库表前缀 
'DB_CHARSET'=> 'utf8', // 字符集
'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增

),

"LOAD_EXT_FILE"=>"UserFunction,ToolFunction,encrypt,OtherFunction,RateFunction"

);
