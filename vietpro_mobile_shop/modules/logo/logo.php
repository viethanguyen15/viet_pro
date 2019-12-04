<?php
    $sql_logo = "SELECT * FROM logo";
    $query_logo = mysqli_query($conn, $sql_logo);
    $row = mysqli_fetch_assoc($query_logo);
?>
<div id="logo" class="col-lg-3 col-md-3 col-sm-12">
    <h1><a href="index.php"><img class="img-fluid" src="images/<?php echo $row['logo_image']; ?>"></a></h1>
</div>