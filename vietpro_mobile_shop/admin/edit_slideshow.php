<?php
    if(isset($_GET['slider_id'])){
        $slider_id = $_GET['slider_id'];
    }
    $sql_se_cat = "SELECT * FROM category ORDER BY cat_id ASC";
    $query_cat = mysqli_query($conn, $sql_se_cat);
    $sql_se_slide = "SELECT * FROM slider WHERE slider_id = '$slider_id'";
    $query_se_slide = mysqli_query($conn, $sql_se_slide);
    $row_se_slide = mysqli_fetch_assoc($query_se_slide);
    if(isset($_POST['sbm'])){
        $cat_id = $_POST['cat_id'];
        $slider_name = $_POST['slider_name'];
        $slider_description = $_POST['slider_description'];
        $slider_image = $_POST['slider_image'];
        if($_FILES['slider_image']['name'] == ''){
            $slider_image = $row_se_slide['slider_image'];
        }
        else{
            $slider_image = $_FILES['slider_image']['name'];
            $slider_image_tmp_name = $_FILES['slider_image']['tmp_name'];
            move_uploaded_file($slider_image_tmp_name, '../images/'.$slider_image);
        }
        $sql_update_slide = "UPDATE slider
                             SET cat_id = '$cat_id', slider_name = '$slider_name', slider_image = '$slider_image', slider_description = '$slider_description'
                             WHERE slider_id = '$slider_id'";
        $query_update_slide = mysqli_query($conn, $sql_update_slide);
        header('location: index.php?page_layout=slideshow');                     
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
            <li><a href="">Quản lý Slide</a></li>
            <li class="active">
                <?php echo $row_se_slide['slider_description']; ?>
            </li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php echo $row_se_slide['slider_description']; ?>
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
                                <label>Slide name</label>
                                <input type="text" name="slider_name" required class="form-control" value="<?php echo $row_se_slide['slider_name']; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Slide description</label>
                                <input name="slider_description" required value="<?php echo $row_se_slide['slider_description']; ?>" class="form-control">
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Slide image</label>
                            <input type="file" name="slider_image">
                            <br>
                            <div>
                                <img width="400" height="170" src="../images/<?php echo $row_se_slide['slider_image']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="cat_id" class="form-control">
                                    <?php
                                        while($row_cat = mysqli_fetch_assoc($query_cat)){
                                    ?>
                                        <option <?php if($row_se_slide['cat_id'] == $row_cat['cat_id']){echo 'selected';} ?> value=<?php echo $row_cat['cat_id']; ?>><?php echo $row_cat['cat_name']; ?></option>
                                    <?php } ?>    
                                    </select>
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