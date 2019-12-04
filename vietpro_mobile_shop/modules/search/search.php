<?php
    
    if(isset($_GET['keysearch'])){
        $key = $_GET['keysearch'];
    }
    else{
        $key = "";
    }
    $arr_key = explode(" ", $key);
    $key_end = '%'.implode("%", $arr_key).'%';
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }
    $record_per_page = 3;
    $offset = $page * $record_per_page - $record_per_page;
    $sql_se_prd = "SELECT * FROM product WHERE prd_name LIKE '$key_end'";
    $query_se_prd = mysqli_query($conn, $sql_se_prd);
    $num_row = mysqli_num_rows($query_se_prd);
    $total_page = ceil($num_row / $record_per_page);
    $list_page = "";
    $page_prev = $page - 1;
    if($page_prev <= 0){
        $page_prev = 1;
    }
    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&keysearch='.$key.'&page'.$page_prev.'">Trang trước</a></li>';
    for($p = 1; $p <= $total_page; $p++){
        if($p == $page){
            $active = 'active';
        }
        else{
            $active = '';
        }
        $list_page .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=search&keysearch='.$key.'&page='.$p.'">'.$p.'</a></li>';
    }
    $page_next = $page + 1;
    if($page_next > $total_page){
        $page_next = $total_page;
    }
    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&keysearch='.$key.'&page='.$page_next.'">Trang sau</a></li>';

    $sql_search = "SELECT * FROM product WHERE prd_name LIKE '$key_end' LIMIT $offset, $record_per_page";
    $query_search = mysqli_query($conn, $sql_search);
?>
    <div class="products">
        <div id="search-result">Kết quả tìm kiếm với sản phẩm <span><?php echo $key; ?></span> có <span><?php echo $num_row; ?></span> sản phẩm</div>
        <div class="product-list row">
            <?php while($row_search = mysqli_fetch_assoc($query_search)){ ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                <div class="product-item card text-center">
                    <a href="index.php?page_layout=product&prd_id=<?php echo $row_search['prd_id']; ?>"><img src="admin/products/<?php echo $row_search['prd_image']; ?>"></a>
                    <h4>
                        <a href="index.php?page_layout=product&prd_id=<?php echo $row_search['prd_id']; ?>">
                            <?php echo $row_search['prd_name']; ?>
                        </a>
                    </h4>
                    <p>Giá Bán: <span><?php echo $row_search['prd_price']; ?></span></p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div id="pagination">
        <ul class="pagination">
            <?php echo $list_page; ?>
        </ul>
    </div>