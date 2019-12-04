<script>
    function delItem(name) {
        return confirm('bạn có muốn xóa comment của ' +name+ ' không ?');
    }
</script>
<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }
    $record_per_page = 5;
    $offset = $page * $record_per_page - $record_per_page;
    $sql_all_comm = "SELECT * FROM comment";
    $query_all_comm = mysqli_query($conn, $sql_all_comm);
    $num_row = mysqli_num_rows($query_all_comm);
    $total_page = ceil($num_row / $record_per_page);
    $list_page = "";
    $page_prev = $page - 1;
    if($page_prev <= 0){
        $page_prev = 1;
    }
    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=comment&page='.$page_prev.'">Previous</a></li>';
    for ($p = 1; $p <= $total_page; $p++) {
        if($p == $page){
            $active = 'active';
        }
        else{
            $active = '';
        } 
        $list_page .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=comment&page='.$p.'">'.$p.'</a></li>';
    }
    $page_next = $page + 1;
    if($page_next > $total_page){
        $page_prev = $total_page;
    }
    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=comment&page='.$page_next.'">Next</a></li>'; 
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
            <li class="active">Quản lý bình luận<?php ?></li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý bình luận</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_comment" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm bình luận
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
                                <th data-field="name" data-sortable="true">User comment</th>
                                <th data-field="" data-sortable="true">Mail comment</th>
                                <th>Date comment</th>
                                <th>Details comment</th>
                                <th>Product</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql_se_comm = "SELECT * FROM comment INNER JOIN product ON comment.prd_id = product.prd_id ORDER BY comm_id DESC LIMIT $offset, $record_per_page";
                            $query_se_comm = mysqli_query($conn, $sql_se_comm);
                            while($row_se_comm = mysqli_fetch_assoc($query_se_comm)){ 
                        ?>
                            <tr>
                                <td><?php echo $row_se_comm['comm_id']; ?></td>
                                <td><?php echo $row_se_comm['comm_name']; ?></td>
                                <td><?php echo $row_se_comm['comm_mail']; ?></td>
                                <td><?php echo $row_se_comm['comm_date']; ?></td>
                                <td><?php echo $row_se_comm['comm_details']; ?></td>
                                <td><?php echo $row_se_comm['prd_name']; ?></td>
                                <td class="form-group">
                                    <a href="index.php?page_layout=edit_comment&comm_id=<?php echo $row_se_comm['comm_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a onclick="return delItem('<?php echo $row_se_comm['comm_name']; ?>')" href="del_comment.php?comm_id=<?php echo $row_se_comm['comm_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
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