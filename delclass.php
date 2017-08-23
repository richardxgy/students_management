<?php require './checksession.php'; ?>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/29
 * Time: 19:46
 */

$id         = $_GET['id'];
$where = 'id = ' . (int)$_GET[id];

$mysql->delData('classs',$where);

header('Location:./index.php');