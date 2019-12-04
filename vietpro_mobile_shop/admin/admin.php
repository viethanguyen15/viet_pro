<?php
	if(!defined('SECURITYAD')){
		die('Chỉ cho phép quản trị viên truy cập');
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vietpro Mobile Shop - Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="admin.php"><span>Vietpro</span>Shop</a>
						<ul class="user-menu">
							<li class="dropdown pull-right">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
									<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
								</ul>
							</li>
						</ul>
					</div>
									
				</div><!-- /.container-fluid -->
			</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="<?php if(!isset($_GET['page_layout'])) { echo 'active'; } ?>"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="<?php if($_GET['page_layout'] == "user") { echo 'active'; } ?>"><a href="index.php?page_layout=user"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li class="<?php if($_GET['page_layout'] == "category") { echo 'active'; } ?>"><a href="index.php?page_layout=category"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li class="<?php if($_GET['page_layout'] == "product") { echo 'active'; } ?>"><a href="index.php?page_layout=product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<li class="<?php if($_GET['page_layout'] == "comment") { echo 'active';} ?>"><a href="index.php?page_layout=comment"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg>Quản lý bình luận</a></li>
			<li class="<?php if($_GET['page_layout'] == "slideshow") { echo 'active';} ?>"><a href="index.php?page_layout=slideshow"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Quản lý slideshow</a></li>
			<li class="<?php if($_GET['page_layout'] == "banner") { echo 'active';} ?>"><a href="index.php?page_layout=banner"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>Quản lý banner</a></li>
		</ul>

	</div><!--/.sidebar-->
	<?php
		if(isset($_GET['page_layout'])){
			$page = $_GET['page_layout'];
			switch ($page) {
				case 'user': include_once('user.php'); break;	
				case 'add_user': include_once('add_user.php'); break;
				case 'edit_user': include_once('edit_user.php'); break; 
				case 'category': include_once('category.php'); break;
				case 'add_category': include_once('add_category.php'); break;
				case 'edit_category': include_once('edit_category.php'); break;
				case 'product': include_once('product.php'); break;
				case 'add_product': include_once('add_product.php'); break;
				case 'edit_product': include_once('edit_product.php'); break;
				case 'comment': include_once('comment.php'); break;
				case 'add_comment': include_once('add_comment.php'); break;
				case 'edit_comment': include_once('edit_comment.php'); break;
				case 'slideshow': include_once('slideshow.php'); break;
				case 'add_slideshow': include_once('add_slideshow.php'); break;
				case 'edit_slideshow': include_once('edit_slideshow.php'); break;
				case 'banner': include_once('banner.php'); break;
				case 'add_banner': include_once('add_banner.php'); break;
				case 'edit_banner': include_once('edit_banner.php'); break;
			}
		}
		else{
			include_once('sub_admin.php');
		}
	?>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>
</body>

</html>
