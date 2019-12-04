<?php
    $sql_se_prd = "SELECT * FROM product ORDER BY prd_id ASC";
    $query_se_prd = mysqli_query($conn, $sql_se_prd);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if(isset($_POST['sbm'])){
        $prd_id = $_POST['prd_id'];
        $comm_name = $_POST['comm_name'];
        $comm_mail = $_POST['comm_mail'];
        $comm_date = date("Y-m-d H:i:s");
        $comm_details = $_POST['comm_details'];
        $sql_insert_comm = "INSERT INTO comment (prd_id, comm_name, comm_mail, comm_date, comm_details)
                            VALUES ('$prd_id', '$comm_name', '$comm_mail', '$comm_date', '$comm_details')";
        $query_insert_comm = mysqli_query($conn, $sql_insert_comm);
        header('location: index.php?page_layout=comment');                    
    }
?>
<script src="ckeditor/ckeditor.js"></script>
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
            <li><a href="">Quản lý comment</a></li>
            <li class="active">Thêm comment</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm comment</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>comment name</label>
                                <input required name="comm_name" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>comment mail</label>
                                <input required name="comm_mail" class="form-control">
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sản phẩm quản lý comment</label>
                            <select name="prd_id" class="form-control">
                                    <?php
                                        while($row_se_prd = mysqli_fetch_assoc($query_se_prd)){
                                    ?>
                                        <option value=<?php echo $row_se_prd['prd_id']; ?>><?php echo $row_se_prd['prd_name']; ?></option>
                                    <?php } ?>    
                                    </select>
                        </div>
                        <div class="form-group">
                            <label>Bình luận sản phẩm</label>
                            <textarea required name="comm_details" class="form-control" rows="3"></textarea>
                            <script>
                                CKEDITOR.replace('comm_details');
                            </script>
                        </div>
                        <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row -->

</div>
<!--/.main-->