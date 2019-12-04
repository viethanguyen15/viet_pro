<script>
    function delItem(slider_des) {
        return confirm('Bạn có muốn xóa slide ' +slider_des+ ' khỏi danh sách không?');
    }
</script>
<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }
    //limit
    $record_per_page = 3;
    $offset = $page * $record_per_page - $record_per_page;
    $sql = "SELECT * FROM slider";
    $query = mysqli_query($conn, $sql);
    $num_row = mysqli_num_rows($query);
    $total_page = ceil($num_row / $record_per_page);
    //button preview
    $list_page = "";
    $page_prev = $page - 1;
    if($page_prev <= 0){
        $page_prev = 1;
    }
    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=slideshow&page='.$page_prev.'">&laquo;</a></li>';
    for($p = 1; $p <= $total_page; $p++){
        if($p == $page){
            $active = 'active';
        }
        else{
            $active = "";
        }
        $list_page .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=slideshow&page='.$p.'">'.$p.'</a></li>';
    }
    //button next
    $page_next = $page + 1;
    if($page_next > $total_page){
        $page_next = $total_page;
    }
    $list_page .= '<li class="page-item "><a class="page-link" href="index.php?page_layout=slideshow&page='.$page_next.'">&raquo;</a></li>';
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg>
                </a>
            </li>
            <li class="active">Quản lý slideshow
                <?php ?>
            </li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý Slide</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_slideshow" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm slide
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">slide name</th>
                                <th data-field="" data-sortable="true">slide image</th>
                                <th>category</th>
                                <th>slide description</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql_se_slide = "SELECT * FROM slider INNER JOIN category ON slider.cat_id = category.cat_id ORDER BY slider_id DESC LIMIT $offset, $record_per_page";
                                $query_se_slide = mysqli_query($conn, $sql_se_slide);
                                while($row_se_slide = mysqli_fetch_assoc($query_se_slide)){
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row_se_slide['slider_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_se_slide['slider_name']; ?>
                                    </td>
                                    <td>
                                        <img width="280" height="140" src="../images/<?php echo $row_se_slide['slider_image']; ?>" alt=""> 
                                    </td>
                                    <td>
                                        <?php echo $row_se_slide['cat_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_se_slide['slider_description']; ?>
                                    </td>
                                    <td class="form-group">
                                        <a href="index.php?page_layout=edit_slideshow&slider_id=<?php echo $row_se_slide['slider_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a onclick="return delItem('<?php echo $row_se_slide['slider_description']; ?>')" href="del_slideshow.php?slider_id=<?php echo $row_se_slide['slider_id']; ?>"
                                            class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php echo $list_page; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->