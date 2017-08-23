<?php require './checksession.php'; ?>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/28
 * Time: 19:59
 */
$id         = $_GET['id'];
$where = 'id = ' . (int)$_GET[id];

$mysql->delData('students',$where);

header('Location:./students.php');