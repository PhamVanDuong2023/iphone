<div id="check"></div>
<div id="error"></div>
<div>
    <form id="myForm" action="/duanmau/controller/admin/taikhoan/add.php" method="post">
        <div class="container ">

            <div class="form-row" style="margin: 50px 0;">
                <h1 style="margin-bottom: 20px;">sign in</h1>
                <?php
                if (isset($_GET['check']) && $_GET['check'] == "tontai") {
                ?>
                    <div class="form-group col-md-6" style="margin-bottom: 20px;">
                        <div class="alert alert-danger" role="alert">
                            Tên tài khoản đã tồn tại!
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="hovaten">Họ và tên</label>
                    <input type="text" class="form-control" id="hovaten" name="hovaten">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="diachinhanhang">Địa chỉ nhận hàng</label>
                    <input type="text" class="form-control" id="diachinhanhang" name="diachinhanhang">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="diachithanhtoan">Địa chỉ thanh toán</label>
                    <input type="text" class="form-control" id="diachithanhtoan" name="diachithanhtoan">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="sodienthoai">Số điện thoại</label>
                    <input type="text" class="form-control" id="sodienthoai" name="sodienthoai">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="ngaysinh">Ngay sinh</label>
                    <input type="date" class="form-control" id="ngaysinh" name="ngaysinh">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="tendangnhap">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="tendangnhap" name="tendangnhap">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="matkhau">Mật khẩu</label>
                    <input type="password" class="form-control" id="matkhau" name="matkhau">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <label for="xacnhanmatkhau">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" id="xacnhanmatkhau" name="xacnhanmatkhau">
                    <span id="check_pass" style="color: red;"></span>
                </div>
                <input type="submit" class="login" name="btn" value="sign in">
            </div>
        </div>
    </form>
</div>

<script>
    

    document.getElementById("myForm").addEventListener("submit", function(event) {
        // Get the form elements
        var checkpass = document.getElementById("check_pass");
        var check = document.getElementById("check");
        var error = document.getElementById("error");
        var message = "<div class=\"alert alert-danger \" role=\"alert /\"> Bạn chưa điền đủ thông tin </div>";
        var message_error = "<div class=\"alert alert-danger \" role=\"alert /\"> Bạn nhập sai số điện thoại </div>";
        let hovaten = document.getElementById("hovaten");
        let email = document.getElementById("email");
        let diaChiNhanHang = document.getElementById("diachinhanhang");
        let diaChiThanhToan = document.getElementById("diachithanhtoan");
        let soDienThoai = document.getElementById("sodienthoai");
        let ngaySinh = document.getElementById("ngaysinh");
        let tenDangNhap = document.getElementById("tendangnhap");
        let matKhau = document.getElementById("matkhau");
        let nhapLaiMatKhau = document.getElementById("xacnhanmatkhau");
        var pattern = /^(0[1-9][0-9]{8}|\\+84[1-9][0-9]{8})$/;
        // Check if the name field is empty
        if (hovaten.value.trim() === "" || email.value.trim() === "" || diaChiNhanHang.value.trim() === "" || diaChiThanhToan.value.trim() === "" || soDienThoai.value.trim() === "" || ngaySinh.value.trim() === "" || tenDangNhap.value.trim() === "" || matKhau.value.trim() === "" || nhapLaiMatKhau.value.trim() === "") {
            check.innerHTML = message;
            console.log("abc");
            event.preventDefault(); // Prevent form submission
            return ;
        }
        
        console.log("----------------------------------------");
        if (matKhau.value.trim() != nhapLaiMatKhau.value.trim()) {
            checkpass.innerHTML = "Bạn nhập sai mật khẩu xác nhận!";
            console.log("aaa");
            event.preventDefault(); // Prevent form submission
            return ;
        }

        
        if (!pattern.test(soDienThoai.value)) {
            error.innerHTML = message_error;
            event.preventDefault();
            return ;
        }


    });


</script>