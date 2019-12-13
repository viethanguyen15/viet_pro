
                <?php
                    if(!defined('SECURITYAD')){
                        die('khong dc truy cap');
                    }
                    $cat_name = $_GET['cat_name'];
                    $cat_id = $_GET['cat_id']; 
                    //$sql = "SELECT * FROM product WHERE cat_id = $cat_id";
                    //$query = mysqli_query($conn, $sql);
                    //$num_row = mysqli_num_rows($query);

                    //phan trang
                    
                    //pagination
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }
                    else{
                        $page = 1;
                    }
                    //fix: per_page = 5 records
                    $record_per_page = 3;
                    $offset = $page * $record_per_page - $record_per_page;
                    //select all products in table product in database, and use mysqli_num_rows to acount amount product
                    $sql_prd = "SELECT * FROM product WHERE cat_id = '$cat_id'";
                    $query_prd = mysqli_query($conn, $sql_prd);
                    $num_row_prd = mysqli_num_rows($query_prd);
                    $total_page = ceil($num_row_prd / $record_per_page);
                    //button preview
                    $list_page = "";
                    $page_prev = $page - 1;
                    if($page_prev <= 0){
                        $page_prev = 1;
                    }
                    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&cat_name='.$cat_name.'&cat_id='.$cat_id.'&page='.$page_prev.'">Trang trước</a></li>';
                    //total page -> list page
                    for($p = 1; $p <= $total_page; $p++){
                        if($p == $page){
                            $active = 'active';
                        }
                        else{
                            $active = "";
                        }
                        $list_page .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=category&cat_name='.$cat_name.'&cat_id='.$cat_id.'&page='.$p.'">'.$p.'</a></li>  ';
                    }
                    //button next
                    $page_next = $page + 1;
                    if($page_next > $total_page){
                        $page_next = $total_page;
                    }
                    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&cat_name='.$cat_name.'&cat_id='.$cat_id.'&page='.$page_next.'">Trang sau</a></li>';
                    $sql = "SELECT * FROM product WHERE cat_id = $cat_id ORDER BY prd_id DESC LIMIT $offset, $record_per_page";
                    $query = mysqli_query($conn, $sql);
                ?>
                <!--	List Product	-->
                <div class="products">
                    <h3><?php echo $cat_name; ?> (hiện có <?php echo $num_row_prd; ?> sản phẩm)</h3>
                    <div class="product-list row">
                    <?php
                        while($row = mysqli_fetch_assoc($query)){
                    ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                            <div class="product-item card text-center">
                                <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>">
                                    <img src="admin/products/<?php echo $row['prd_image']; ?>" data-toggle="tooltip" data-html="true" 
                                         title="<div class='text-light text-center'>
                                                    <h3><?php echo $row['prd_name']; ?></h3>
                                                    <span class='text-danger'>Tình trạng</span>: <?php echo $row['prd_new'] ?><br/>
                                                    <span class='text-danger'>Bảo hành</span>: <?php echo $row['prd_warranty']; ?><br/>
                                                    <span class='text-danger'>Phụ kiện</span>: <?php echo $row['prd_accessories']; ?><br/>
                                                    <span class='text-danger'>Khuyến mãi</span>: <?php echo $row['prd_promotion']; ?><br/>
                                                    <span class='text-danger'>Giá bán(chưa bao gồm VAT)</span>: <?php echo $row['prd_price']; ?><br/> 
                                                </div>
                                                <div id='status' class='<?php if($row['prd_status'] == 1){echo 'text-success';}else{echo 'text-warning';} ?>'>
                                                    <?php if($row['prd_status'] == 1){echo 'Còn hàng';}else{echo 'Hết hàng';} ?>
                                                </div>
                                                ">
                                </a>
                                <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']; ?></a></h4>
                                <p>Giá Bán: <span><?php echo $row['prd_price']; ?></span></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!--	End List Product	-->
                
                <div id="pagination">
                    <ul class="pagination">
                       <?php echo $list_page; ?>
                    </ul>
                </div>
                <script>
                    $(document).ready(function(){
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>

                
            
            

