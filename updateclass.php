<?php require './head.php'; ?>
<?php
$id         = $_GET['id'];
$sql        = 'SELECT * FROM classs WHERE id = ' . $id;

$result     = $mysql->db->query($sql);

$class = $result->fetch_array(MYSQLI_ASSOC);
?>

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.php" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="tip-bottom">班级信息管理</a> <a href="#" class="current">班级信息修改</a> </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>修改班级信息</h5>
                        </div>
                        <div class="widget-content nopadding">

                            <form action="#" method="get" class="form-horizontal" id="updateclass">
                                <input type="hidden" name="id" id="id" value="<?=$class['id'];?>">
                                <div class="control-group">
                                    <label class="control-label">班级名称 :</label>
                                    <div class="controls">
                                        <input type="text" name="classname" id="classname" value="<?=$class['classname']?>" class="span11" placeholder="班级" />
                                        <input type="hidden" name="username" id="username" value="<?=$_SESSION['username']?>" class="span11" placeholder="" />
                                        <span class="err"></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">班级简介 :</label>
                                    <div class="controls">
                                        <input type="text" name="classdesc" id="classdesc" class="span11" value="<?=$class['classdesc']?>" placeholder="班级介绍" />
                                        <span class="err"></span>
                                    </div>
                                </div>



                                <div class="form-actions">
                                    <button type="button" id="updateclasss" class="btn btn-success">保存</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
<?php require './foot.php'; ?>