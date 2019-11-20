<script>
    function delItem(user_name){
        return confirm('Bạn có muốn xóa ' +user_name+ ' khỏi danh sách?');
    }
</script>
<?php
	if(!defined('SECURITYAD')){
		die('Chỉ cho phép quản trị viên truy cập');
    }
    //get page url
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }
    //limit
    $record_per_page = 2;
    $offset = $page * $record_per_page - $record_per_page;
    $sql = "SELECT * FROM user";
    $query = mysqli_query($conn, $sql);
    $num_row = mysqli_num_rows($query);
    $total_page = ceil($num_row / $record_per_page);
    //button preview
    $list_page = "";
    $page_prev = $page - 1;
    if($page_prev <= 0){
        $page_prev = 1;
    }
    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page='.$page_prev.'">&laquo;</a></li>';
    for($p = 1; $p <= $total_page; $p++){
        if($p == $page){
            $active = 'active';
        }
        else{
            $active = "";
        }
        $list_page .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=user&page='.$p.'">'.$p.'</a></li>';
    }
    //button next
    $page_next = $page + 1;
    if($page_next > $total_page){
        $page_next = $total_page;
    }
    $list_page .= '<li class="page-item "><a class="page-link" href="index.php?page_layout=user&page='.$page_next.'">&raquo;</a></li>';
?>	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="index.php?page_layout=add_user" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
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
						        <th data-field="name"  data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql_user = "SELECT * FROM user ORDER BY user_id DESC LIMIT $offset, $record_per_page";
                                $query_user = mysqli_query($conn, $sql_user);
                                while($row_user = mysqli_fetch_assoc($query_user)){
                            ?>
                                <tr>
                                    <td style=""><?php echo $row_user['user_id']; ?></td>
                                    <td style=""><?php echo $row_user['user_full']; ?></td>
                                    <td style=""><?php echo $row_user['user_mail'] ?></td>
                                    <td>
                                        <span class="label label-<?php if($row_user['user_level'] == 1){echo 'danger';}else{echo 'warning';} ?>">
                                            <?php
                                                if($row_user['user_level'] == 1){
                                                    echo "Admin";
                                                }
                                                else{
                                                    echo "Member";
                                                }
                                            ?>
                                        </span>
                                    </td>
                                    <td class="form-group">
                                        <a href="index.php?page_layout=edit_user&user_id=<?php echo $row_user['user_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a onclick="return delItem('<?php echo $row_user['user_full']; ?>')" href="del_user.php?user_id=<?php echo $row_user['user_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
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

