<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/28
 * Time: 19:25
 */
    require './checksession.php';
    //$id = $_POST['id'];
//    $sname   = $_POST['sname'];
//    $sno   = $_POST['sno'];
//    $mobile   = $_POST['mobile'];
//    $idcount   = $_POST['idcount'];
//    $address   = $_POST['address'];
//    $username = $_POST['username'];
//    $cid   = $_POST['cid'];
//
//
//
//$sql = 'UPDATE students SET  sname="'.$sname.'", sno="'.$sno.'", mobile="'.$mobile.'", idcount="'.$idcount.'", address="'.$address.'", username="'.$username.'", opertimes='.time().', cid = '.$cid.'  WHERE id = ' . $_POST['id'];
////$result = $db->query($sql);
//
//echo $sql;
////执行 sql语句  必须写
//$r =$db->query($sql);


$_POST['cid'] =(int)$_POST['cid'];
$_POST['opertimes'] = time();
$_POST['username'] = $_SESSION['username'];

$where = 'id = '.$_POST['id'];
unset($_POST['id']);

var_dump($_POST);

$r = $mysql->updataData('students',$_POST,$where);
var_dump($r);