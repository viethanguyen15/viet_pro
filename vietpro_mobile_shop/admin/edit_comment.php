<?php
    if(isset($_GET['comm_id'])){
        $comm_id = $_GET['comm_id'];
    }
    $sql_se_per_comm = "SELECT * FROM comment WHERE comm_id = '$comm_id'";
    $query_se_per_comm = mysqli_query($conn, $sql_se_per_comm);
    $row_se_per_comm = mysqli_fetch_assoc($query_se_per_comm); 
    $sql_se_prd = "SELECT * FROM product ORDER BY prd_id ASC";
    $query_se_prd = mysqli_query($conn, $sql_se_prd);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if(isset($_POST['sbm'])){
        $comm_name = $_POST['comm_name'];
        $comm_mail = $_POST['comm_mail'];
        $comm_date = date("Y-m-d H:i:s");
        $comm_details = $_POST['comm_details'];
        $prd_id = $_POST['prd_id'];
        $sql_update_comm = "UPDATE comment 
                            SET prd_id = '$prd_id', comm_name = '$comm_name', comm_mail = '$comm_mail', 
                                comm_date = '$comm_date', comm_details = '$comm_details' WHERE comm_id = '$comm_id'";
        $query_update_comm = mysqli_query($conn, $sql_update_comm);
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
            <li class="active">
                <?php echo $row_se_per_comm['comm_name']; ?>
            </li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php echo $row_se_per_comm['comm_name']; ?>
            </h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Comment name</label>
                                <input type="text" name="comm_name" required class="form-control" value="<?php echo $row_se_per_comm['comm_name']; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Comment mail</label>
                                <input name="comm_mail" required value="<?php echo $row_se_per_comm['comm_mail']; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sản pẩm quản lý comment</label>
                            <select name="prd_id" class="form-control">
                                    <?php
                                        while($row_se_prd = mysqli_fetch_assoc($query_se_prd)){
                                    ?>
                                        <option <?php if($row_se_per_comm['prd_id'] == $row_se_prd['prd_id']){echo 'selected';} ?> value=<?php echo $row_se_prd['prd_id']; ?>><?php echo $row_se_prd['prd_name']; ?></option>
                                    <?php } ?>    
                                    </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea name="comm_details" required class="form-control" rows="3"><?php echo $row_se_per_comm['comm_details']; ?></textarea>
                            <script>
                                CKEDITOR.replace('comm_details');
                            </script>
                        </div>
                        <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
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