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

<?php 
	include('../includes/ket_noi.php');

	// 2. Lẫy dữ liệu để cập nhật tin tức
	$id_sp = $_POST["id"];
	// 2. Lẫy dữ liệu để cập nhật tin tức
	$ten_sp = $_POST["ten_sp"];
	$id_phan_loai = $_POST["id_phan_loai"];
	$so_luong = $_POST["so_luong"];
	$gia_ban = $_POST["gia_ban"];
	$muc_km = $_POST["muc_km"];
	$mo_ta = $_POST["mo_ta"];

	// Lấy ra thông tin ảnh minh họa
	$anh = NULL;
	if(isset($_FILES["anh"]["name"]) && !empty($_FILES["anh"]["name"])) {
		$filename = time().'-'.basename($_FILES["anh"]["name"]);
		$anh_minh_hoa = "../../img/".$filename;
		$file_anh_tam = $_FILES["anh"]["tmp_name"];
		$thuc_hien_luu_anh = move_uploaded_file($file_anh_tam, $anh_minh_hoa);
		
		$anh = $filename;
	}

	if(empty($anh))
	{
		$sql = "
				UPDATE `tbl_menu` 
				SET  
				`id_phan_loai` = '".$id_phan_loai."', 
				`ten_sp` = '".$ten_sp."', 
				`so_luong` = '".$so_luong."', 
				`gia_ban` = '".$gia_ban."', 
				`anh_minh_hoa` = '".$anh."', 
				`muc_km` = '".$muc_km."', 
				`mo_ta` = '".$mo_ta."' 
				WHERE `tbl_menu`.`id_sp` = '".$id_sp."';
		";

	} 
	else 
	{
		$sql = "
				UPDATE `tbl_menu` 
				SET  
				`id_phan_loai` = '".$id_phan_loai."', 
				`ten_sp` = '".$ten_sp."', 
				`so_luong` = '".$so_luong."', 
				`gia_ban` = '".$gia_ban."', 
				`anh_minh_hoa` = '".$anh."', 
				`muc_km` = '".$muc_km."', 
				`mo_ta` = '".$mo_ta."' 
				WHERE `tbl_menu`.`id_sp` = '".$id_sp."';
		";
	}

	if ($ket_noi->query($sql) === TRUE) {

		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật khách hàng thành công.');
			</script>
		";

		// Chuyển người dùng vào trang quản trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.location.href = './danh_sach.php'
			</script>
		";
	} else {
  		echo "Error: " . $sql . "<br>" . $ket_noi->error;
	}
;?>