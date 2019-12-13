 <!--	Latest Product	-->
<?php
     $prd_id = isset($_GET['prd_id']) ? $_GET['prd_id'] : '';
    $sql = "SELECT * FROM product ORDER BY prd_id DESC LIMIT 6";
    $query = mysqli_query($conn, $sql);
?> 
                <div class="products">
                    <h3>Sản phẩm mới</h3>
                    <div class="product-list row">
                        <?php while($row = mysqli_fetch_assoc($query)){ ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                            <div class="product-item card text-center">
                                <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>">
                                    <img src="admin/products/<?php echo $row['prd_image']; ?>" data-toggle="tooltip" data-html="true"
                                         title="<div class='text-center text-light'>
                                                    <h3><?php echo $row['prd_name']; ?></h3>
                                                    <span class='text-danger'>Gía bán</span>: <?php echo $row['prd_price']; ?>
                                                </div>
                                                <div id='status' class='<?php if($row['prd_status'] == 1){echo 'text-success';}else{echo 'text-warning';} ?>'>
                                                    <?php
                                                        if($row['prd_status'] == 1){
                                                            echo 'Còn hàng';
                                                        }else{
                                                            echo 'Hết hàng';
                                                        }
                                                    ?>
                                                </div>
                                                "
                                                
                                    >
                                </a>
                                <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name'] ?></a></h4>
                                <p>Giá Bán: <span><?php echo $row['prd_price']; ?></span></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!--	End Latest Product	-->
                <script>
                    $(function () {
                        $('[data-toggle="tooltip"]').tooltip()
                    })
                </script>