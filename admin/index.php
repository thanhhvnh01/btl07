<?php 
    session_start();
    if(!isset($_SESSION['email'])) {
        echo 
        "
            <script type='text/javascript'>
                window.alert('Bạn không có quyền truy cập!');
            </script>
        ";

        // Chuyển người dùng vào trang đăng nhập
        echo 
        "
            <script type='text/javascript'>
                window.location.href = '/btl/admin/dang_nhap.php'
            </script>
        ";
    }

?>
<!DOCTYPE html>
<html>

<head>
    <?php include( 'includes/head.php') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include( 'includes/header.php') ?>

        <?php include( 'includes/sidebar.php') ?>

        <?php include( 'includes/ket_noi.php') ?>
         
        <?php
            $sql_san_pham = mysqli_query($ket_noi, "select * from tbl_menu");
            $so_san_pham = mysqli_num_rows($sql_san_pham);

            $sql_don_hang = mysqli_query($ket_noi, "select * from tbl_hdb");
            $so_don_hang = mysqli_num_rows($sql_don_hang);

            $sql_lien_he = mysqli_query($ket_noi, "select * from tbl_lien_he");
            $so_lien_he = mysqli_num_rows($sql_lien_he);
            
            $sql_khach_hang = mysqli_query($ket_noi, "select * from tbl_khach_hang");
            $so_khach_hang = mysqli_num_rows($sql_khach_hang);
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $so_don_hang ?></h3>

                                    <p>Đơn hàng</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="/btl/admin/don_hang/danh_sach.php" class="small-box-footer"> Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $so_lien_he ?></h3>

                                    <p>Liên hệ</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/btl/admin/lien_he/danh_sach.php" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $so_khach_hang ?></h3>

                                    <p>Khách hàng</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="/btl/admin/khach_hang/danh_sach.php" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $so_san_pham ?></h3>

                                    <p>Sản phẩm</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="/btl/admin/san_pham/danh_sach.php" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
        </div>
    </div>
    <!-- ./wrapper -->

    <?php include( 'includes/footer.php') ?>
</body>

</html>
