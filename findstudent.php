<?php require './head.php'; ?>
<?php
$where = '';

$keywords = $_GET['keywords'];
$urlext = '';
if($keywords){
    $where = 'kw LIKE "%'.$keywords.'%"';
    $urlext .= '&keywords=' . urlencode($keywords);
}
//分页
//1.定义每一页显示多少记录   $pagenum = 20;
//2.确定当前是第几页 $page = 1;  $page = $_GET['page'];
//3.计算总数;celi(allcount/$pagenum)
//4.查询当前页显示的记录
$pageunm = 10;
$page = (int)$_GET['page']?(int)$_GET['page']:1;
$fslist = $mysql ->selectData('students','*',$where,($page-1)*$pageunm,$pageunm);
//查询总记录数量
$totalnum = $mysql->getCount('students',$where);
//计算总的页数
$totpage = ceil($totalnum/$pageunm);

//"SELECT * FROM class WHERE classname LIKE '%关键字%'";
//$kwlist = $mysql ->selectData('shop360_top20_pc','*',$where,0,20);

?>

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="current">学生查询</a> </div>
        </div>
        <div class="container-fluid">
            <hr>
            <form action="findstudent.php" method="get">
                <input type="text" name="keywords"value="<?=$keywords;?>" class="span3" placeholder="关键词" />
                <input type="submit" value="查询">
            </form>


            <div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="DataTables_Table_0_paginate">

                <a class="first ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default" href="./findstudent.php?page=1<?=$urlext;?>">首页</a>
                <?php
                if ($page >= 1){
                    ?>
                    <a tabindex="0" class="previous fg-button ui-button ui-state-default" href="./findstudent.php?page=<?=($page-1).$urlext;?>">上一页</a>
                    <?php
                } ?>
                <span>

    <!-- <a tabindex="0" class="fg-button ui-button ui-state-default ui-state-disabled">1</a> -->
                    <?php
                    $start = $totpage-1 ;

                    for ($i = $start; $i < $page+6 && $i <=$totpage; $i++){
                        echo ' <a class="fg-button ui-button ui-state-default" href="./findstudent.php?page='.$i.$urlext.'" >'.$i.'</a>';
                    }

                    ?>

     </span>
                <?php
                if ($page<$totpage){

                    ?>

                    <a class="last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default" href="./findstudent.php?page=<?=$page+1;?><?=$urlext;?>">下一页</a>
                <?php } ?>
                <a class="last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default" href="./findstudent.php?page=<?=$totpage.$urlext?>">尾页</a>


            </div>


            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>学生查找</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>学生名字</th>
                                    <th>学号</th>
                                    <th>手机</th>
                                    <th>身份证</th>
                                    <th>地址</th>
                                    <th>班级</th>


                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                foreach ($fslist as $key => $value) {
                                    echo '  <tr class="odd gradeX">
                                  <td>'.$value['id'].'</td>
                                  <td>'.str_replace($keywords, '<span class="H">'.$keywords.'</span>', $value['sname']).'</td>
                                  <td>'.$value['sno'].'</td>
                                   <td>'.$value['mobile'].'</td>
                                    <td>'.$value['idcount'].'</td>
                                    <td>'.$value['address'].'</td>
                                    <td>'.$value['cid'].'</td>
                                  
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