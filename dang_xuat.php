<?php

if(isset($_SESSION['email']) && $_SESSION['email'] != NULL) {
    unset($_SESSION['email']);
}

    header('Location: dang_nhap.php');
?>