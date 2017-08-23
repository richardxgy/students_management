<?php
require './checksession.php';

// var_dump($_POST);
//把字符串分割成数组
$str = 'classname, classdesc, username, addtimes';
$strA = explode(', ', $str);
// var_dump($strA);

//把数组转成字符串
// $str1 = implode(', ', $_POST);

//补全表单信息
$_POST['username']  = $_SESSION['username'];
$_POST['opertimes'] = time();
$_POST['cid']       = (int)$_POST['cid'];

//删除变量或者元素
//unset(变量名称：$_POST['cid']);

$sql = adddata($_POST);
echo $sql;
$r = $mysql->db->query($sql);

var_dump($r);
