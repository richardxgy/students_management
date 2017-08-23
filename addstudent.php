<?php require './head.php'; ?>
<?php
$sql        = 'SELECT id, classname FROM classs';
$result     = $mysql->db->query($sql);
$classlist  = array();
while($row  = $result->fetch_array(MYSQLI_ASSOC)){
    $classlist[] = $row;
}
?>

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.php" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="tip-bottom">学生信息管理</a> <a href="#" class="current">学生信息添加</a> </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>添加学生信息</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="#" method="get" class="form-horizontal" id="addform">
                                <div class="control-group">
                                    <label class="control-label">姓名 :</label>
                                    <div class="controls">
                                        <input type="text" name="sname" id="sname" class="span11" placeholder="姓名" />
                                        <span class="err"></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">学号 :</label>
                                    <div class="controls">
                                        <input type="text" name="sno" id="sno" class="span11" placeholder="学号" />
                                        <span class="err"></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">手机 :</label>
                                    <div class="controls">
                                        <input type="text" name="mobile" id="mobile" class="span11" placeholder="手机号" />
                                        <span class="err"></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">身份证 :</label>
                                    <div class="controls">
                                        <input type="text" name="idcount" id="idcount" class="span11" placeholder="身份证号" />
                                        <span class="err"></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">地址 :</label>
                                    <div class="controls">
                                        <input type="text" name="address" id="address" class="span11" placeholder="地址" />
                                        <span class="err"></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">班级 :</label>
                                    <div class="controls">
                                        <select name="cid" id="cid">
                                            <option value="">请选择班级</option>
                                            <?php
                                            //循环数组的方法
                                            foreach($classlist as $k=>$v){
                                                echo '<option value="'.$v['id'].'">'.$v['classname'].'</option>';
                                            }
                                            ?>
                                        </select>
                                        <span class="err"></span>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" id="addstudent" class="btn btn-success">保存</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
<?php require './foot.php'; ?>