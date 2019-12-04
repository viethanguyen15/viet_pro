<?php
    $sql_se_cat = "SELECT * FROM category ORDER BY cat_id ASC";
    $query_cat = mysqli_query($conn, $sql_se_cat);
    if(isset($_POST['sbm'])){
        $slider_name = $_POST['slider_name'];
        $slider_description =$_POST['slider_description'];
        $cat_id = $_POST['cat_id'];
        $slider_image = $_FILES['slider_image']['name'];
        $file_type = pathinfo($_FILES['slider_image']['name'], PATHINFO_EXTENSION);
        $file_type_allow = array('jpg', 'png');
        if($_FILES['slider_image']['size'] > 102400){
            $error='<div class="alert alert-danger">Just upload file < 2MB</div>';
        }
        if (!in_array(strtolower($file_type), $file_type_allow)) {
            $error='<div class="alert alert-warning">Just upload file png and jpg</div>';
        }
        if(empty($error)) {
            $slider_image_tmp_name = $_FILES['slider_image']['tmp_name'];
            $sql_insert_slider = "INSERT INTO slider (cat_id, slider_name, slider_image, slider_description)
                                  VALUES ('$cat_id', '$slider_name', '$slider_image', '$slider_description')";
            $query_insert_slider = mysqli_query($conn, $sql_insert_slider);
            move_uploaded_file($slider_image_tmp_name, '../images/'.$slider_image);
            header('location: index.php?page_layout=slideshow');
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
            <li class="active">Thêm Slide</li>
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
                                <label>Slide name</label>
                                <input required name="slider_name" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Slide description</label>
                                <input required name="slider_description" class="form-control">
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Slide image</label>
                            <input required name="slider_image" type="file">
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
                        <div class="form-group">
                            <label>Category</label>
                            <select name="cat_id" class="form-control">
                                <?php
                                    while($row_cat = mysqli_fetch_assoc($query_cat)){
                                ?>
                                    <option value=<?php echo $row_cat['cat_id']; ?>><?php echo $row_cat['cat_name']; ?></option>
                                <?php } ?>    
                            </select>
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