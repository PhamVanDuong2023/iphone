<?php
session_start();
ob_start();
$absolute_path = $_SERVER['DOCUMENT_ROOT'] . "/duanmau";
include $absolute_path . "/model/DAO/pdo.php";

include $absolute_path . "/controller/admin/danhmuc/list.php";
require $absolute_path . "/common/web/header.php";
if (isset($_GET['action'])) {
    $action = $_GET['action'];



    if ($action == 'thaydoimatkhau') {
        if (isset($_SESSION['nguoidung']) && $_SESSION['nguoidung']['code'] == "USER") {
            include $absolute_path . "/view/thaydoimatkhau.php";
        } else {
            include $absolute_path . "/view/login.php";
        }
    }

    if ($action == 'thaydoithongtin') {
        if (isset($_SESSION['nguoidung']) && $_SESSION['nguoidung']['code'] == "USER") {
            include $absolute_path . "/controller/admin/taikhoan/findone.php";
            include $absolute_path . "/view/thaydoithongtin.php";
        } else {
            include $absolute_path . "/view/login.php";
        }
    }
    if ($action == 'giohang') {
        if (isset($_SESSION['nguoidung']) && $_SESSION['nguoidung']['code'] == "USER") {
            include $absolute_path . "/controller/admin/giohang/findByUser.php";
            include $absolute_path . "/view/web/giohang.php";
        } else {
            include $absolute_path . "/view/login.php";
        }
    }
    if ($action == 'donhang') {
        if (isset($_SESSION['nguoidung']) && $_SESSION['nguoidung']['code'] == "USER") {
            // include $absolute_path . "/controller/admin/giohang/findByUser.php";
            include $absolute_path . "/controller/admin/sanpham/findone.php";
            include $absolute_path . "/controller/admin/taikhoan/findone.php";

            include $absolute_path . "/view/web/donhang.php";
        } else {
            include $absolute_path . "/view/login.php";
        }
    }
    if ($action == 'myOrder') {
        if (isset($_SESSION['nguoidung']) && $_SESSION['nguoidung']['code'] == "USER") {
            include $absolute_path . "/controller/admin/chitietdonhang/listbyuser.php";
            include $absolute_path . "/view/web/quanlidonhang.php";
        } else {
            include $absolute_path . "/view/login.php";
        }
    }


    switch ($action) {
        case 'sanphamhot':
            include $absolute_path . "/controller/admin/sanpham/list.php";
            include $absolute_path . "/view/web/sanphamhot.php";
            break;
        case 'danhmucsanpham':
            include $absolute_path . "/controller/admin/sanpham/findbydanhmuc.php";
            include $absolute_path . "/view/web/danhmuc.php";
            break;
        case 'chitietsanpham':
            include $absolute_path . "/controller/admin/sanpham/chitietsanpham.php";
            include $absolute_path . "/controller/admin/danhgia/list.php";
            include $absolute_path . "/view/web/chitietsanpham.php";
            break;
        case 'tatcasanpham':
            include $absolute_path . "/controller/admin/sanpham/list.php";
            include $absolute_path . "/view/web/tatcasanpham.php";


            break;
        case 'phantrang':
            include $absolute_path . "/controller/admin/sanpham/list.php";
            include $absolute_path . "/controller/admin/sanpham/findTopProduct.php";
            include $absolute_path . "/view/web/home.php";

            break;
        case 'logout':
            include $absolute_path . "/controller/logout.php";

            break;
        case 'signin':

            include $absolute_path . "/view/signin.php";
            break;
        case 'login':
            include $absolute_path . "/view/login.php";
            break;
        case 'sanphamtimkiem':
            
            include $absolute_path . "/controller/admin/sanpham/findBySearch.php";
            include $absolute_path . "/view/web/timkiemsanpham.php";
            break;
        case 'thanhcong':
            
            include $absolute_path . "/view/web/thanhtoanthanhcong.php";
            break;    
    }
} else {
    $_GET['page'] = 1;
    $_GET['maxPageItem'] = 8;
    $_GET['sortName'] = 'sanpham_id';
    $_GET['sortBy'] = 'desc';
    include $absolute_path . "/controller/admin/sanpham/list.php";
    include $absolute_path . "/controller/admin/sanpham/findTopProduct.php";
    include $absolute_path . "/view/web/home.php";
}


include $absolute_path . "/common/web/footer.php";
ob_end_flush();
?>