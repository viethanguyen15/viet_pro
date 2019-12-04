<?php
    $sql_logo_footer = "SELECT * FROM logo_footer";
    $query_logo_footer = mysqli_query($conn, $sql_logo_footer);
    $row_logo_footer = mysqli_fetch_assoc($query_logo_footer);
?>
<div id="logo-2" class="col-lg-3 col-md-6 col-sm-12">
    <h2><a href="#"><img src="images/<?php echo $row_logo_footer['logo_footer_image']; ?>"></a></h2>
    <p>
       <?php echo $row_logo_footer['logo_footer_description']; ?>
    </p>
</div>