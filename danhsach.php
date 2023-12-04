<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="/duanmau/controller/admin/admin.php?action=danhmuc">Trang danh muc</a>
                </li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Trang danh mục</h1>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Thao tắc</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                ?>
                    <tr>

                        <th scope="row"><?php echo $danhmuc["danhmuc_id"] ?></th>
                        <td><?php echo $danhmuc["tendanhmuc"] ?></td>
                        <td>
                            <a class="exec" href="/duanmau/controller/admin/danhmuc/delete.php?id=<?php echo $danhmuc["danhmuc_id"] ?>">Xóa</a> |
                             <a class="exec" href="/duanmau/controller/admin/admin.php?action=update&&id=<?php echo $danhmuc["danhmuc_id"] ?>">Sửa</a>
                        </td>
                        
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
        <div class="row">
            <div class="col">
            <a class="danhsachdanhmuc" href="/duanmau/controller/admin/admin.php?action=danhmuc">Trở về</a>           
            </div>
        
        </div>
    </div>
</div><!-- /.main-content -->