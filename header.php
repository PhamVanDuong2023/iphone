<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>market</title>
    <link rel="stylesheet" href="../css/style-user.css">
    <script src="js/ft.js"></script>
    <style>
        .nut{
            background-color: red;
            color: white;
            min-width: 50px;
        }
    </style>
</head>
<body  onload="loadAnh();slideShow()">
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="../images/logo.jpg" alt="" height="100px" width="150px">
                <div class="input">
                    <!-- <input type="text" placeholder="Nhập tại đây">
                    <button type="submit"><a href="#">Tìm kiếm</a></button> -->
                    <form action="index.php?act=timkiem" method="post" >
                        <input type="text" placeholder="tìm kiếm tại đây" name="kyw">
                        <button type="submit"><a href="#">Tìm kiếm</a></button>
                   </form>
                </div>
                <div class="input3">
                    <div class="input2">
                        <?php
                        if(isset($_SESSION['iduser']) && ($_SESSION['iduser'])!=""){
                                echo '<a href="index.php?act=userinfo&idinfo='.$_SESSION['iduser'].'"><div class="tendn">'.$_SESSION['user'].'
                                <a href=index.php?act=thoat><input type="button" value="Thoát"  class="nut"></a></div></a>';
                                if(isset($_SESSION['role'])&& ($_SESSION['role']==1||$_SESSION['role']==2)) {
                                    echo '<a href="../admin/index.php"><input type="button" value="Trang admin" style=" margin-left: 70px; margin-bottom: 5px;" class="nut"></a>';
                                }
                            }
                        else{
                        ?>
                        <a href="index.php?act=login"><input type="button" value="Đăng nhập" class="dn"></a>
                        <a href="index.php?act=signin"><input type="button" value="Đăng ký" class="dn"></a>
                        
                        <?php } ?>
                    </div>
                    <div class="input2">
                        <button style="width: 203px;">
                            <img src="../images/icon-gio-hang.png" alt="" height="20px" width="20px">
                            <a href="index.php?act=giohang">Giỏ hàng</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="">Điện Thoại</a></li>
                    <li><a href="">Linh Kiện</a></li>
                    <li class="menubo"><a href="">Phụ kiện</a>
                        <div class="menucon">
                            <a href="#">Ốp Điện Thoại</a>
                            <a href="#">Cường Lực</a>
                            <a href="#">Sạc Nhanh</a>
                        </div>
                    </li>
                    <li><a href="">Liên hệ</a></li>
                    <li><a href="">Góp ý</a></li>
                </ul>
            </div>
            <div class="banner">
                <img src="../images/cho1.jpg" alt="" id="slide" height="800px" width="1500px">
            </div>
        </div>