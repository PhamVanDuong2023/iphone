<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang danh muc</a>
                </li>
            </ul><!-- /.breadcrumb -->
        </div>
        
        <h1 style="margin-left:50px; ">Thêm Danh Mục:</h1>
        <form action="/duanmau/controller/admin/danhmuc/add.php" method="post">
            <div class="row">
                <div class="col-6" style="margin:50px;">
                    <div class="mb-3 mt-3" style="width: 50%; margin-bottom:20px;">
                        <label for="tendanhmuc" class="form-label">Tên danh muc muốn thêm:</label>
                        <input type="text" class="form-control" id="tendanhmuc" placeholder="Tên danh mục" name="tendanhmuc">
                    </div>

                    <input type="submit" class="btn" name="btn" value="Thêm" />
                    <?php
                    if (isset($_GET['check']) && $_GET['check'] == "success") {
                    ?>
                        <div class="alert alert-success" role="alert">
                           Bạn đã thêm thành công danh mục
                        </div>

                    <?php
                    }else if(isset($_GET['check']) && $_GET['check'] == "danger"){
                    ?>
                        <div class="alert alert-danger" role="alert">
                           Ban chưa nhập
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>

        </form>
        <div class="row">
            <div class="col">
            <a class="danhsachdanhmuc" href="/duanmau/controller/admin/admin.php?action=danhsachdanhmuc">Xem danh sách danh mục</a>           
            </div>
        
        </div>
        
    </div>
</div><!-- /.main-content -->