<form id="myForm" action="/duanmau/controller/admin/taikhoan/updatePassWord.php" method="post" style="margin: 200px 0;">
    <div class="container ">
<h1><?php $tendangnhap = $_SESSION['nguoidung']['tendangnhap'];
echo $tendangnhap;
?></h1>
        <div class="form-row" style="margin: 50px 0;">
            <h1 style="margin-bottom: 20px;">Thay đổi mật khẩu</h1>
            <?php
            if (isset($_GET['check']) && $_GET['check'] == "danger") {
            ?>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <div class="alert alert-danger" role="alert">
                        Mật khẩu cũ không chính xác!
                    </div>
                </div>
            <?php
            }
            if (isset($_GET['check']) && $_GET['check'] == "success") {
            ?>
                <div class="form-group col-md-6" style="margin-bottom: 20px;">
                    <div class="alert alert-success" role="alert">
                        Cập nhật mật khẩu thành công!
                    </div>
                </div>
            <?php
            }
            ?>
            <div id="check">

            </div>

            <div class="form-group col-md-6" style="margin-bottom: 20px;">
                <label for="matkhaucu">Mật khẩu cũ</label>
                <input type="password" class="form-control" id="matkhaucu" name="matkhaucu">
            </div>
            <div class="form-group col-md-6" style="margin-bottom: 20px;">
                <label for="matkhaumoi">Mật khẩu mới</label>
                <input type="password" class="form-control" id="matkhaumoi" name="matkhaumoi">
            </div>
            <div class="form-group col-md-6" style="margin-bottom: 20px;">
                <label for="xacnhanmatkhau">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="xacnhanmatkhau" name="xacnhanmatkhau">
                <span id="check_pass" style="color: red;"></span>
            </div>
            <input type="submit" class="login" name="btn" value="Thay đổi mật khẩu">
        </div>
    </div>
</form>
<script>
    

    document.getElementById("myForm").addEventListener("submit", function(event) {
        // Get the form elements
        var checkpass = document.getElementById("check_pass");
        var check = document.getElementById("check");
       
        var message = "<div class=\"alert alert-danger \" role=\"alert /\"> Bạn chưa điền đủ thông tin </div>";
        let matKhau = document.getElementById("matkhaumoi");
        let matKhaucu = document.getElementById("matkhaucu");
        let nhapLaiMatKhau = document.getElementById("xacnhanmatkhau");
        var pattern = /^(0[1-9][0-9]{8}|\\+84[1-9][0-9]{8})$/;
        // Check if the name field is empty
        if (matkhaumoi.value.trim() === "" || matkhaucu.value.trim() === "" || nhapLaiMatKhau.value.trim() === "") {
            check.innerHTML = message;
            event.preventDefault(); // Prevent form submission
            return ;
        }
        

        if (matKhau.value.trim() != nhapLaiMatKhau.value.trim()) {
            checkpass.innerHTML = "Bạn nhập sai mật khẩu xác nhận!";

            event.preventDefault(); // Prevent form submission
            return ;
        }

        


    });


</script>