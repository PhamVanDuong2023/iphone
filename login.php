<div id="login">

    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <?php
                    if (isset($_GET['check']) && $_GET['check'] == "danger") {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Tài khoản hoặc mật khẩu không chính xác!
                        </div>

                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_GET['check']) && $_GET['check'] == "warning") {
                    ?>
                        <div class="alert alert-warning" role="alert">
                            Bạn chưa đăng nhập!
                        </div>

                    <?php
                    }
                    ?>
                    <form id="login-form" class="form" action="/duanmau/controller/admin/taikhoan/check.php" method="post">
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="tendangnhap" class="text-info">Username:</label><br>
                            <input type="text" name="tendangnhap" id="tendangnhap" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="matkhau" class="text-info">Password:</label><br>
                            <input type="text" name="matkhau" id="matkhau" class="form-control">
                        </div>
                        <div class="form-group">

                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>