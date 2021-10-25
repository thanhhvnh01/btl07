<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="img/tablogo.png">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>DETAILS</title>
	<link rel="stylesheet" type="text/css" href="/btl/css/BaiTapLon.css">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>

	<?php 
		$id_sp = $_GET["id_sp"];
		$sql = "SELECT * FROM tbl_menu WHERE id_sp = $id_sp";
		$sql_query = mysqli_query($ket_noi, $sql);
		$san_pham = mysqli_fetch_array($sql_query);

	?>

	<!-- product-details-section-start -->
	<div class="product-details pages section-padding">
		<div class="container">
			<div class="row">
				<div class="single-list-view">
					<div class="col-xs-12 col-sm-5 col-md-6">
						<div class="quick-image">
							<div class="single-quick-image text-center">
								<div class="list-img">
									<div class="product-img tab-content">
										<div class="simpleLens-container tab-pane active fade in" id="sin-2">
	
											<a class="simpleLens-image" data-lens-image="/btl/img/<?php echo $san_pham['anh_minh_hoa'] ?>" href="#"><img src="/btl/img/<?php echo $san_pham['anh_minh_hoa'] ?>" alt="" class="simpleLens-big-image"></a>
										</div>
										<?php $anh_sp_query = mysqli_query($ket_noi, "SELECT * FROM tbl_anh WHERE id_sp = ".$id_sp);

											while ($anh = mysqli_fetch_array($anh_sp_query)) {?>
											<div class="simpleLens-container tab-pane fade in" id="sin-anh-<?php echo $anh['id_anh'] ?>">
												<div class="pro-type">
												</div>
												<a class="simpleLens-image" data-lens-image="/btl/img/<?php echo $anh['anh_minh_hoa'] ?>" href="#"><img src="/btl/img/<?php echo $anh['anh_minh_hoa'] ?>" alt="" class="simpleLens-big-image"></a>
											</div>
										<?php }?>
									</div>
								</div>
							</div>
							<div class="quick-thumb">
								<ul class="product-slider">
									<li class="active"><a data-toggle="tab" href="#sin-anh-<?php echo $anh['id_anh'] ?>"> <img src="/btl/img/<?php echo $san_pham['anh'] ?>" alt="small image" /> </a></li>
									<?php 
										$anh_sp_query = mysqli_query($ket_noi, "SELECT * FROM tbl_anh WHERE id_sp = ".$id_sp);
										while ($anh = mysqli_fetch_array($anh_sp_query)) {?>
										<li><a data-toggle="tab" href="#sin-anh-<?php echo $anh['id_anh'] ?>"> <img src="/btl/img/<?php echo $anh['anh'] ?>" alt="quick view" /> </a></li>
									<?php }?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-5">
						<form method="get">
							<input type="hidden" name="id_sp" value="<?php echo $_GET['id_sp'] ?>"/>
							<input type="hidden" name="them_gio_hang" value="<?php echo $_GET['id_sp'] ?>"/>
							<div class="quick-right">
							
								<div class="list-text">
								<div class="rickowens">RICK OWENS</div>
								<h5>$ <?php echo $san_pham['gia_ban'] ?></h5>
									<h3><?php echo $san_pham['ten_sp'] ?></h3>
									<p class="mota"><?php echo $san_pham['mo_ta'] ?></p>
									<div class="all-choose">
										
										<div class="s-shoose">
										<div class="selectsize">SELECT SIZE</div>

											<div class="btn-group">
											<button type="button" class="btn btn-light" id="nut">S</button>
											<button type="button" class="btn btn-light" id="nut">M</button>
											<button type="button" class="btn btn-light" id="nut">L</button>
											</div>

										</div>
										<div class="s-shoose">
										<div class="selectsize">
											<div style="display: inline">
											SỐ LƯỢNG
										</div>
										<div style="display: inline">
											<form action="#" method="POST">
												<div class="plus-minus">
													<a class="dec qtybutton">-</a>
													<input type="text" value="1" name="so_luong_sp" class="plus-minus-box" readonly>
													<a class="inc qtybutton">+</a>
												</div>
											</form>
											<div>
										</div>
											
										</div>
									</div>
									<div class="list-btn">
										<button id="them" class="btn btn-dark">THÊM VÀO GIỎ HÀNG</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- single-product item end -->
		</div>
	</div>
	<!-- product-details section end -->

	<div class="phuter">
	<br>
	<?php include 'includes/footer.php'; ?>
	<div>
</body>
</html>