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

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php
		// if(isset($_POST['submit'])){
		// 	$name = $_POST['name'];
		// 	$pass = $_POST['pass'];
		// 	$email = $_POST['email'];
		// 	// if($email == "admin123@gmail.com" && $pass == "1234567"){
		// 	// 	$_SESSION['email'] = $email;
		// 	// 	$_SESSION['pass'] = $pass;
		// 	// 	header('location: index.php');
		// 	// }
		// 	// else{
		// 	// 	$error = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
		// 	// }
		// 	if($name == "" || $pass == "" || $email == ""){
		// 		$error_login_empty = '<div class="alert alert-dark">Admin không để trống đăng nhập</div>';
		// 	}
		// 	else{
		// 		$sql_login = "SELECT * FROM register_admin WHERE name_admin = '$name' and pass = '$pass' and email = '$email'";
		// 		$query_login = mysqli_query($conn, $sql_login);
		// 		$num_rows = mysqli_num_rows($query_login);
		// 		if ($num_rows == 0){
		// 			$error_login_fail = '<div class="alert alert-info">tên đăng nhập hoặc mật khẩu không đúng</div>';
		// 		}
		// 		else{
		// 			$_SESSION['name'] = $name;
		// 			$_SESSION['pass'] = $pass;
		// 			$_SESSION['email']  = $email;
		// 			header('location: index.php');
		// 		} 
		// 	}
		// }
	?>
	<?php
		if(isset($_POST['submit'])){
			$name_acount = addslashes($_POST['name']);
			$pass = addslashes($_POST['pass']);
			$sql = "SELECT * FROM user WHERE user_full = '$name_acount' AND user_pass = '$pass'";
			$query_login = mysqli_query($conn, $sql);
			$num_rows = mysqli_num_rows($query_login);
			if($num_rows > 0){
				if(isset($_POST['remember'])){
					setcookie('name_acount', $name_acount, time()+60);
					setcookie('user_pass', $pass, time()+60);
				}
				$_SESSION['name'] = $name_acount;
				$_SESSION['pass'] = $pass;
				header('location: index.php');
			}
			else{
				$error = '<div class="alert alert-warning">Tài khoản không hợp lệ</div>';
			}	
		}
	?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Vietpro Mobile Shop - homeAdmin</div>
				<div class="panel-body">
					<?php
						if(isset($error)){
							echo $error;
						}
					?>
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder=" your name" name="name" autofocus type="text" value=<?php if(isset($_COOKIE['name_acount'])){echo $_COOKIE['name_acount'];}else{echo '';} ?> >
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="pass" type="password" value=<?php if(isset($_COOKIE['user_pass'])){echo $_COOKIE['user_pass'];}else{echo '';} ?>>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
								</label>
							</div>
							<button type="submit" name="submit" class="btn btn-primary">Đăng nhập</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
	<!-- <?php	
		// if(isset($_POST['dang_ky'])){
		// 	$my_pass = $_POST['my_pass'];
		// 	$my_name = $_POST['my_name'];
		// 	$my_mail = $_POST['my_mail'];
		// 	if($my_mail == "" || $my_pass == "" || $my_name == ""){
		// 		$error_empty = '<div class="alert alert-secondary">Yêu cầu nhập đầy đủ thông tin quản trị viên</div>';
		// 	}else{
		// 		$sql = "SELECT * FROM register_admin WHERE name_admin = '$my_name'";
		// 		$check = mysqli_query($conn, $sql);
		// 		if(mysqli_num_rows($check) > 0){
		// 			$error_exits = '<div class="alert alert-danger">username already exists</div>';
		// 		}
		// 		else{
		// 			$sql = "INSERT INTO register_admin (name_admin, email, pass) VALUES('$my_name', '$my_mail', '$my_pass')";
		// 			mysqli_query($conn, $sql);
		// 			$success = '<div class="alert alert-success">register sucessfully</div>';
							 
		// 		}
		// 	}
		// }
	?> -->
	
	
	<!-- <div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Register Acount Administrator</div>
				<div class="panel-body">
					<?php
						// if(isset($error_empty)){
						// 	echo $error_empty;
						// }
						// if(isset($success)){
						// 	echo $success;
						// }
						// if(isset($error_exits)){
						// 	echo $error_exits;
						// }
					?>
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="my_mail" type="email" required autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Tên" name="my_name" type="text" required value="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="my_pass" type="password" required value="">
							</div>
							<button type="submit" name="dang_ky" class="btn btn-primary">Đăng ký</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div> -->
	<!-- /.row -->	
</body>

</html>
