<?php
    $sql_ser = "SELECT * FROM service";
    $query_ser = mysqli_query($conn, $sql_ser);
    $row = mysqli_fetch_assoc($query_ser)
?>
<div id="service" class="col-lg-3 col-md-6 col-sm-12">
	<h3><?php echo $row['title']; ?></h3>
	<p><?php echo $row['service_1'] ?></p>
	<p><?php echo $row['service_2']; ?></p>
</div>