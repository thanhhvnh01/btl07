<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="img/tablogo.png">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Liên hệ</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/btl/css/BaiTapLon.css">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>
    
    <!-- contact content section start -->
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
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <div class="googleMap-info">
                        <div id="googleMap"></div>
                        <div class="map-info">
                            <p><strong>RICK OWENS</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-text-center">
                    <div class="contact-details">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="single-contact">
                                    <i class="mdi mdi-map-marker"></i>
                                    <p>Số 103B, ngõ 89,</p>
                                    <p>Lương Định Của, Hà Nội</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-contact">
                                    <i class="mdi mdi-phone"></i>
                                    <p>(+84) 0327103020</p>
                                    <p>(+84) 0326 anh có vợ rồi</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-contact">
                                    <i class="mdi mdi-email"></i>
                                    <p>COMMERCIAL@RICKOWENS.EU</p>
                                    <p>CUSTOMERCARE@RICKOWENS.EU</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact content section end -->

    <?php include 'includes/footer.php'; ?>
    
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
        
            var mapOptions = {
            zoom: 17,
            hue: '#E9E5DC',
            scrollwheel: false,
            mapTypeId:google.maps.MapTypeId.TERRAIN,
            center: new google.maps.LatLng(21.00188399883439, 105.83682182836361)
            };

            var map = new google.maps.Map(document.getElementById('googleMap'),
                mapOptions);


            var marker = new google.maps.Marker({
            position: map.getCenter(),
            icon: 'accets/img/map-marker.png',
            map: map
            });

        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script> 
</body>
</html>