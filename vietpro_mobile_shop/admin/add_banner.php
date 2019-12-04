<?php
     if(isset($_POST['sbm'])){
        $bann_name = $_POST['bann_name'];
        $bann_description =$_POST['bann_description'];
        $link_location = $_POST['link_location'];
        $bann_image = $_FILES['bann_image']['name'];
        $file_type = pathinfo($_FILES['bann_image']['name'], PATHINFO_EXTENSION);
        $file_type_allow = array('jpg', 'png');
        if($_FILES['bann_image']['size'] > 2097152){
            $error='<div class="alert alert-danger">Just upload file < 2MB</div>';
        }
        if (!in_array(strtolower($file_type), $file_type_allow)) {
            $error='<div class="alert alert-warning">Just upload file png and jpg</div>';
        }
        if(empty($error)){
            $bann_image_tmp_name = $_FILES['bann_image']['tmp_name'];
            $sql_insert_bann = "INSERT INTO aside (bann_name, bann_image, bann_description, link_location)
                                  VALUES ('$bann_name', '$bann_image', '$bann_description', '$link_location')";
            $query_insert_bann = mysqli_query($conn, $sql_insert_bann);
            move_uploaded_file($bann_image_tmp_name, '../images/'.$bann_image);
            header('location: index.php?page_layout=banner');
        }                       
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="index.php">
                    <svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg>
                </a>
            </li>
            <li><a href="">Quản lý Slide</a></li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm Slide</h1>
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
                                <label>Bann name</label>
                                <input required name="bann_name" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Bann description</label>
                                <input required name="bann_description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bann location</label>
                                <input required name="link_location" class="form-control">
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bann image</label>

                            <input required name="bann_image" type="file">
                                <?php 
                                   if(isset($error)){
                                        echo $error;
                                    }
                                ?>
                            <br>
                            <div>
                                <img src="img/download.jpeg">
                            </div>
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