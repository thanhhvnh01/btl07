<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="img/tablogo.png">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" type="text/css" href="/btl/css/BaiTapLon.css">
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>

    <!-- cart content section start -->
    <section class="pages cart-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive padding60">
                        <table class="wishlist-table text-center">
                            <thead>
                                <tr class="nam" style="background-color:white!important">
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_SESSION['gio_hang']) && !empty($_SESSION['gio_hang'])) {
                                        foreach($_SESSION['gio_hang'] as $gh) {
                                            ?>
                                                <tr>
                                                    <td  class="td-img text-left">
                                                        <a href="/btl/chi_tiet_sp.php?id_sp=<?php echo $gh["id_sp"]; ?>"><img src="/btl/img/<?php echo $gh["anh"]; ?>"></a>
                                                        <div class="items-dsc">
                                                            <h5><a href="/btl/chi_tiet_sp.php?id_sp=<?php echo $gh["id_sp"]; ?>"><?php echo $gh['ten_sp'] ?></a></h5>
                                                            <p class="itemcolor">Color : <span>BLACK</span></p>
                                                            <p class="itemcolor">Size   : <span>M</span></p>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $gh['gia_ban'] ?>vnd</td>
                                                    <td>
                                                        <?php echo $gh['so_luong_sp'] ?>
                                                    </td>
                                                    <td>
                                                        <strong><?php echo $gh['gia_ban'] * $gh['so_luong_sp'] ?>vnd</strong>
                                                    </td>
                                                    <td><a href="?xoa_gio_hang=<?php echo $gh["id_sp"]; ?>"><i class="mdi mdi-close" title="Remove this product"></i></a></td>
                                                </tr>
                                            <?php
                                        }
                                        
                                        
                                    } else {
                                        echo 
                                        "
                                            <script type='text/javascript'>
                                                window.alert('Giỏ hàng trống.');
                                                 window.location.href = '/btl/index.php'
                                            </script>
                                        ";
                                    }
                                ?>
                                <?php
                                    if(isset($_SESSION['gio_hang']) && empty($_SESSION['gio_hang'])) {
                                        
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            <div class="text-center" style="margin-top: 30px;">
                <?php
                    if(isset($_SESSION['dang_nhap']) && !empty($_SESSION['dang_nhap'])) {
                ?>
                    <a href="/btl/mua_hang.php" class="btn btn-dark">Đặt Hàng</a>
                <?php 
                    } else{
                ?>
                    <a href="/btl/dang_nhap.php" class="btn btn-dark">Đăng nhập để mua hàng</a>
                <?php 
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- cart content section end -->

	<?php include 'includes/footer.php'; ?>
</body>
</html>