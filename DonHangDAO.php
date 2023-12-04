<?php
    // include "http://localhost/duanmau/model/DAO/pdo.php";
    // $absolute_path = $_SERVER['DOCUMENT_ROOT'] . "/duanmau";
    // include $absolute_path."/model/DAO/pdo.php";
    // function selectNguoiDung(){
    //     $sql_nguoidung = "SELECT * FROM nguoidung AS n INNER JOIN role AS r ON n.role_id = r.role_id ";
    //     $list = query($sql_nguoidung);
    //     return $list;
    // }

    function insertDonHang($phuongthucthanhtoan,$soluong,$tongtien,$time,$trangthaithanhtoan,$nguoidung_id){
        $sql = "INSERT INTO donhang(phuongthucthanhtoan,sanphamtrongdon,tongtien,thoigiandathang,trangthaithanhtoan,nguoidung_id) values ('{$phuongthucthanhtoan}',{$soluong},{$tongtien},'{$time}',{$trangthaithanhtoan},{$nguoidung_id})";
        $id = inserted_id($sql);
        return $id;
        
    }

    // function selectId(){
    //     $sql = "SELECT * FROM donhang WHERE donhang_id = LAST_INSERT_ID()";
    //     $id = query($sql);
    //     return $id;
    // }

    function deleteDonHangByNguoiDung($param){
        $sql = "DELETE FROM donhang WHERE nguoidung_id = {$param}";
        execute($sql);
    }

    function deleteDonHang($param){
        $sql = "DELETE FROM donhang WHERE donhang_id = {$param}";
        execute($sql);
    }
    function updateOderStatus( $id,$status){
        $sql = "UPDATE donhang SET trangthaithanhtoan = {$status}  WHERE donhang_id = {$id}";
        execute($sql);
    }
    // function updateNguoiDung($id,$hovaten,$email,$diachinhanhang,$diachithanhtoan,$sodienthoai,$ngaysinh,$tendangnhap,$matkhau,$trangthaithanhtoan,$role_id){
    //     $sql = "UPDATE nguoidung SET hovaten = '{$hovaten}',email = '{$email}',diachinhanhang = '{$diachinhanhang}',diachithanhtoan = '{$diachithanhtoan}',sodienthoai = '{$sodienthoai}',ngaysinh = '{$ngaysinh}',tendangnhap = '{$tendangnhap}',matkhau = '{$matkhau}',trangthaithanhtoan = {$trangthaithanhtoan},role_id = {$role_id} WHERE nguoidung_id = {$id}";
    //     execute($sql);
    // }

    // function thayDoiThongTin($id,$hovaten,$email,$diachinhanhang,$diachithanhtoan,$sodienthoai,$ngaysinh){
    //     $sql = "UPDATE nguoidung SET hovaten = '{$hovaten}',email = '{$email}',diachinhanhang = '{$diachinhanhang}',diachithanhtoan = '{$diachithanhtoan}',sodienthoai = '{$sodienthoai}',ngaysinh = '{$ngaysinh}'WHERE nguoidung_id = {$id}";
    //     execute($sql);
    // }

    // function updatePassWord($id,$matkhau){
    //     $sql = "UPDATE nguoidung SET  matkhau = '{$matkhau}' WHERE nguoidung_id = {$id}";
    //     execute($sql);
    // }

    // function findOneNguoiDung($param){
    //     $sql_nguoidung = "SELECT * FROM nguoidung WHERE nguoidung_id = {$param}";
    //     $list = query($sql_nguoidung);
    //     return $list[0];
    // }
    // function checkUsernameOrPassword($tenDangNhap,$matKhau){
    //     $sql_nguoidung = "SELECT * FROM nguoidung AS n INNER JOIN role AS r ON n.role_id = r.role_id WHERE n.tendangnhap = '{$tenDangNhap}' and n.matkhau = '{$matKhau}'";
    //     $list = query($sql_nguoidung);
    //     return $list == null ? null : $list[0];
    // }
    // function checkUsername($tenDangNhap){
    //     $sql_nguoidung = "SELECT * FROM nguoidung AS n INNER JOIN role AS r ON n.role_id = r.role_id WHERE n.tendangnhap = '{$tenDangNhap}'";
    //     $list = query($sql_nguoidung);
    //     return $list == null ? null : $list[0];
    // }
?>