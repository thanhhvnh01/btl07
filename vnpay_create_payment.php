<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
require_once("./vnpay_php/config.php");

$ten = $_POST['ten_kh'];
$dien_thoai = $_POST['sdt'];
$email = $_POST['email'];
$dia_chi = $_POST['dia_chi'];

$_SESSION['ten']=$ten;
$_SESSION['dien_thoai']=$dien_thoai;
$_SESSION['email']=$email;
$_SESSION['dia_chi']=$dia_chi;

$vnp_TxnRef = $_POST['order_id']; 
$vnp_OrderInfo = 'Trả tiền hàng qua VNPAY';
$vnp_Amount = $_POST['amount']*100*23000;
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
$vnp_BankCode = $_POST['bank_code'];

// $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
// $vnp_OrderInfo = $_POST['order_desc'];
// $vnp_OrderType = $_POST['order_type'];
// $vnp_Amount = str_replace(',', '', $_POST['amount']) * 100;
// $vnp_Locale = $_POST['language'];
// $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

if (isset($_POST['phuong_thuc']) && $_POST['phuong_thuc'] == "vnpay") 
{
    $inputData = array(
    "vnp_Version" => "2.0.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => "vn",
    "vnp_OrderInfo" => $vnp_OrderInfo,
    // "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_Ten" => $ten,
    );
// if (isset($vnp_BankCode) && $vnp_BankCode != "") {
//     $inputData['vnp_BankCode'] = $vnp_BankCode;
// }
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . $key . "=" . $value;
        } else {
            $hashdata .= $key . "=" . $value;
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
   	    $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
        $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
    header('Location: '.$vnp_Url);
}

// <?php
// 		if(!isset($_SESSION['dang_nhap'])) {
// 			echo 
// 			"
// 				<script type='text/javascript'>
// 					window.location.href = '/btl/dang_nhap.php'
// 				</script>
// 			";
// 		}

		// xử lý đặt hàng
		if(isset($_POST['dat_hang']) && $_POST['phuong_thuc'] == "tm") {
			$id_khach_hang = $_SESSION['dang_nhap']["id_khach_hang"];
			$phuong_thuc_tt = $_POST["phuong_thuc"];
			$ngay_dat_hang = date('YmdHis');
			$tong_tien = $_SESSION['tong_tien_gio_hang'];
			$ten_kh = $_POST["ten_kh"];
			$email = $_POST["email"];
			$sdt = $_POST["sdt"];
			$dia_chi = $_POST["dia_chi"];
			$trang_thai = 'Đặt hàng';
			$ket_noi = mysqli_connect("localhost", "root", "", "btl");

			$sql_hdb = "INSERT INTO `tbl_hdb` (`id_khach_hang`, `phuong_thuc_tt`, `ngay_dat_hang`,`tong_tien`, `ten_kh`, `email`, `sdt`, `dia_chi`, `trang_thai`) 
				VALUES ('".$id_khach_hang."', '".$phuong_thuc_tt."', '".$ngay_dat_hang."', '".$tong_tien."', '".$ten_kh."', '".$email."', '".$sdt."', '".$dia_chi."', '".$trang_thai."');";
			mysqli_query($ket_noi, $sql_hdb);

			 //if ($ket_noi->query($sql_hdb) == TRUE) {
				// insert chi tiết đơn hàng
				$id_hdb = $ket_noi->insert_id;
				foreach($_SESSION['gio_hang'] as $gh) {
					$id_sp = $gh['id_sp'];
					$so_luong = $gh['so_luong_sp'];
					$gia_ban = (int) $gh['gia_giam'];
					$tong_tien = (int) ($gh['gia_giam'] * $gh['so_luong_sp']);

					$sql_chi_tiet = "INSERT INTO `tbl_chi_tiet_hdb` (`id_hdb`, `id_sp`, `so_luong`, `gia_ban`,`tong_tien`) 
						VALUES ('".$id_hdb."', '".$id_sp."', '".$so_luong."', '".$gia_ban."', '".$tong_tien."');";
					
					$ket_noi->query($sql_chi_tiet);
				 }

				// Sau khi đặt hàng xong xóa giỏ hàng
				unset($_SESSION['gio_hang']);
				unset($_SESSION['tong_tien_gio_hang']);

				echo 
				"
					<script type='text/javascript'>
						window.alert('Đặt hàng thành công.');
					</script>
				";

				echo 
				"
					<script type='text/javascript'>
						window.location.href = '/btl'
					</script>
				";
			//} else {
			//	echo "<script type='text/javascript'>
			//		window.alert(Đặt hàng thất bại.');
			//	</script>";
			//	// echo "Error: " . $sql . "<br>" . $ket_noi->error;
			//}
		}
	?>