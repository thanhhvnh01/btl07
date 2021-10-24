<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/btl/css/BaiTapLon.css">
	<link rel="icon" href="img/tablogo.png">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Đồ ăn các kiểu VIPPRO?</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>

	<!-- slider-section-start -->
	
	<div class="imageBox">
	<a href="/btl/tin_tuc_chi_tiet.php?id=9">
	<div class="single-box-item first-box">
	<p style="text-align: center;"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3kE8TUflNuVhBYfPyYmjEY0HTZWVJ2SNu8g&usqp=CAU" alt="Ai cha cha"
	width="1080" height="500"></p>
	</div>
	<div class="hoverImg">
	
	</div>
</ad>
	</div>
	
	<!-- slider section end -->


	<!-- tab-products section start -->
	<div class="trang">
	<div class="tab-products single-products products-two section-padding">
		<div class="container">
			<div class="row">
				<div class="wrapper">
					<div class="row text-center">
						<div class="col-xs-12">
							<div class="section-title text-center">
							<center>
								<div  class="logohome" >
					<img src="/btl/img/logo.png" alt="Rick Owens" />
								</div>
</center>
							</div>
						</div>
						<?php
							$sql = 'SELECT * FROM tbl_menu LIMIT 0, 8';

							$san_pham = mysqli_query($ket_noi, $sql);

							$i = 0;
							while ($row = mysqli_fetch_array($san_pham)) {
								++$i; ?>
						<div class="col-xs-12 col-sm-6 col-md-3 " style="margin-bottom: 30px">
							<div class="single-product">
								<div class="product-img">
									<div class="pro-type">
									
									</div>
									<a href="/btl/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>">
										<img src="/btl/img/<?php echo $row["anh"]; ?>"/>
									</a>
									<div class="actions-btn">
										<a href="?them_gio_hang=<?php echo $row["id_sp"]; ?>&&so_luong_sp=1"><i class="mdi mdi-cart"></i></a>
										<a href="/btl/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>"><i class="mdi mdi-eye"></i></a>
									</div>
								</div>
								<div class="product-dsc">
									<p><a href="/btl/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>"><?php echo $row["ten_sp"];?></a></p>
									<span><?php echo $row["gia_ban"];?> vnd </span>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
							</div>
					<br>
					<div class="text-center">
						<a href="/btl/san_pham.php" class="btn-btn-default">Xem thêm</a>
					</div>	

<div class="col-lg-6">
	<div class="imageBox">
		<a href="san_pham.php">
			<div class="single-box-item first-box">
				<video  class="image2"  loop autoplay controls >
					<source src="img/vidslide.mp4" type="video/mp4">
				</video>
			</div>
					<div class="hoverImg">
						<img class="image1" width="720" height="1080" src="/btl/img/hover2.png">
					</div>
		</a>
	</div>
</div>


<div class="col-lg-6">
	<div  class="imageBox">
		<a href="san_pham_phan_loai.php?id_phan_loai=11">
			<div class="single-box-item first-box">
				<img style="padding-left: "class="image2" width="540" height="810" src="/btl/img/bag.jpg">
			</div>							
				<div class="hoverImg">
					<img class="image1" style="padding-left: " width="540" height="810" src="/btl/img/hover3.png">
				</div>
				</a>		
	</div>
</div>	
				</div>
			</div>	
		</div>
	</div>
	


	<!-- tab-products section end -->
	<div class="phuter">
	<br>
	<?php include 'includes/footer.php'; ?>
	<div>
</body>
</html>