<?php
    $sql_addr = "SELECT * FROM address";
    $query_addr = mysqli_query($conn, $sql_addr);
    $row = mysqli_fetch_assoc($query_addr)
?>
<div id="address" class="col-lg-3 col-md-6 col-sm-12">
    <h3><?php echo $row['title']; ?></h3>
    <p><?php echo $row['addr_cs1']; ?></p>
    <p><?php echo $row['addr_cs2']; ?></p>      
</div>