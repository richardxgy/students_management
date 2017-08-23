<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/29
 * Time: 9:18
 */
$_SESSION ||
require 'checksession.php';
//方式一：退出登录就是清除登录时创建的SESSION信息
unset($_SESSION['id']);
unset($_SESSION['username']);

//方式二：清除当前用户所有的SESSION信息
session_destroy();

header('Location:./login.html');