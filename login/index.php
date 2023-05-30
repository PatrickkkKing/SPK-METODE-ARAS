<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<style>
		body {background-image:url('../img/bbg.jpg');
		background-attachment:fixed;
		background-repeat:no-repeat;
		background-size:100% 100%;}
		</style>
	</head>
<body>
	
	<body class="bg-gradient-primary">
	<div class="container">
    	<div class="row justify-content-center">
      		<div class="col-xl-6 col-lg-12 col-md-9">
       			<div class="card o-hidden border-0 shadow-lg my-5">
          			<div class="card-body p-0">
            			<div class="row">
              				<div class="col-lg-12">
                				<div class="p-5">
                  					<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
									</div>

									<?php if (isset($user_or_pass)) { ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>Gagal!</strong> Maaf username atau password yang Anda masukkan salah!
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<?php } ?>

                  					<form method="post" class="user">
										<div class="form-group">
											<input type="text" name="username" class="form-control form-control-user" placeholder="Username" required="required" />
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control form-control-user" placeholder="Password" required="required" />
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-user btn-block" name="login" value="Login">
										</div>
										<a href="../index.php" class="btn btn-danger btn-user btn-block">
											Batal
										</a>
									</form>
                				</div>
              				</div>
            			</div>
          			</div>
        		</div>
      		</div>
    	</div>
 	</div>

</body>
</html>
<?php
	include "../koneksi/koneksi.php";
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM login WHERE username='$username' AND password='$password'"));
		$data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM login WHERE username='$username' AND password='$password'"));
		if($cek > 0)
		{
			session_start();
			$_SESSION['username'] = $data['username'];
			$_SESSION['nama'] = $data['nama'];
			echo "<script language=\"javascript\">alert(\"Selamat Datang\");document.location.href='../index.php';</script>";
		}else{
			echo "<script language=\"javascript\">alert(\"Password atau Username Salah !!!\");document.location.href='../login/index.php';</script>";
		}
	}
?>
