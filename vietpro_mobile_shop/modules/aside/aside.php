<?php
    $sql_bann = "SELECT * FROM aside ORDER BY bann_id ASC";
    $query_bann = mysqli_query($conn, $sql_bann);
?>
<div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
    <div id="banner">
    <?php while($row_bann = mysqli_fetch_assoc($query_bann)){ ?>
        <div class="banner-item">
            <a href="<?php echo $row_bann['link_location']; ?>"><img class="img-fluid" src="images/<?php echo $row_bann['bann_image']; ?>"></a>
        </div>
    <?php } ?>
</div>