<?php
return array(
    //'配置项'=>'配置值'
    'URL_CASE INSENSITIVE' =>true,
    "DB_DEPLOY_TYPE"=>1, //是否启用分布式
    //数据库配置
    'DB_RW_SEPARATE'=>false, //是否启用智能读写分离
    'DB_TYPE'      =>  'mysqli',     // 数据库类型
    'DB_HOST'      =>  '106.14.60.210',     // 服务器地址
    'DB_NAME'      =>  'english_game',     // 数据库名
    'DB_USER'      =>  'guest',     // 用户名
    'DB_PWD'       =>  'Guestisno2!',     // 输入安装MySQL时设置的密码
    'DB_PORT'      =>  '3306',     // 端口
    'DB_PREFIX'    =>  '',     // 数据库表前缀
    'DB_DSN'       =>  '',     // 数据库连接DSN 用于PDO方式
    'CACHE_OPEN'=>false,
    'APP_USE_REDIS' => false,//是否开启哨兵redis缓存 ；前提是Common / Config / config.php APP_USE_REDIS_SENTINEL 支持 才生效
    //测试
    'TEST_VALUE' => "qwerttyui123",
    'USER_COOKIE_KEY' => "qwerttyui123",
    'USER_LOGIN_COOKIE' => "user_login",
);