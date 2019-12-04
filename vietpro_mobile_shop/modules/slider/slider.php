<?php

    $sql_se_slide = "SELECT * FROM slider INNER JOIN category ON slider.cat_id = category.cat_id ORDER BY slider_id ASC";
    $query_se_slide = mysqli_query($conn, $sql_se_slide);
    // $sql_se_cat = "SELECT * FROM category";
    // $query_se_cat = mysqli_query($conn, $sql_se_cat);
    // $row = mysqli_fetch_assoc($query_se_cat);
?>
<div id="slide" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ul class="carousel-indicators">
    <?php 
      $i = 0;
       foreach ($query_se_slide as $key => $value) {
    ?>
      <li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active';}else{echo '';} ?>"></li>
      <?php 
        $i++;
       } 
      ?>

    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
    <?php 
      $i = 0;
      foreach ($query_se_slide as $key => $value) { 
    ?>
      <div class="carousel-item <?php if($i == 0){echo 'active';}else{echo '';} ?>">
      <?php $i++; ?>
        <a href="index.php?page_layout=category&cat_name=<?php echo $value['cat_name']; ?>&cat_id=<?php echo $value['cat_id']; ?>"><img src="images/<?php echo $value['slider_image']; ?>" alt="Vietpro Academy"></a>
      </div>
    <?php } ?>
    </div>
  <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#slide" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#slide" data-slide="next">
       <span class="carousel-control-next-icon"></span>
    </a>

</div>
