<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- favicon -->
<link rel="shortcut icon" type="image/x-icon" href="/btn/accets/img/favicon.ico">

<link rel="apple-touch-icon" href="apple-touch-icon.png">
<!-- Place favicon.ico in the root directory -->
<!-- google fonts -->
<link href='https://fonts.googleapis.com/css?family=Lato:400,900,700,300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
<!-- all css here -->
<!-- bootstrap v3.3.6 css -->
<link rel="stylesheet" href="/btl/accets/css/bootstrap.min.css">
<!-- animate css -->
<link rel="stylesheet" href="/btl/accets/css/animate.css">
<!-- pe-icon-7-stroke -->
<link rel="stylesheet" href="/btl/accets/css/materialdesignicons.min.css">
<!-- pe-icon-7-stroke -->
<link rel="stylesheet" href="/btl/accets/css/jquery.simpleLens.css">
<!-- jquery-ui.min css -->
<link rel="stylesheet" href="/btl/accets/css/jquery-ui.min.css">
<!-- meanmenu css -->
<link rel="stylesheet" href="/btl/accets/css/meanmenu.min.css">
<!-- nivo.slider css -->
<link rel="stylesheet" href="/btl/accets/css/nivo-slider.css">
<!-- owl.carousel css -->
<link rel="stylesheet" href="/btl/accets/css/owl.carousel.css">
<!-- style css -->
<link rel="stylesheet" href="/btl/accets/css/style.css">
<!-- responsive css -->
<link rel="stylesheet" href="/btl/accets/css/responsive.css">
<!-- modernizr js -->
<script src="/btl/accets/js/vendor/modernizr-2.8.3.min.js"></script>

<?php
    $ket_noi = mysqli_connect("localhost", "root", "", "btl07_db");
    //$ket_noi = mysqli_connect("localhost", "id14337502_lyn", "12345678@Lyn", "id14337502_btl");
    
    // thêm giỏ hàng
    if(isset($_GET['them_gio_hang'])) {
        $id_sp = $_GET['them_gio_hang'];
        $so_luong_sp = (int) $_GET['so_luong_sp'];
        if(!isset($_SESSION['gio_hang'])) {
            $_SESSION['gio_hang'] = [];
        }

        if(isset($_SESSION['gio_hang'][$id_sp])) {
            $_SESSION['gio_hang'][$id_sp]['so_luong_sp'] = $_SESSION['gio_hang'][$id_sp]['so_luong_sp'] + $so_luong_sp;
        } else {
            $sql_gio_hang = "SELECT * FROM tbl_menu WHERE id_sp = $id_sp";
            $san_pham_gio_hang = mysqli_query($ket_noi, $sql_gio_hang);
            $them_sp = mysqli_fetch_array($san_pham_gio_hang);
                    
            $_SESSION['gio_hang'][$id_sp] = [
                'id_sp' => $id_sp,
                'ten_sp' => $them_sp['ten_sp'],
                'anh_minh_hoa' => $them_sp['anh_minh_hoa'],
                'gia_ban' => $them_sp['gia_ban'],
                'gia_ban' => $them_sp['gia_ban'],
                'so_luong_sp' => $so_luong_sp
            ];
        }

        $tong_tien_gio_hang = 0;
        foreach($_SESSION['gio_hang'] as $sp) {
            $tong_tien_gio_hang += $sp['gia_ban'] * $sp['so_luong_sp'];
        }
        $_SESSION['tong_tien_gio_hang'] = $tong_tien_gio_hang;
    }
    // Đăng xuất
    if(isset($_GET['dang_xuat']) && isset($_SESSION['dang_nhap'])) {
        unset($_SESSION['dang_nhap']);
        echo
        "
			<script type='text/javascript'>
				window.alert('Đăng xuất thành công.');
			</script>
		";
    }
    // xóa giỏ hàng
    if(isset($_GET['xoa_gio_hang']) && isset($_SESSION['gio_hang']) && isset($_SESSION['gio_hang'][$_GET['xoa_gio_hang']])) {
        unset($_SESSION['gio_hang'][$_GET['xoa_gio_hang']]);
    }
?>
