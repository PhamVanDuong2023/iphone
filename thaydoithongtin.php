<div id="check"></div>
<div id="error"></div>
<div>
    <form name="signin" action="/duanmau/controller/admin/taikhoan/update.php" method="post" onsubmit="return validateForm()">
        <div class="container ">
            
            <div class="form-row" style="margin: 50px 0;">
            <h1 style="margin-bottom: 20px;">Thay đổi thông tin</h1>
                <?php
                if (isset($_GET['check']) && $_GET['check'] == "success") {
                ?>
                    <div class="form-group col-md-6" style="margin-bottom: 20px;">
                        <div class="alert alert-success" role="alert">
                            Thay đổi thông tin thành công!
                        </div>
                    </div>
                <?php
                }
                ?>
                <input type="hidden" name="id" value="<?php echo $nguoiDung['nguoidung_id'] ?>">
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="hovaten">Họ và tên</label>
                    <input type="text" class="form-control" id="hovaten" value="<?php echo $nguoiDung['hovaten'] ?>" name="hovaten">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $nguoiDung['email'] ?>" name="email">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="diachinhanhang">Địa chỉ nhận hàng</label>
                    <input type="text" class="form-control" id="diachinhanhang" value="<?php echo $nguoiDung['diachinhanhang'] ?>" name="diachinhanhang">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="diachithanhtoan">Địa chỉ thanh toán</label>
                    <input type="text" class="form-control" id="diachithanhtoan" value="<?php echo $nguoiDung['diachithanhtoan'] ?>" name="diachithanhtoan">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="sodienthoai">Số điện thoại</label>
                    <input type="text" class="form-control" id="sodienthoai" value="<?php echo $nguoiDung['sodienthoai'] ?>" name="sodienthoai">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="ngaysinh">Ngay sinh</label>
                    <input type="date" class="form-control" id="ngaysinh" value="<?php echo $nguoiDung['ngaysinh'] ?>" name="ngaysinh">
                </div>
                <input type="submit" class="login" name="btn" value="Thay đổi">
            </div>
        </div>
    </form>
</div>

<script>
    function validateForm() {
        var checkpass = document.getElementById("check_pass");
        var check = document.getElementById("check");
        var error = document.getElementById("error");
        var message = "<div class=\"alert alert-danger \" role=\"alert /\"> Bạn chưa điền đủ thông tin </div>";
        var message_error = "<div class=\"alert alert-danger \" role=\"alert /\"> Bạn nhập sai số điện thoại </div>";
        let signin = document.getElementsByClassName('signin');
        let hovaten = document.forms["signin"]["hovaten"].value;
        let email = document.forms["signin"]["email"].value;
        let diaChiNhanHang = document.forms["signin"]["diachinhanhang"].value;
        let diaChiThanhToan = document.forms["signin"]["diachithanhtoan"].value;
        let soDienThoai = document.forms["signin"]["sodienthoai"].value;
        let ngaySinh = document.forms["signin"]["ngaysinh"].value;
        let tenDangNhap = document.forms["signin"]["tendangnhap"].value;
        let matKhau = document.forms["signin"]["matkhau"].value;
        let nhapLaiMatKhau = document.forms["signin"]["nhaplaimatkhau"].value;

        if (hovaten == "" || email == "" || diaChiNhanHang == "" || soDienThoai == "" || ngaySinh == "" || tenDangNhap == "" || matKhau == "" || nhapLaiMatKhau == "") {
            check.innerHTML = message;
            return false;
        } else {
            check.innerHTML = "";
        }
        var pattern = /^(0[1-9][0-9]{8}|\\+84[1-9][0-9]{8})$/;
        if (!pattern.test(soDienThoai)) {
            error.innerHTML = message_error;
            return false;
        } else {
            error.innerHTML = "";
        }

        if (matKhau != nhapLaiMatKhau) {
            error.innerHTML = "Bạn nhập sai mật khẩu xác nhận!";
            return false;
        } else {
            error.innerHTML = "";
        }

    }
</script>