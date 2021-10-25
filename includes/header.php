
<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/btl/css/BaiTapLon.css">
	<link rel="stylesheet" href="/btl/accets/css/style.css">
</head>
<body>
<div class="header1">
<header class="header-one header-two">
	<div class="header-top-two">
		<div class="container text-center">
			<div class="row">
				<div class="col-sm-12">
					<div class="middel-top">
						<div class="left floatleft">
							<p><i class="mdi mdi-clock"></i> 
								<?php
							        echo  "Today: ". date("d/m/Y"); 
							    ;?> 
							</p>
						</div>
					</div>
					<div class="middel-top clearfix">
						<ul class="clearfix right floatright">
							<li>
								<a href="#"><i class="mdi mdi-account"></i></a>
								<ul>
									<?php
										if(isset($_SESSION['dang_nhap']) && !empty($_SESSION['dang_nhap'])) {
									?>
										<li><a href="/btl/taikhoan.php">Tài khoản</a></li>
										<li><a href="?dang_xuat">Đăng xuất</a></li>
									<?php 
										} else{
									?>
										<li><a href="/btl/dang_nhap.php">Đăng nhập</a></li>
										<li><a href="/btl/dang_ky.php">Đăng ký</a></li>
									<?php 
										}
									?>
								</ul>
							</li>
						</ul>
						<div class="right floatright widthfull">
							<form action="/btl/san_pham.php" method="get">
								<button type="submit"><i class="mdi mdi-magnify"></i></button>
								<input type="text" name="tu_khoa" placeholder="Tìm kiếm" value="<?php echo isset($_GET['tu_khoa']) ? $_GET['tu_khoa'] : '' ?>"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container text-center">
		<div class="row" >
			<div class="col-sm-2">
				<div  class="logo" >
				<a href="index.php">
				<img src="https://scontent.fhan14-2.fna.fbcdn.net/v/t1.15752-9/247325730_1310160752764306_7696828847156585627_n.jpg?_nc_cat=109&ccb=1-5&_nc_sid=ae9488&_nc_ohc=NmHKp3TKvh8AX-85A2_&_nc_ht=scontent.fhan14-2.fna&oh=debc79a720f374d67cacf29ffd1ace24&oe=619D86D3" alt="Godiet" width="60" height="60" />
									</a>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="header-middel">
					<div class="mainmenu">
						<nav>
							<ul>
								<li><a href="/btl">Trang chủ</a></li>
								<li><a href="/btl/san_pham.php">Menu</a>
									<ul class="dropdown">
										<?php 
											$sql_loai_sp = "SELECT * FROM tbl_phan_loai";
											$loai_sp = mysqli_query($ket_noi, $sql_loai_sp);
											while ($loai = mysqli_fetch_array($loai_sp)) {
										?>
											<li><a href="/btl/san_pham_phan_loai.php?id_phan_loai=<?php echo $loai['id_phan_loai'] ?>"><?php echo $loai['ten_phan_loai'] ?></a></li>
										<?php } ?>
									</ul>
								</li>
								<li><a href="/btl/blog.php">Blog</a></li>
								<li><a href="/btl/gioi_thieu.php">Giới thiệu</a></li>
								<li><a href="/btl/lien_he.php">Liên hệ</a></li>
							</ul>
						</nav>
					</div>
					<!-- mobile menu start -->
					<div class="mobile-menu-area">
						<div class="mobile-menu">
							<nav id="dropdown">
								<ul>
									<li><a href="/btl">Trang chủ</a></li>
									<li><a href="/btl/blog.php">Blog</a></li>
									<li><a href="/btl/gioi_thieu.php">Giới thiệu</a></li>
									<li><a href="/btl/lien_he.php">Liên hệ</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="cart-itmes">
					<a class="cart-itme-a" href="/btl/gio_hang.php">
					<img src="img/cart.png" class="cart" alt="Giỏ hàng" width=30% height=30% >
					<div class="counting">
						<?php
							if(isset($_SESSION['gio_hang'])) {
								echo count($_SESSION['gio_hang']) ."  ";
							} else {
								echo "0 ";
							}
						?>
						</div>
					</a>
					<div class="cartdrop">
						<?php
							if(isset($_SESSION['gio_hang']) && !empty($_SESSION['gio_hang'])) {
								foreach($_SESSION['gio_hang'] as $gh) {
									?>
										<div class="sin-itme clearfix">
											<!-- <a href="?xoa_gio_hang=<?php echo $gh["id_sp"]; ?>"><i class="mdi mdi-close"></i></a> -->
											<a class="cart-img" href="/btl/chi_tiet_sp.php?id_sp=<?php echo $gh["id_sp"]; ?>"><img src="/btl/img/<?php echo $gh['anh'] ?>" /></a>
											<div class="menu-cart-text">
												<a href="/btl/chi_tiet_sp.php?id_sp=<?php echo $gh["id_sp"]; ?>"><div class="font"><?php echo $gh['ten_sp'] ?></div></a><br>
												<span>Black</span>
												<br>
												<span>M</span>
												<div style="padding-top:10px" class="rickowenss"><?php echo $gh['gia_ban'] ?>$</div>
											</div>
										</div>
									<?php
								}
								?>
									<div class="total">
									<div class="rickowenss">TỔNG TIỀN                                                      
										<?php  echo $_SESSION['tong_tien_gio_hang']; ?>$</div>
									</div>
									<a class="goto" href="/btl/gio_hang.php">Giỏ hàng</a>
									<?php if(isset($_SESSION['dang_nhap'])) { ?>
										<a class="out-menu" href="/btl/mua_hang.php">
										<button id="them" class="btn btn-darkk">
										Mua hàng
										</button>
									</a>
									<?php } ?>
								<?php
							} else {
								echo '<a class="goto" href="javascript:void(0)">Không có sản phẩm</a>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
</div>
						</body>