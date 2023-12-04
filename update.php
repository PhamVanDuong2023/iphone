<div class="main-content">

    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang danh sách sản phẩm</a>
                </li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Trang sản phẩm</h1>
                </div>
            </div>
        </div>
        <div id="check"></div>
        <div id="error"></div>
        <?php
        if (isset($_GET['check']) && $_GET['check'] == "success") {
        ?>
            <div class="alert alert-success" role="alert">
                Bạn đã thêm thành công san phẩm
            </div>

        <?php
        }
        ?>
        <form name="myform" action="/duanmau/controller/admin/sanpham/update.php" method="post" enctype="multipart/form-data" style="margin-left: 50px;" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-6">
                <input type="hidden" value="<?php echo  $sanphamupdate['sanpham_id'] ?>" name="id">
                <input type="hidden" value="<?php echo  $sanphamupdate['hinhanh'] ?>" name="hinhanh">
                    <div class="">
                        <label for="tensanpham">
                            Tên sản phẩm
                        </label></br>
                        <input class="ip" type="text" id="tensanpham" value="<?php echo $sanphamupdate['tensanpham'] ?>" name="tensanpham">
                    </div>
                    <div class="">
                        <label for="giasanpham">
                            Giá sản phẩm
                        </label></br>
                        <input class="ip" type="text" id="giasanpham" value="<?php echo $sanphamupdate['giasanpham'] ?>" name="giasanpham">
                    </div>
                    <div class="">
                        <label for="hinhanh">
                            Ảnh sản phẩm
                        </label></br>
                        <input class="ip" type="file" id="hinhanh" name="hinhanh">
                    </div>
                    <div class="">
                        <label for="motangan">Mô tả ngắn:</label></br>
                        <textarea class="form-control ip" rows="5" id="motangan" value="" name="motangan"><?php echo $sanphamupdate['motangan'] ?></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="">
                        <label for="mota">Mô tả:</label></br>
                        <textarea class="form-control ip" rows="5" id="mota" value="" name="mota"><?php echo $sanphamupdate['mota'] ?></textarea>
                    </div>
                    <div class="">
                        <label for="soluong">
                            Số lượng sản phẩm
                        </label></br>
                        <input class="ip" type="number" id="soluong" value="<?php echo $sanphamupdate['soluong'] ?>" name="soluong">
                    </div>
                    <div class="">
                        <label for="luotxem">
                            Số lượt xem
                        </label></br>
                        <input class="ip" type="number" id="luotxem" value="<?php echo $sanphamupdate['luotxem'] ?>" name="luotxem">
                    </div>
                    <div class="">
                        <label for="danhmuc">Tên danh mục</label></br>
                        <select name="danhmuc" id="danhmuc">
                            <?php
                            foreach ($listdanhmuc as $danhmuc) {
                            ?>
                                <option value="<?php echo $danhmuc['danhmuc_id'] ?>" <?php echo ($sanphamupdate['danhmuc_id'] == $danhmuc['danhmuc_id']) ? "selected" : "" ?>><?php echo $danhmuc['tendanhmuc'] ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="page" value="<?php echo $_GET['page'] ?>">
                <input type="hidden" name="maxPageItem" value="<?php echo $_GET['maxPageItem'] ?>">
                <input type="hidden" name="sortName" value="<?php echo $_GET['sortName'] ?>">
                <input type="hidden" name="sortBy" value="<?php echo $_GET['sortBy'] ?>">
                <input class="ip" type="submit" value="Sửa" name="btn">
            </div>
        </form>
        <div class="row">
            <div class="col">
            <a class="danhsachdanhmuc" href="/duanmau/controller/admin/admin.php?action=danhsachsanpham&page=<?php echo $_GET['page'] ?>&&maxPageItem=<?php echo $_GET['maxPageItem'] ?>&&sortName=<?php echo $_GET['sortName'] ?>&&sortBy=<?php echo $_GET['sortBy'] ?>">Xem danh sách sản phẩm</a>           
            </div>
        
        </div>
    </div>
    
</div><!-- /.main-content -->


<script>
    function validateForm() {
        var check = document.getElementById("check");
        var error = document.getElementById("error");
        var message = "<div class=\"alert alert-danger \" role=\"alert /\"> Bạn chưa điền đủ thông tin </div>";
        var message_error = "<div class=\"alert alert-danger \" role=\"alert /\"> Bạn nhập sai thông tin </div>";
        let tensanpham = document.forms["myform"]["tensanpham"].value;
        let giasanpham = document.forms["myform"]["giasanpham"].value;
        let hinhanh = document.getElementById('hinhanh').value;
        let myForm = document.getElementsByClassName('myform');
        let motangan = document.forms["myform"]["motangan"].value;
        let mota = document.forms["myform"]["mota"].value;
        let soluong = document.forms["myform"]["soluong"].value;
        let luotxem = document.forms["myform"]["luotxem"].value;

        if (tensanpham == "" || giasanpham == "" || motangan == "" || mota == "" || soluong == "" || luotxem == "") {
            check.innerHTML = message;
            return false;
        } else {
            check.innerHTML = "";
        }
        var pattern = /^-?\d+(\.\d+)?$/;
        if (!pattern.test(giasanpham)) {
            error.innerHTML = message_error;
            return false;
        } else {
            error.innerHTML = "";
        }

        if (giasanpham < 0 || soluong < 0 || luotxem < 0) {
            error.innerHTML = message_error;
            return false;
        } else {
            error.innerHTML = "";
        }

        // var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        // if (!allowedExtensions.exec(hinhanh)) {
        //     check.innerHTML = message;
        //     return false;
        // } else {
        //     check.innerHTML = "";
        // }

    }
</script>