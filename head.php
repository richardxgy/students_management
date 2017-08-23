<?php require './checksession.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>学生信息管理系统</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="font-awesome/css/font-awesome.css" />
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>
    <span class="text"><?=$_SESSION['username'];?></span><b class="caret"></b></a>
      <ul class="dropdown-menu" style="z-index: 500;">
        <li><a href="#"><i class="icon-user"></i> 修改密码</a></li>
        <li class="divider"></li>
        <li><a href="logout.php"><i class="icon-key"></i> 退出登录</a></li>
      </ul>
    </li>
  </ul>
</div>

<!--sidebar-menu-->
<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <ul>
    <li class="active"><a href="index.php"><i class="icon icon-home"></i> <span>管理班级</span></a> </li>
    <li><a href="addclass.php"><i class="icon icon-signal"></i> <span>添加班级</span></a> </li>
    <li><a href="students.php"><i class="icon icon-home"></i> <span>管理学生</span></a> </li>
    <li><a href="addstudent.php"><i class="icon icon-signal"></i> <span>添加学生</span></a> </li>
      <li><a href="kw.php"><i class="icon icon-signal"></i> <span>关键字管理</span></a> </li>
      <li><a href="findstudent.php"><i class="icon icon-signal"></i> <span>查找学生</span></a> </li>
  </ul>
</div>