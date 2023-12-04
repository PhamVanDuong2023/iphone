<div class="main-content">
    <form action="/duanmau/controller/admin/admin.php?" id="formSubmit" method="get">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="/duanmau/controller/admin/admin.php?action=sanpham">Trang đánh giá</a>
                    </li>
                </ul><!-- /.breadcrumb -->
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>Trang đánh giá</h1>
                    </div>
                </div>
            </div>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Mô tả ngắn</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Lượt xem</th>


                    </tr>
                </thead>
                <tbody>



                    <tr>
                        <th scope="row"><?php echo $sanphamupdate["sanpham_id"] ?></th>
                        <td><?php echo $sanphamupdate["tensanpham"] ?></td>
                        <td><?php echo $sanphamupdate["giasanpham"] ?></td>
                        <td><img src="/duanmau/template/admin/assets/img/<?php echo $sanphamupdate["hinhanh"] ?>" alt="" style="width: 100px; height:auto"></td>
                        <td><?php echo $sanphamupdate["motangan"] ?></td>
                        <td><?php echo $sanphamupdate["mota"] ?></td>
                        <td><?php echo $sanphamupdate["soluong"] ?></td>
                        <td><?php echo $sanphamupdate["luotxem"] ?></td>


                    </tr>

                    <!-- //sua update -->
                </tbody>
            </table>

            <h1>Các bình luận sản phẩm</h1>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Thời gian bình luận</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($listDanhGia as $danhGia) {

                    ?>
                        <tr>
                            <td><?php echo $danhGia['hovaten'] ?></td>
                            <td><?php echo $danhGia['ngayviet'] ?></td>
                            <td><?php echo $danhGia['noidung'] ?></td>
                            <td>
                                <a class="exec" href="/duanmau/controller/admin/danhgia/delete.php?id=<?php echo $danhGia["sanpham_id"] ?>&&danhgia_id=<?php echo $danhGia["danhgia_id"] ?>">Xóa</a>
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
            <input type="hidden" value="" id="sortName" name="sortNameDanhGia" />
            <input type="hidden" value="" id="sortBy" name="sortByDanhGia" />
            <input type="hidden" value="danhgia" id="action" name="action" />
            <div class="row">
                <div class="col">
                    <a class="danhsachdanhmuc" href="/duanmau/controller/admin/admin.php?action=sanpham">Trở về</a>
                </div>

            </div>
        </div>
    </form>


    <script>
        var totalPage = <?php echo $totalPage ?>;
        var currentPage = <?php echo $page ?>;
        var limit = 8;
        $(function() {
            window.pagObj = $('#pagination').twbsPagination({
                totalPages: totalPage, // so luong page
                visiblePages: 5, // so nut hien tren màn hinh
                startPage: currentPage, // page bat dau
                onPageClick: function(event, page) {
                    if (currentPage != page) {
                        $('#maxPageItem').val(parseInt(limit));
                        $('#page').val(page);
                        $('#sortName').val('ngayviet');
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