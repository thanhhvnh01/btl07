<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/btl/css/BaiTapLon.css">
	<link rel="stylesheet" href="/btl/accets/css/style.css">
	<link rel="icon" href="img/tablogo.png">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Đồ ăn các  VIPPRO?</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>
	<div class="slideshow-container">
  <!-- Kết hợp hình ảnh và nội dung cho mội phần tử trong slideshow-->
   <div class="mySlides fade">
     <div class="numbertext">1 / 3</div>
     <img src="https://scontent.fhan14-2.fna.fbcdn.net/v/t1.6435-9/246013529_2946181452314307_212220866091537486_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=e3f864&_nc_ohc=r2LXXr6i5O4AX9-Getf&_nc_ht=scontent.fhan14-2.fna&oh=77a382858bb43fc3f40564d1a1efe3b9&oe=619BDF7F" style="width:100%" alt="concac">
     <div class="text">Nội Dung 1</div>
   </div>
  <div class="mySlides fade">
     <div class="numbertext">2 / 3</div>
     <img src="https://images.pexels.com/photos/1581026/pexels-photo-1581026.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" style="width:100%">
     <div class="text">Nội Dung 2</div>
   </div>
  <div class="mySlides fade">
     <div class="numbertext">3 / 3</div>
     <img src="https://images.pexels.com/photos/2582546/pexels-photo-2582546.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" style="width:100%">
     <div class="text">Nội Dung 3</div>
   </div>
  <!-- Nút điều khiển mũi tên-->
   <a class="prev" onclick="plusSlides(-1)">❮</a>
   <a class="next" onclick="plusSlides(1)">❯</a>
 </div>
 <br>
<!-- Nút tròn điều khiển slideshow-->
 <div style="text-align:center">
   <span class="dot" onclick="currentSlide(1)"></span>
   <span class="dot" onclick="currentSlide(2)"></span>
   <span class="dot" onclick="currentSlide(3)"></span>
 </div>
		
	<img src="https://scontent.fhan14-2.fna.fbcdn.net/v/t1.6435-9/246013529_2946181452314307_212220866091537486_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=e3f864&_nc_ohc=r2LXXr6i5O4AX9-Getf&_nc_ht=scontent.fhan14-2.fna&oh=77a382858bb43fc3f40564d1a1efe3b9&oe=619BDF7F" alt="Ai cha cha"
	 class="anh-nen" width="2000" style="text-align: center;">

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
								<div  class="logohome"  >
					<img src="/btl/img/logo1.png" alt="Rick Owens" style="text-align: center;" />
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
										<img src="/btl/img/<?php echo $row["anh_minh_hoa"]; ?>"/>
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
					<br>	

<div class="col-lg-6">
	<div class="imageBox">
		<a href="san_pham.php">
			<div class="single-box-item first-box">
				<img src="https://scontent.fhan14-1.fna.fbcdn.net/v/t1.6435-9/244506057_2946179042314548_6413797936566180160_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=8bfeb9&_nc_ohc=BW0QD3IEjPIAX8voyLc&_nc_ht=scontent.fhan14-1.fna&oh=44a7bf3d41e7a113fb67ade5a3b8f940&oe=619BE182" alt="Anh"
				width="600" height="650">
			</div>
					<div class="hoverImg">
						<img class="image1" width="600" height="650" src="/btl/img/hover2.png">
					</div>
		</a>
	</div>
</div>


<div class="col-lg-6">
	<div  class="imageBox">
		<a href="san_pham_phan_loai.php?id_phan_loai=11">
			<div class="single-box-item first-box">
				<img  class="image2" width="540" height="650" src="https://scontent.fhan14-2.fna.fbcdn.net/v/t1.18169-9/23167902_1926717200927409_6224466773008288379_n.jpg?_nc_cat=109&ccb=1-5&_nc_sid=174925&_nc_ohc=ectQBvZw0lkAX8BC9hb&_nc_oc=AQlJPW4ih2IGg-MukmIHsQ8d6QtANyxcd6xSI7F0Q53LHBnjnWDvo6DkL1elDcVpJtWHkh2nYlPIoUNd0Nok2rhV&tn=NkG4uIREkUJX-APA&_nc_ht=scontent.fhan14-2.fna&oh=dda22fcda3145b9c2f0459104dc17e62&oe=619C36D4">
			</div>							
				<div class="hoverImg">
					<img class="image1" width="540" height="810" src="/btl/img/hover3.png">
				</div>
				</a>		
	</div>
</div>	
				</div>
			</div>	
		</div>
	</div>
	

	<div class="pages contact-page section-padding">
        <div class="content-for-layout">
        <section id="content" class="container-body body-content--contact body-height-calc">
            <div class="page-wrap contact-wrap">
            <p class="lienhe">CONTACTS</p>
                <div id="lienhe" class="col-sm-12 col-md-3"> 
                    <p class="lienhe2">COMMERCIAL</p>
                    <p class="lienhe3">FOR ALL DISTRIBUTION ENQUIRIES</p>
                    <p class="lienhe3">PLEASE CONTACT LUCA RUGGERI</p>
                    <p class="lienhe3">COMMERCIAL@RICKOWENS.EU</p>
                    <br>
                    <p class="lienhe2">PRESS</p>
                    <p class="lienhe3">PRESS@RICKOWENS.EU</p>
                    <br>
                    <p class="lienhe2">HUMAN RESOURCES</p>
                    <p class="lienhe3">HR@RICKOWENS.EU</p>
                    <br>
                    <p class="lienhe2">CUSTOMER CARE</p>
                    <p class="lienhe3">FOR ALL ENQUIRIES</p>
                    <p class="lienhe3">PLEASE CONTACT</p>
                    <p class="lienhe3">CUSTOMERCARE@RICKOWENS.EU</p>
                    <p class="lienhe3">TEL +39 02 89092664</p>
                    <p class="lienhe3">MONDAY TO FRIDAY</p>
                    <p class="lienhe3">FROM 10:30 A.M. TO 7:30 P.M.</p>
                        
                    </div>
                    <form action="./lien_he_thuc_hien.php" enctype="multipart/form-data" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="__session_id" value="b09774f4-f010-458b-810f-c02063c9bbb1">
                        <input type="hidden" name="_csrf_token" value="ZQMcAD8GDxMaZhAhUBkfAiQ5fScNPws6T5LsxuYvc_tNivMQVu8EysDx">
                        <input type="hidden" name="utf8" value="✓">
          
            
                        <div class="row contact-form">
                        <div id="lienhe" class="col-sm-12 col-md-6"> 
                            <div class="is-vertical-flex form-group">
                            <p class="lienhe">HỌ VÀ TÊN</p>
                                <input type="text" class="form-control" name="first_name" id="customerName" autocomplete="off">
                            </div>
                            <div class="is-vertical-flex form-group">
                            <p class="lienhe">EMAIL ADDRESS</p>
                                <input type="email" class="form-control" name="email" id="customerEmail" autocomplete="off">
                            </div>
                            <div class="is-vertical-flex form-group">
                            <p class="lienhe">SỐ ĐIỆN THOẠI</p>
                                <input type="number" class="form-control" name="phone_number" id="customerPhone" autocomplete="off">
                            </div>
                            <div class="is-vertical-flex form-group">
                            <p class="lienhe">NỘI DUNG</p>
                                <textarea class="form-control" name="description" id="customerFeedbackContent" rows="6"></textarea>
                            </div>
                            
                                <input type="submit" class="btn default-btn btn-send" value="GỬI" id="btn-submit">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
	<!-- tab-products section end -->
	<div class="phuter">
	<br>
	<?php include 'includes/footer.php'; ?>
	<div>
</body>
</html>