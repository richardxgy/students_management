<?php
require './common.php';


    $username = $_POST['username'];
    $passwd = $_POST['passwd'];



    $sql = 'SELECT id, username, passwd FROM admin WHERE username="'.$username.'"';

    $result = $mysql->db->query($sql);

    $row = $result->fetch_array(MYSQLI_ASSOC);

    if (!$row){
        $r = array('r'=>'invail_username');
        echo json_encode($r);
        exit;
    };

    if ($row['passwd']!=md5($passwd)){
        $r = array('r'=>'invail_passwd');
        echo json_encode($r);
        exit;
    };
    //保存session
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    //跟新登陆时间  和次数  新的SQL语句:UPDATA  表名 SET 字段1 = 新的值,字段2='新值'...[WHERE 判断条件]
    //时间戳:time();
    $sql =' UPDATE admin SET nums = nums + 1, lasttimes ='.time().' WHERE id = '.$row['id'];

    $mysql->db->query($sql);
    $r = array('r'=>'success');
        echo json_encode($r);



