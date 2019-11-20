<script>
    function delItem(name)
    {
        return confirm('ban co muon xoa san pham:' +name+' ?');
    }
</script>
<?php
	if(!defined('SECURITYAD')){
		die('Chỉ cho phép quản trị viên truy cập');
    }
    //pagination
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }
    //fix: per_page = 5 records
    $record_per_page = 5;
    $offset = $page * $record_per_page - $record_per_page;
    //select all products in table product in database, and use mysqli_num_rows to acount amount product
    $sql_prd = "SELECT * FROM product";
    $query_prd = mysqli_query($conn, $sql_prd);
    $num_row = mysqli_num_rows($query_prd);
    $total_page = ceil($num_row / $record_per_page);
    //button preview
    $list_page = "";
    $page_prev = $page - 1;
    if($page_prev <= 0){
        $page_prev = 1;
    }
    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page='.$page_prev.'">&laquo;</a></li>';
    //total page -> list page
    for($p = 1; $p <= $total_page; $p++){
        if($p == $page){
            $active = 'active';
        }
        else{
            $active = "";
        }
        $list_page .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=product&page='.$p.'">'.$p.'</a></li>  ';
    }
    //button next
    $page_next = $page + 1;
    if($page_next > $total_page){
        $page_next = $total_page;
    }
    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page='.$page_next.'">&raquo;</a></li>';
?>	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="index.php?page_layout=add_product" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id ORDER BY prd_id DESC LIMIT $offset, $record_per_page";
                                    $query = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($query)){                                               
                                ?>
                                    <tr>
                                        <td style=""><?php echo $row['prd_id']; ?></td>
                                        <td style=""><?php echo $row['prd_name']; ?></td>
                                        <td style=""><?php echo $row['prd_price']; ?></td>
                                        <td style="text-align: center"><img width="130" height="180" src="../img_prd_admin/prd_img/<?php echo $row['prd_image']; ?>" /></td>
                                        <td><span class="label label-<?php if($row['prd_status'] == 1){ echo 'success';}else{echo 'danger';} ?>">
                                        <?php if($row['prd_status'] == 1){echo 'Còn hàng';}else{echo 'Hêt hàng';} ?></span></td>
                                        <td><?php echo $row['cat_name']; ?></td>
                                        <td class="form-group">
                                            <a href="index.php?page_layout=edit_product&prd_id=<?php echo $row['prd_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a onclick="return delItem('<?php echo $row['prd_name']; ?>')" href="delete.php?prd_id=<?php echo $row['prd_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                 </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php echo $list_page; ?>            
                            </ul>  
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->
