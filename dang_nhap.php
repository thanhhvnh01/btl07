<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="img/tablogo.png">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Đăng nhập</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>

	<?php
		if(isset($_POST['dang_nhap'])) {
			$email = $_POST["email"];
			$password = $_POST["password"];

			$sql = "SELECT * FROM tbl_khach_hang WHERE email = '".$email."' AND password = '".$password."'";
			$dang_nhap = mysqli_query($ket_noi, $sql);
			$row = mysqli_fetch_array($dang_nhap);

			if ($row) {
				$_SESSION['dang_nhap'] = [
					'id_khach_hang' => $row['id_khach_hang'],
					'email' => $row['email'],
					'ten_kh' => $row['ten_kh'],
				];

				echo 
				"
					<script type='text/javascript'>
						window.alert('Đăng nhập thành công.');
					</script>
				";

				// Chuyển người dùng vào trang quản trị tin tức
				echo 
				"
					<script type='text/javascript'>
						window.location.href = '/btl'
					</script>
				";
			} else {
				echo 
				"
					<script type='text/javascript'>
						window.alert('Đăng nhập thất bại. Sai email hoặc mật khẩu.');
					</script>
				";
				// echo "Error: " . $sql . "<br>" . $ket_noi->error;
			}
		}
	?>

    <!-- login content section start -->
	<section class="pages login-page section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="main-input padding60">
						<div class="log-title">
							<h3><strong>Đăng nhập</strong></h3>
						</div>
						<div class="login-text">
							<div class="custom-input">
								<form action="/btl/dang_nhap.php" method="post">
									<input type="email" name="email" placeholder="Email" />
									<input type="password" name="password" placeholder="Mật khẩu" />
									<a class="forget" href="/btl/dang_ky.php">Đăng ký</a>
									<div class="submit-text">
										<button type="submit" name="dang_nhap">Đăng nhập</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- login content section end -->

	<div class="phuter" style="
    margin-top: 12%;
"	>
	<br>
	<?php include 'includes/footer.php'; ?>
	<div>
</body>
</html>