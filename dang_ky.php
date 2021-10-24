<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="img/tablogo.png">
	<link rel="stylesheet" type="text/css" href="/btl/css/BaiTapLon.css">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Đăng ký tài khoản</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>

	<?php
		if(isset($_POST['dang_ky']) && isset($_POST['ten_kh'])) {
			$ten_kh = $_POST["ten_kh"];
			$sdt = $_POST["sdt"];
			$email = $_POST["email"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			$dia_chi = $_POST["dia_chi"];
			$ngay_sinh = $_POST["ngay_sinh"];

			$sql = "INSERT INTO `tbl_khach_hang` (`ten_kh`, `sdt`, `email`, `username`, `password`, `dia_chi`, `ngay_sinh`) 
				VALUES ('".$ten_kh."', '".$sdt."', '".$email."', '".$username."', '".$password."', '".$dia_chi."', '".$ngay_sinh."');";

			if ($ket_noi->query($sql) === TRUE) {
				echo 
				"
					<script type='text/javascript'>
						window.alert('Đăng ký thành công.');
					</script>
				";

				// Chuyển người dùng vào đăng nhập
				echo 
				"
					<script type='text/javascript'>
						window.location.href = '/btl/dang_nhap.php'
					</script>
				";
			} else {
				echo "<script type='text/javascript'>
					window.alert('Đăng ký thất bại.');
				</script>";
				echo "Error: " . $sql . "<br>" . $ket_noi->error;
			}
		}
	?>

    <!-- login content section start -->
	<section class="pages login-page section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="main-input padding60 new-customer">
						<div class="log-title">
							<h3><strong>Đăng ký tài khoản</strong></h3>
						</div>
						<div class="custom-input">
							<form action="/btl/dang_ky.php" method="post">
								<input type="text" name="ten_kh" placeholder="Họ và tên" required/>
								<input type="tel	" name="sdt" placeholder="Số điện thoại" required/>
								<input type="text" name="email" placeholder="Địa chỉ email" required/>
								<input type="text" name="username" placeholder="Tên đăng nhập" required/>
								<input type="password" name="password" placeholder="Mật khẩu" required/>
								<input type="date" name="ngay_sinh" placeholder="ngay_sinh" required/>
								<textarea name="dia_chi" rows="3" class="form-control" placeholder="Địa chỉ" required></textarea>
								<div class="submit-text coupon">
									<button class="btn btn-darkkk" style="width:440px;" type="submit" name="dang_ky">Đăng ký</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- login content section end -->

	<div class="phuter" style="
    margin-top: 2%;
"	>
	<br>
	<?php include 'includes/footer.php'; ?>
	<div>
</body>
</html>