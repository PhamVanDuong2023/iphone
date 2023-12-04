<?php
    // include "http://localhost/duanmau/model/DAO/pdo.php";
    // $absolute_path = $_SERVER['DOCUMENT_ROOT'] . "/duanmau";
    // include $absolute_path."/model/DAO/pdo.php";
    function selectChiTietDonHang($sortName, $sortBy, $limit, $offset){

        $sql_donHang = "SELECT * FROM sanpham AS s INNER JOIN chitietdonhang AS c ON s.sanpham_id = c.sanpham_id INNER JOIN donhang AS d ON c.donhang_id = d.donhang_id  inner join nguoidung AS n ON d.nguoidung_id = n.nguoidung_id INNER JOIN giohang AS g ON n.nguoidung_id = g.nguoidung_id ";
        
        if($sortName != null and $sortBy != null){
            $sql_donHang .= " ORDER BY c.{$sortName} {$sortBy}";
        }
        if($offset >=0 and $limit >=0){
            $sql_donHang .= " LIMIT {$limit} OFFSET {$offset}";
        }
        
        $list = query($sql_donHang);
        return $list;
    }

    function selectChiTiet($sortName, $sortBy, $limit, $offset){

        $sql_donHang = "SELECT * FROM sanpham AS s INNER JOIN chitietdonhang AS c ON s.sanpham_id = c.sanpham_id INNER JOIN donhang AS d ON c.donhang_id = d.donhang_id  inner join nguoidung AS n ON d.nguoidung_id = n.nguoidung_id ";
        
        if($sortName != null and $sortBy != null){
            $sql_donHang .= " ORDER BY c.{$sortName} {$sortBy}";
        }
        if($offset >=0 and $limit >=0){
            $sql_donHang .= " LIMIT {$limit} OFFSET {$offset}";
        }
        
        $list = query($sql_donHang);
        return $list;
    }

    function selectChiTietDonHangByNguoiDUng($id){

        $sql_donHang = "SELECT * FROM sanpham AS s INNER JOIN chitietdonhang AS c ON s.sanpham_id = c.sanpham_id INNER JOIN donhang AS d ON c.donhang_id = d.donhang_id  inner join nguoidung AS n ON d.nguoidung_id = n.nguoidung_id WHERE n.nguoidung_id = {$id} ";
        
        
        
        $list = query($sql_donHang);
        return $list;
    }

    function selectChiTietDonHangBySanPham($id){

        $sql_donHang = "SELECT chitietdonhang_id FROM sanpham AS s INNER JOIN chitietdonhang AS c ON s.sanpham_id = c.sanpham_id INNER JOIN donhang AS d ON c.donhang_id = d.donhang_id  inner join nguoidung AS n ON d.nguoidung_id = n.nguoidung_id WHERE s.sanpham = {$id} ";
        
        
        
        $list = query($sql_donHang);
        return $list;
    }


    function insertChiTietDonHang($donhang_id, $sanpham_id){
        $sql = "INSERT INTO chitietdonhang(donhang_id, sanpham_id) values ({$donhang_id},{$sanpham_id})";
        return execute($sql);
    }

    function deleteChiTietDonHangByDonHang($param){
        $sql = "DELETE FROM chitietdonhang WHERE donhang_id = {$param}";
        execute($sql);
    }
    function deleteChiTietDonHang($param){
        $sql = "DELETE FROM chitietdonhang WHERE chitietdonhang_id = {$param}";
        execute($sql);
    }

    

    // function findOneSanPham($param){
    //     $sql_sanpham = "SELECT * FROM sanpham WHERE sanpham_id = {$param}";
    //     $list = query($sql_sanpham);
    //     return $list[0];
    // }

    function countChiTietDonHang(){
        $sql = "SELECT * FROM sanpham AS s INNER JOIN chitietdonhang AS c ON s.sanpham_id = c.sanpham_id INNER JOIN donhang AS d ON c.donhang_id = d.donhang_id   ";
        
        return sizeof(getCount($sql));
    }
    // function countSanPhamByDanhGia($sanpham_id){
    //     $sql = "SELECT * FROM sanpham AS s INNER JOIN danhgia AS d ON s.sanpham_id = d.sanpham_id INNER JOIN nguoidung AS n ON d.nguoidung_id = n.nguoidung_id WHERE s.sanpham_id = {$sanpham_id}  ";
        
    //     return sizeof(getCount($sql));
    // }

    // function countSanPhamBySearch($search){
    //     $sql = "SELECT * FROM sanpham AS s INNER JOIN danhmuc AS d ON s.danhmuc_id = d.danhmuc_id WHERE s.motangan like '%{$search}%'";
        
    //     return sizeof(getCount($sql));
    // }

    // function findByDanhMuc($sortName, $sortBy, $limit, $offset,$danhmuc_id){
    // $sql_sanpham = "SELECT * FROM sanpham AS s INNER JOIN danhmuc AS d ON s.danhmuc_id = d.danhmuc_id  WHERE d.danhmuc_id = {$danhmuc_id} ";
            
    //         if($sortName != null and $sortBy != null){
    //             $sql_sanpham .= " ORDER BY {$sortName} {$sortBy}";
    //         }
    //         if($offset >=0 and $limit >=0){
    //             $sql_sanpham .= " LIMIT {$limit} OFFSET {$offset}";
    //         }
    //         $list = query($sql_sanpham);
    //         return $list;
    // }
    // function findBySanPham($sanpham_id,$sortName,$sortBy,$limit,$offset){
    //     $sql_danhgia = "SELECT * FROM sanpham AS s INNER JOIN danhgia AS d ON s.sanpham_id = d.sanpham_id INNER JOIN nguoidung AS n ON d.nguoidung_id = n.nguoidung_id WHERE s.sanpham_id = {$sanpham_id}  ";
                
    //             if($sortName != null and $sortBy != null){
    //                 $sql_danhgia .= " ORDER BY d.{$sortName} {$sortBy}";
    //             }
    //             if($offset >=0 and $limit >=0){
    //                 $sql_danhgia .= " LIMIT {$limit} OFFSET {$offset}";
    //             }
    //             $list = query($sql_danhgia);
    //             return $list;
    //     }
?>