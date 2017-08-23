<?php
//检查session
require './common.php';
if (!$_SESSION['id']){
    header('Location:./login.html');
}