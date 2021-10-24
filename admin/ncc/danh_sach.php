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
					<h3 class="card-title">Danh sách nhà cung cấp</h3>
					<div class="float-right">
						<a class="btn btn-primary" href="them.php">Thêm mới</a>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table class="table table-bordered">
						<thead>                  
						<tr>
						 	<td>STT</td>
							<td>Logo</td>
							<td>Tên</td>
							<td>Email</td>
							<td>Sdt</td>
							<td></td>
						</tr>
						</thead>
						<tbody>
							<?php 
							// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
							$sql = "
								SELECT *
								FROM tbl_ncc
								ORDER BY id_ncc DESC
							";

							// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
							$ncc = mysqli_query($ket_noi, $sql);

							// 4. Hiển thị dữ liệu mong muốn
							$i=0;
							while ($row = mysqli_fetch_array($ncc)) {
								$i++;
							?>
						    <tr>
						     	<td>
									<?php echo $i;?>
								</td>
								<td>
									<?php if ($row["logo"]<>"") {
										echo '<img src="/btl/img/'.$row["logo"].'" width="100px" height="auto">';
									}?>
								</td>
								<td>
									<?php echo $row["ten_ncc"];?>
								</td>
								<td>
									<?php echo $row["email"];?>
								</td>
								<td>
								
									<?php echo $row["sdt"];?>
								</td>
								<td>
									<a href="sua.php?id=<?php echo $row["id_ncc"];?>" class="btn btn-info">Sửa</a>
									<a href="xoa.php?id=<?php echo $row["id_ncc"];?>" class="btn btn-danger">Xóa</a>
								</td>
						    </tr>
						<?php } ?>
						</tbody>
					</table>
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
