<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="img/tablogo.png">
	<link rel="stylesheet" type="text/css" href="/btl/css/BaiTapLon.css">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Thanh toán</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>

   <!-- Checkout content section start -->
	<section class="pages checkout section-padding">
		<div class="container">
			<div class="row">
				<form action="./vnpay_create_payment.php" method="post">
					<div class="col-sm-6">
						<div class="main-input single-cart-form padding60">
							<div class="log-title">
								<h3><strong>Thông tin khách hàng</strong></h3>
							</div>
							<div class="custom-input">
								<?php 
									$id_khach_hang = $_SESSION['dang_nhap']["id_khach_hang"];
									$sql = "SELECT * FROM tbl_khach_hang WHERE id_khach_hang = $id_khach_hang";
									$sql_query = mysqli_query($ket_noi, $sql);
									$khach_hang = mysqli_fetch_array($sql_query);
								?>
							
								<input type="text" name="ten_kh" value="<?php echo $khach_hang['ten_kh']; ?>" placeholder="Tên khách hàng" readonly/>
								<input type="email" name="email" value="<?php echo $khach_hang['email']; ?>" placeholder="Địa chỉ email" readonly/>
								<input type="text" name="sdt" value="<?php echo $khach_hang['sdt']; ?>" placeholder="Số điện thoại"readonly />
								<div class="custom-mess">
									<textarea rows="2" name="dia_chi" placeholder="Địa chỉ nhận hàng"><?php echo $khach_hang['dia_chi']; ?></textarea>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-6">
						<div class="padding60">
							<div class="log-title">
								<h3><strong>Thông tin thanh toán</strong></h3>
							</div>
							<div class="cart-form-text pay-details table-responsive">
								<table>
									<thead>
										<tr>
											<th>Sản phẩm</th>
											<td>Tổng tiền</td>
										</tr>
									</thead>
									<tbody>
									<?php
										if(isset($_SESSION['gio_hang']) && !empty($_SESSION['gio_hang'])) {
											foreach($_SESSION['gio_hang'] as $gh) {
												?>
													<tr>
														<th><?php echo $gh["ten_sp"]; ?>  x <?php echo $gh['so_luong_sp'] ?></th>
														<td><?php echo $gh['gia_ban'] * $gh['so_luong_sp'] ?> $</td>
													</tr>
												<?php
											}
											?>
											<?php
										} else {
											echo '<tr><td colspan="5">Không có sản phẩm nào</td></tr>';
										}
									?>
									</tbody>
									<tfoot>
										<tr>
											<th>Tổng tiền</th>
											<td><?php echo $_SESSION['tong_tien_gio_hang']; ?> $</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-6">
						<div class="text-center">
							<div class="normal-a">
							<div class="_checkout__input__checkbox">
                                <label for="acc-or">
                                    <p>Lựa chọn phương thức :</p>

                                        <div>
                                        <input type="radio" name="phuong_thuc" value="tm"
                                        checked>
                                        <label for="tm">Tiền mặt</label>
                                        </div>

                                        <div>
                                        <input type="radio" name="phuong_thuc" value="vnpay">
                                        <label for="vnpay">VNPayment</label>
                                        </div>

                                        <!-- <div>
                                        <input type="radio" name="phuong_thuc" value="qr">
                                        <label for="qr">Quét mã QR</label>
                                        </div> -->
                                </label>
                            </div>
							</div>
							<div class="categories">
								<div class="submit-text">
									<input name="amount" type="hidden" value=<?php echo $_SESSION['tong_tien_gio_hang']?>>
                            		<input name="order_id" type="hidden" value="<?php echo date("YmdHis")?>">
									<button clas="btn btn-dark"name="dat_hang">Đặt mua</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- Checkout content section end -->

	<div class="phuter" style="
    margin-top: 9.5%;
"	>
	<br>
	<?php include 'includes/footer.php'; ?>
	<div>
</body>
</html>