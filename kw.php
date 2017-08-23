<?php require './head.php'; ?>
<?php
    $where = '1';

    $keywords = trim($_GET['keywords']);
    $c1       = trim($_GET['c1']);
    $c2       = trim($_GET['c2']);

    $urlext = '';
        if($keywords){
            $where .= ' AND kw LIKE "%'.$keywords.'%"';
            $urlext .= '&keywords=' . urlencode($keywords);
        }

        if($c1){
            $where .= ' AND c1 LIKE "%'.$c1.'%"';
            $urlext .= '&c1=' . urlencode($c1);
        }

        if($c2){
            $where .= ' AND c2 LIKE "%'.$c2.'%"';
            $urlext .= '&c2=' . urlencode($c2);
        }
//分页
//1.定义每一页显示多少记录   $pagenum = 20;
//2.确定当前是第几页 $page = 1;  $page = $_GET['page'];
//3.计算总数;celi(allcount/$pagenum)
//4.查询当前页显示的记录
$pageunm = 20;
$page = (int)$_GET['page']?(int)$_GET['page']:1;
$kwlist = $mysql ->selectData('shop360_top20_pc','*',$where ,($page-1)*$pageunm,$pageunm);
//查询总记录数量
$totalnum = $mysql->getCount('shop360_top20_pc',$where);
//计算总的页数
$totpage = ceil($totalnum/$pageunm);

//"SELECT * FROM class WHERE classname LIKE '%关键字%'";
//$kwlist = $mysql ->selectData('shop360_top20_pc','*',$where,0,20);

?>

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="current">关键词管理</a> </div>
        </div>
        <div class="container-fluid">
            <hr>

            <form action="kw.php" method="get">
                <input type="text" name="keywords"value="<?=$keywords;?>" class="span3" placeholder="关键词" />

                <input type="text" name="c1"value="<?=$c1;?>" class="span3" placeholder="类目一" />

                <input type="text" name="c2"value="<?=$c2;?>" class="span3" placeholder="类目二" />


                <input type="submit" value="查询">
            </form>


            <div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="DataTables_Table_0_paginate">

                <a class="first ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default" href="./kw.php?page=1<?=$urlext;?>">首页</a>
                <?php
                   if ($page > 1){
                ?>
                    <a tabindex="0" class="previous fg-button ui-button ui-state-default" href="./kw.php?page=<?=($page-1).$urlext;?>">上一页</a>
                <?php
               } ?>
                <span>

                <!-- <a tabindex="0" class="fg-button ui-button ui-state-default ui-state-disabled">1</a> -->
                    <?php
                    $start = $page +1;
                    if($totpage - $page<5){
                        $start = $totpage-4;
                    }
                    for ($i = $start; $i < $page+6 && $i <=$totpage; $i++){
                        echo ' <a class="fg-button ui-button ui-state-default" href="./kw.php?page='.$i.$urlext.'" >'.$i.'</a>';
                    }

                    ?>

     </span>
                <?php
                if ($page<$totpage){

                ?>

                <a class="last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default" href="./kw.php?page=<?=$page+1;?><?=$urlext;?>">下一页</a>
                <?php } ?>
                <a class="last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default" href="./kw.php?page=<?=$totpage.$urlext?>">尾页</a>


            </div>


            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>关键词管理</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>关键词</th>
                                    <th>类目一</th>
                                    <th>类目二</th>
                                    <th>类目三</th>

                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                foreach ($kwlist as $key => $value) {
                                    echo '  <tr class="odd gradeX">
                                  <td>'.$value['id'].'</td>
                                  <td>'.str_replace($keywords, '<span class="H">'.$keywords.'</span>', $value['kw']).'</td>
                                  <td>'.str_replace($c1, '<span class="H">'.$c1.'</span>', $value['c1']).'</td>
                                   <td>'.str_replace($c2, '<span class="H">'.$c2.'</span>', $value['c2']).'</td>
                                    <td>'.$value['c3'].'</td>
                                  
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