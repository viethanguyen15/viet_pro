<?php
    $sql_hotline = "SELECT * FROM hotline";
    $query_hotline = mysqli_query($conn, $sql_hotline);
    $row = mysqli_fetch_assoc($query_hotline)
?>
<div id="hotline" class="col-lg-3 col-md-6 col-sm-12">
    <h3><?php echo $row['title']; ?></h3>
    <p><?php echo $row['phone']; ?></p>
    <p><?php echo $row['email']; ?></p>
</div>