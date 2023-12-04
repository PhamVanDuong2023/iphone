<div class="main-content">
    <form action="/duanmau/controller/admin/admin.php?" id="formSubmit" method="get">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="/duanmau/controller/admin/admin.php?action=donhang">Trang đơn hàng</a>
                    </li>
                </ul><!-- /.breadcrumb -->
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>Trang quản lí đơn hàng</h1>
                    </div>
                </div>
            </div>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th scope="col">ID Người dùng</th>
                        <th scope="col">Tên nguòi dùng</th>
                        <th scope="col">Nơi nhận hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Hình thức thanh toán</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh sản phầm</th>
                        <th scope="col">Số luọng mua</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Thao tắc</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($listDonHang as $donHang) {
                    ?>

                        <tr>
                            <th scope="row"><?php echo $donHang["nguoidung_id"] ?></th>
                            <td><?php echo $donHang["hovaten"] ?></td>
                            <td><?php echo $donHang["diachinhanhang"] ?></td>
                            <td><?php echo $donHang["sodienthoai"] ?></td>
                            <td><?php echo $donHang["phuongthucthanhtoan"] ?></td>
                            <td><?php echo $donHang["tensanpham"] ?></td>
                            <td><img src="/duanmau/template/admin/assets/img/<?php echo $donHang["hinhanh"] ?>" alt="" style="width: 100px; height:auto"></td>
                            
                            
                            
                            <td><?php echo $donHang["sanphamtrongdon"] ?></td>
                            <td><?php echo $donHang["tongtien"] ?></td>
                            <td>
                                <a  class="exec" href="/duanmau/controller/admin/chitietdonhang/delete.php?donhang_id=<?php echo $donHang["donhang_id"] ?>">Xóa</a>
                                <?php
                                if($donHang["trangthaithanhtoan"] == 0){

                                
                                ?> 
                                    <a  class="exec" href="/duanmau/controller/admin/donhang/updatestatus.php?donhang_id=<?php echo $donHang["donhang_id"] ?>&&status=1">Xác nhận</a>
                                <?php 
                                    }else if($donHang["trangthaithanhtoan"] == 1){
                                ?>
                                    <p class="exec">Đã xác nhận</p>
                                <?php 
                                    } else if($donHang["trangthaithanhtoan"] == 2){
                                ?>
                                    <p class="exec">Đã nhận được hàng</p>

                                <?php
                                    }
                                ?>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
<!-- //sua update -->
                </tbody>
            </table>

            <ul class="pagination" id="pagination"></ul>
            <input type="hidden" value="" id="page" name="page" />
            <input type="hidden" value="" id="maxPageItem" name="maxPageItem" />
            <input type="hidden" value="" id="sortName" name="sortName" />
            <input type="hidden" value="" id="sortBy" name="sortBy" />
            <input type="hidden" value="donhang" id="action" name="action" />
            <!-- <div class="row">
                <div class="col">
                    <a class="danhsachdanhmuc" href="/duanmau/controller/admin/admin.php?action=sanpham">Trở về</a>
                </div>

            </div> -->
        </div>
    </form>
    

    <script>
        var totalPage = <?php echo $totalPage ?>;
        var currentPage = <?php echo $page ?>;
        var limit = 4;
        $(function() {
            window.pagObj = $('#pagination').twbsPagination({
                totalPages: totalPage, // so luong page
                visiblePages: 5, // so nut hien tren màn hinh
                startPage: currentPage, // page bat dau
                onPageClick: function(event, page) {
                    if (currentPage != page) {
                        $('#maxPageItem').val(parseInt(limit));
                        $('#page').val(page);
                        $('#sortName').val('donhang_id');
					    $('#sortBy').val('asc');
                        $('#formSubmit').submit();
                    }
                }
            }).on('page', function(event, page) {
                console.info(page + ' (from event listening)');
            });
        });
    </script>

</div><!-- /.main-content -->