<?php
require './checksession.php';





//补全表单信息
$_POST['username']  = $_SESSION['username'];
$_POST['addtimes'] = time();


//删除变量或者元素
//unset(变量名称：$_POST['id']);
$where = 'id =' . $_POST['id'];

unset($_POST['id']);
$sql = adddata($_POST);
//echo $sql;
$r = $mysql->updataData('classs',$_POST,$where);

var_dump($r);