<?php
    $cat_id = $_GET['cat_id'];
    $cat_name = $_GET['cat_name'];
    $sql_se_acs = "SELECT * FROM product WHERE cat_id = '$cat_id'";
    $query_se_acs = mysqli_query($conn, $sql_se_acs);
    $num_row_acs = mysqli_num_rows($query_se_acs);
?>
    <!--	List Product	-->
    <div class="products">
        <h3>
            <?php  ?> (hiện có <?php echo $num_row_acs; ?> sản phẩm)</h3>
        <div class="product-list row">
            <?php
                while($row = mysqli_fetch_assoc($query)){
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                    <div class="product-item card text-center">
                        <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><img src="admin/products/<?php echo $row['prd_image']; ?>"></a>
                        <h4>
                            <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>">
                                <?php echo $row['prd_name']; ?>
                            </a>
                        </h4>
                        <p>Giá Bán: <span><?php echo $row['prd_price']; ?></span></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!--	End List Product	-->