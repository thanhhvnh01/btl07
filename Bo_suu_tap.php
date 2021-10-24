<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vn">
<head>
<link rel="icon" href="img/tablogo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bộ sưu tập - Lyns Boutique</title>
    <link rel="stylesheet" type="text/css" href="/btl/css/BaiTapLon.css">
    <?php include 'includes/head.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section id="content" class="container-body body-content--album">
        <div class="page-title-head">
            <strong class="font-playfair is-text-center">BỘ SƯU TẬP</strong>
            <!--<p class="font-sfui is-text-center is-hidden-mobile" style="color: #95989A;">Bộ sưu tập đặc biệt 2018</p>-->
        </div>

        <ul class="row album-filter">
            <li style="font-size: 17px;" class="active">Mới nhất</li>
        </ul>
        <ul style="margin-left: 0px;" class="row list-album list-item-div is-wrap-flex">
        	<?php 
				// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
				$sql = "
					SELECT
                    tbl_bo_suu_tap.`id_bst`,
                    ten_bst,
                    mo_ta,
                    ngay_ra_mat,
                    (SELECT anh FROM tbl_anh WHERE id_anh = (SELECT MIN(id_anh) FROM tbl_anh WHERE id_sp = (SELECT MIN(id_sp) FROM tbl_anh WHERE tbl_anh.id_bst = tbl_bo_suu_tap.`id_bst`) and tbl_anh.id_bst = tbl_bo_suu_tap.`id_bst`) and tbl_anh.id_bst = tbl_bo_suu_tap.`id_bst`) as anh1 ,
                    (SELECT anh FROM tbl_anh WHERE id_anh = (SELECT MIN(id_anh) FROM tbl_anh WHERE id_sp = (SELECT MIN(id_sp) +1 FROM tbl_anh WHERE tbl_anh.id_bst = tbl_bo_suu_tap.`id_bst`) and tbl_anh.id_bst = tbl_bo_suu_tap.`id_bst`) and tbl_anh.id_bst = tbl_bo_suu_tap.`id_bst`) as anh2 ,
                    (SELECT anh FROM tbl_anh WHERE id_anh = (SELECT MIN(id_anh) FROM tbl_anh WHERE id_sp = (SELECT MIN(id_sp) +2 FROM tbl_anh WHERE tbl_anh.id_bst = tbl_bo_suu_tap.`id_bst`) and tbl_anh.id_bst = tbl_bo_suu_tap.`id_bst`) and tbl_anh.id_bst = tbl_bo_suu_tap.`id_bst`) as anh3 
                    FROM
                    tbl_bo_suu_tap
                    JOIN tbl_anh ON tbl_bo_suu_tap.id_bst = tbl_anh.id_bst
                    GROUP BY
                    tbl_bo_suu_tap.`id_bst`
                    ORDER BY
                    tbl_bo_suu_tap.id_bst
                    DESC
				";

				// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
				$noi_dung_tin_tuc = mysqli_query($ket_noi, $sql);

				// 4. Hiển thị dữ liệu mong muốn
				while ($row = mysqli_fetch_array($noi_dung_tin_tuc)) {
			;?>


            <li style="margin-right: 10px;" class="item-div">
                <a href="BST_ket_noi.php?id=<?php echo $row["id_bst"];?>">
                    <div class="anhbst">
                    	
                        <div style="margin-right: 4px;" class="divanhtrai" >
                            <img style="max-height: 236px;" class="anhtrai" src="./img/<?php 
						if ($row["anh1"]<>"") {
							echo $row["anh1"];
						} else {
							echo "no_image.png";
						}
					;?>" alt="">
                        </div>

                        <div class="divanhphai">
                            <img class="anhphaitren" src="./img/<?php 
						if ($row["anh2"]<>"") {
							echo $row["anh2"];
						} else {
							echo "no_image.png";
						}
					;?>">
                            <img class="anhphaiduoi" src="./img/<?php 
						if ($row["anh3"]<>"") {
							echo $row["anh3"];
						} else {
							echo "no_image.png";
						}
					;?>">
                        </div>
                        
                    </div>
                    <div class="chubst">
                        <strong class="chuto"><?php echo $row["ten_bst"];?></strong>
                        <p class="ngaythang"><?php echo $row["ngay_ra_mat"];?></p>
                    </div>
                </a>
            </li>
            <?php
		        }
	        ;?>
        </ul>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>
</html>