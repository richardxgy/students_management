<?php
require './function.php';
    $_SESSION || session_start();

    header('Content-type:text/html;charset="UTF-8"');

    require './inc/db.config.php';
    require './class/DB.php';
    //创建DB的实例对象
    $mysql = new DB($db_config);
    //连接到数据库检查账号和密码的有效性
;