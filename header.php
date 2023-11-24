<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="/template/web/assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/duanmau/template/web/css/styles.css" rel="stylesheet" />
    <link href="/duanmau/template/web/style.css" rel="stylesheet" />
    <link href="/duanmau/template/web/js/scripts.js" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <script src="/duanmau/template/admin/assets/js/ace-extra.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"> -->
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/duanmau/template/paging/jquery.twbsPagination.js"></script>
</head>

<body>

    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/duanmau/controller/web/index.php"><img class="logo" src="../../template/web/img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/duanmau/controller/web/index.php">Home</a></li>


                    <li class="nav-item"><a class="nav-link" href="/duanmau/controller/web/index.php?action=sanphamhot&&page=1&&maxPageItem=8&&sortBy=desc&&sortName=luotxem">Sản phẩm hot</a></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/duanmau/controller/web/index.php?action=tatcasanpham&&page=1&&maxPageItem=8&&sortBy=asc&&sortName=sanpham_id">Tất cả sản phẩm</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <?php
                            foreach ($listdanhmuc as $danhmuc) {


                            ?>
                                <li><a class="dropdown-item" href="/duanmau/controller/web/index.php?action=danhmucsanpham&&page=1&&maxPageItem=8&&sortBy=desc&&sortName=sanpham_id&&danhmuc=<?php echo $danhmuc['danhmuc_id'] ?>"><?php echo $danhmuc['tendanhmuc'] ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    
                    <li>
                        <form action="/duanmau/controller/web/index.php?" class="d-flex">
                            <input type="hidden" value="sanphamtimkiem" name="action">
                            <input type="hidden" value="1" name="page">
                            <input type="hidden" value="8" name="maxPageItem">
                            <input type="hidden" value="desc" name="sortBy">
                            <input type="hidden" value="sanpham_id" name="sortName">
                            <input class="form-control me-2" type="text" placeholder="Search" name='search'>
                            <input type="submit" class="login" value="Tìm kiếm">
                        </form>
                    </li>
                </ul>


                <?php if (isset($_SESSION['nguoidung']) && $_SESSION['nguoidung']['code'] == "USER") { ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['nguoidung']['hovaten'] ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="/duanmau/controller/web/index.php?action=myOrder">Đơn hàng của tôi</a></li>
                            <li><a class="dropdown-item" href="/duanmau/controller/web/index.php?action=thaydoimatkhau">Thay đổi mật khẩu</a></li>
                            <li><a class="dropdown-item" href="/duanmau/controller/web/index.php?action=thaydoithongtin">Thay đổi thông tin</a></li>
                            <li><a class="dropdown-item" href="/duanmau/controller/web/index.php?action=logout">Đăng xuất</a></li>
                        </ul>
                    </div>
                    <a class="login" href="/duanmau/controller/web/index.php?action=giohang&&page=1&&maxPageItem=5&&sortBy=desc&&sortName=giohang_id&&nguoidung_id=<?php echo $_SESSION['nguoidung']['nguoidung_id'] ?>">
                        <i class="bi-cart-fill me-1"></i> Cart
                    </a>
                <?php
                } else {
                ?>

                    <a class="login" href="/duanmau/controller/web/index.php?action=login">Đăng Nhập</a> <a class="sign-up" href="/duanmau/controller/web/index.php?action=signin">Đăng
                        Ký</a>

                    <a class="login" href="/duanmau/controller/web/index.php?action=login">
                        <i class="bi-cart-fill me-1"></i> Cart
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>