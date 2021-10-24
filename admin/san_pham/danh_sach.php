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
					<h3 class="card-title">Danh sách sản phẩm</h3>
					<div class="float-right">
						<a class="btn btn-primary" href="them.php">Thêm mới</a>
					</div>
				</div>

				<!-- /.card-header -->
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered">
						<thead>                  
							<tr>
								<td>STT</td>
								<td>Tên sản phẩm</td>
								<td>Loại sp</td>
								<td>Số lượng</td>
								<td>Giá Bán</td>
								<td>Ảnh minh họa</td>
								<td>Mức khuyến mãi</td>
								<td>Mô tả</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php 
								// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
								$sql = "SELECT *
										FROM tbl_menu
										ORDER BY id_sp DESC
								";

								// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
								$noi_dung_san_pham = mysqli_query($ket_noi, $sql);

								// 4. Hiển thị dữ liệu mong muốn
								$i=0;
								while ($row = mysqli_fetch_array($noi_dung_san_pham)) {
									$i++;
							?>
								<tr>
									<td><?php echo $i;?></td>
									<td>
										<?php echo $row["ten_sp"];?>
									</td>
									<td>
										<?php echo $row["id_phan_loai"];?>
									</td>
									<td>
										<?php echo $row["so_luong"];?>
									</td>
									<td>
										<?php echo $row["gia_ban"];?>
									</td>
									<td>
										<img src="/btl/img/<?php 
												if ($row["anh_minh_hoa"]<>"") {
													echo $row["anh_minh_hoa"];
												} else {
													echo "diep4.png";
												}
											;?>" width="100px" height="auto">
									</td>
									<td>
										<?php echo $row["muc_km"];?>
									</td>
									<td>
										<?php echo $row["mo_ta"];?>
									</td>
									<td>
										<a href="sua.php?id=<?php echo $row["id_sp"];?>" class="btn btn-info">Sửa</a>
										<a href="xoa.php?id=<?php echo $row["id_sp"];?>" class="btn btn-danger">Xóa</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
						</table>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer clearfix">
					<ul class="pagination pagination-sm m-0 float-right">
						<li class="page-item"><a class="page-link" href="#">«</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">»</a></li>
					</ul>
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
