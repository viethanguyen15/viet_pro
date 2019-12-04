<?php
    if(isset($_GET['bann_id'])){
        $bann_id = $_GET['bann_id'];
    }
    $sql_se_bann = "SELECT * FROM aside WHERE bann_id = '$bann_id'";
    $query_se_bann = mysqli_query($conn, $sql_se_bann);
    $row_se_bann = mysqli_fetch_assoc($query_se_bann);
    if(isset($_POST['sbm'])){
        $bann_name = $_POST['bann_name'];
        $bann_description = $_POST['bann_description'];
        $bann_image = $_POST['bann_image'];
        $link_location = $_POST['link_location'];
        if($_FILES['bann_image']['name'] == ''){
            $bann_image = $row_se_bann['bann_image'];
        }
        else{
            $bann_image = $_FILES['bann_image']['name'];
            $bann_image_tmp_name = $_FILES['bann_image']['tmp_name'];
            move_uploaded_file($bann_image_tmp_name, '../images/'.$bann_image);
        }
        $sql_update_bann = "UPDATE aside
                             SET bann_name = '$bann_name', bann_image = '$bann_image', bann_description = '$bann_description', link_location = '$link_location'
                             WHERE bann_id = '$bann_id'";
        $query_update_bann = mysqli_query($conn, $sql_update_bann);
        header('location: index.php?page_layout=banner');                     
    }
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
            <li><a href="">Quản lý Banner</a></li>
            <li class="active">
                <?php echo $row_se_bann['bann_description']; ?>
            </li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php echo $row_se_bann['bann_description']; ?>
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
                                <label>Bann name</label>
                                <input type="text" name="bann_name" required class="form-control" value="<?php echo $row_se_bann['bann_name']; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Bann description</label>
                                <input name="bann_description" required value="<?php echo $row_se_bann['bann_description']; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Bann location</label>
                                <input name="link_location" required value="<?php echo $row_se_bann['link_location']; ?>" class="form-control">
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bann image</label>
                            <input type="file" name="bann_image">
                            <br>
                            <div>
                                <img width="400" height="170" src="../images/<?php echo $row_se_bann['bann_image']; ?>">
                            </div>
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