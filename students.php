<?php require './head.php'; ?>

<?php
    //左连接多表查询;
    $sql = 'SELECT s.*,c.classname FROM students as s LEFT JOIN classs as c ON s.cid = c.id';
    $result = $mysql->db->query($sql);
    $students = array();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $students[] = $row;
    }

?>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="current">学生管理</a> </div>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>学生管理</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>姓名</th>
                                    <th>学号</th>
                                    <th>手机</th>
                                    <th>身份证</th>
                                    <th>地址</th>
                                    <th>添加时间</th>
                                    <th>班级</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($students as $key => $value){
                                    echo   '<tr>
                              <td>'.$value['id'].'</td>
                              <td>'.$value['sname'].'</td>
                              <td>'.$value['sno'].'</td>
                              <td>'.$value['mobile'].'</td>
                              <td>'.$value['idcount'].'</td>
                              <td>'.$value['address'].'</td>
                              <td>'.date('Y-m-d H:i:s', $value['opertimes']).'</td>
                              <td>'.$value['classname'].'</td>
                              <td><a href="./updates.php?id='.$value['id'].'">修改</a>|
                              <a href="./dels.php?id='.$value['id'].'">删除</A></td>
                            </tr>';
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require './foot.php'; ?>