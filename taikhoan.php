<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Thanh toán</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'includes/head.php'; ?>
</head>
<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "Hello World";
}
</script>
<body>
	<?php include 'includes/header.php'; ?>

	<p id="demo"></p>
	<?php
		if(!isset($_SESSION['dang_nhap'])) {
			echo 
			"
				<script type='text/javascript'>
					window.location.href = '/btl/dang_nhap.php'
				</script>
			";
		}

		// xử lý đặt hàng
		if(isset($_POST['doi_mk'])) {
			$id_khach_hang = $_SESSION['dang_nhap']["id_khach_hang"];
			$phuong_thuc_tt = 'Thanh toán khi nhận hàng';
			$ngay_dat_hang = date('Y-m-d');
			$ten_kh = $_POST["ten_kh"];
			$email = $_POST["email"];
			$sdt = $_POST["sdt"];
			$dia_chi = $_POST["dia_chi"];
			$trang_thai = 'Đặt hàng';

			$mat_khau_cu = $_POST["mat_khau_cu"];
			$mat_khau_moi = $_POST["mat_khau_moi"];

			$sql_mk = "SELECT `password`
						FROM tbl_khach_hang
						WHERE id_khach_hang='".$id_khach_hang."'";

			$sql_hdb = "
			UPDATE `tbl_khach_hang`
			SET
			`password` = '".$mat_khau_moi."',
			WHERE `id_khach_hang` = '".$id_khach_hang."' ";

			if ($ket_noi->query($sql_hdb) === TRUE && $sql_mk == $mat_khau_cu) {

		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật mật khẩu thành công.');
			</script>
		";
	} else {
  		echo "<script type='text/javascript'>
					window.alert(Nhập sai mật khẩu cũ.');
				</script>";
	}
		}
	?>

   <!-- Checkout content section start -->
	<section class="pages checkout section-padding">
		<div class="container">
			<div class="row">
				<form method="post">
					<div class="col-sm-6">
						<div class="main-input single-cart-form padding60">
							<div class="log-title">
								<h3><strong>Thông tin khách hàng</strong></h3>
							</div>
							<div class="custom-input">
								<?php 
									$id_khach_hang = $_SESSION['dang_nhap']["id_khach_hang"];
									$sql = "SELECT * FROM tbl_khach_hang WHERE id_khach_hang = $id_khach_hang";
									$sql_query = mysqli_query($ket_noi, $sql);
									$khach_hang = mysqli_fetch_array($sql_query);
								?>
							
								<input type="text" name="ten_kh" value="<?php echo $khach_hang['ten_kh']; ?>" placeholder="Tên khách hàng" />
								<input type="email" name="email" value="<?php echo $khach_hang['email']; ?>" placeholder="Địa chỉ email" />
								<input type="text" name="sdt" value="<?php echo $khach_hang['sdt']; ?>" placeholder="Số điện thoại" />
								<div class="custom-mess">
									<textarea rows="2" name="dia_chi" placeholder="Địa chỉ nhận hàng"><?php echo $khach_hang['dia_chi']; ?></textarea>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="main-input single-cart-form padding60">
							<div class="log-title">
								<h3><strong>Thay đổi mật khẩu</strong></h3>
							</div>
							<div class="custom-input">
								<?php 
									$id_khach_hang = $_SESSION['dang_nhap']["id_khach_hang"];
									$sql = "SELECT * FROM tbl_khach_hang WHERE id_khach_hang = $id_khach_hang";
									$sql_query = mysqli_query($ket_noi, $sql);
									$khach_hang = mysqli_fetch_array($sql_query);
								?>
								<h4><strong>Mật khẩu cũ</strong></h4>
								<input type="password" name="mat_khau_cu" placeholder="Mật khẩu cũ" />
								<h4><strong>Mật khẩu mới</strong></h4>
								<input type="password" name="mat_khau_moi" placeholder="Mật khẩu mới" />
							</div>
						</div>
					</div>

					<div class="col-xs-18 col-sm-18">
						<div class="text-center">
							<div class="categories">
								<div class="submit-text">
									<button name="doi_mk">Đổi mật khẩu</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- Checkout content section end -->

	<?php include 'includes/footer.php'; ?>
</body>
</html>