<?php 
	session_start();
	if(!$_SESSION['email']) {
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn không có quyền truy cập!');
			</script>
		";

		// Chuyển người dùng vào trang quản trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.location.href = '/btl/admin/dang_nhap.php'
			</script>
		";
	}
;?>
<!DOCTYPE html>
<html>
<head>
  <?php include('../includes/head.php') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
	<?php include('../includes/header.php') ?>

	<?php include('../includes/sidebar.php') ?>

	<?php include('../includes/ket_noi.php') ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Main content -->
		<section class="content">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Sửa blog</h3>
				</div>
				<?php 
					// 2. Lẫy ra được ID 
					$id_tin_tuc = $_GET["id"];
					// secho $id_tin_tuc; exit();

					// 3. Viết câu lệnh SQL để lấy tin tức có ID như trên
					$sql = "
						SELECT *
						FROM tbl_tin_tuc
						WHERE id_tin_tuc='".$id_tin_tuc."'
					";

					// 4. Thực hiện truy vấn để lấy dữ liệu
					$tin_tuc = mysqli_query($ket_noi, $sql);
					// 5. Hiển thị dữ liệu lên Website
					$row = mysqli_fetch_array($tin_tuc);
				;?>
				<!-- /.card-header -->
				<div class="card-body">

					<form action="./sua_thuc_hien.php" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tên BLOG</label>
									<input name="ten" type="text" class="form-control" value="<?php echo $row['ten'] ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Tiêu đề</label>

									<textarea name="tieu_de" class="form-control" required><?php echo $row['tieu_de'] ?></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nội dung</label>
									<textarea name="noi_dung" class="form-control" required><?php echo $row['noi_dung'] ?></textarea>
								</div>
							</div>
							<div class="form-group">
									<label>Ngày đăng</label>
									<input name="id" class="form-control" type="hidden" required value="<?php echo $row['id_tin_tuc'] ?>">
									<input name="ngay_viet" type="date" class="form-control" required value="<?php echo $row['ngay_viet'] ?>">
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Ảnh minh họa</label>
										<input type="file" name="txtAnhMinhHoa" style="width: 100%;">
										<p>
											<img src="../../img/<?php 
													if ($row["anh"]<>"") {
														echo $row["anh"];
													} else {
														echo "diep1.png";
													}
												;?>" width="180px" height="auto">
										</p>
								</div>
							</div>

							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-info">Lưu</button>
							</div>
							<input type="hidden" name="txtID" value="<?php echo $row['id_tin_tuc'];?>">
						</div>
					</form>
				</div>
            </div>
		</section>
		<!-- /.content -->
		</div>
	</div>
	<!-- ./wrapper -->

	<?php include('../includes/footer.php') ?>
</body>
</html>

