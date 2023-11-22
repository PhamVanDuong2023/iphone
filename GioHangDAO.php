<?php
    // include "http://localhost/duanmau/model/DAO/pdo.php";
    // $absolute_path = $_SERVER['DOCUMENT_ROOT'] . "/duanmau";
    // include $absolute_path."/model/DAO/pdo.php";
    function selectGioHang($sortName, $sortBy, $limit, $offset){

        $sql_sanpham = "SELECT * FROM sanpham AS s INNER JOIN giohang AS g ON s.sanpham_id = g.sanpham_id INNER JOIN nguoidung AS n ON g.nguoidung_id = n.nguoidung_id   ";
        
        if($sortName != null and $sortBy != null){
            $sql_sanpham .= " ORDER BY {$sortName} {$sortBy}";
        }
        if($offset >=0 and $limit >=0){
            $sql_sanpham .= " LIMIT {$limit} OFFSET {$offset}";
        }
        
        $list = query($sql_sanpham);
        return $list;
    }

    function insertGioHang($nguoidung_id, $sanpham_id, $soluong){
        $sql = "INSERT INTO giohang(nguoidung_id ,sanpham_id , soluongsanpham) values ({$nguoidung_id} , {$sanpham_id} , {$soluong})";
        execute($sql);
    }

    function deleteGioHang($param){
        $sql = "DELETE FROM giohang WHERE giohang_id = {$param}";
        execute($sql);
    }

    function deleteGioHangById($param){
        $sql = "DELETE FROM giohang WHERE nguoidung_id = {$param}";
        execute($sql);
    }
    function deleteGioHangBySanPham($param){
        $sql = "DELETE FROM giohang WHERE sanpham_id = {$param}";
        execute($sql);
    }

    // function updateSanPham( $id, $tensanpham, $giasanpham, $hinhanh, $motangan, $mota, $soluong, $luotxem , $danhmuc){
    //     $sql = "UPDATE sanpham SET tensanpham = '{$tensanpham}' ,giasanpham = {$giasanpham}, hinhanh = '{$hinhanh}', motangan = '{$motangan}', mota = '{$mota}', soluong = {$soluong} , luotxem = {$luotxem} , danhmuc_id = {$danhmuc}  WHERE sanpham_id = {$id}";
    //     execute($sql);
    // }

    // function findOneSanPham($param){
    //     $sql_sanpham = "SELECT * FROM sanpham WHERE sanpham_id = {$param}";
    //     $list = query($sql_sanpham);
    //     return $list[0];
    // }

    function countGioHang(){
        $sql = "SELECT * FROM sanpham AS s INNER JOIN giohang AS g ON s.sanpham_id = g.sanpham_id INNER JOIN nguoidung AS n ON g.nguoidung_id = n.nguoidung_id   ";
        
        return sizeof(getCount($sql));
    }
    function countGioHangByNguoiDung($nguoidung_id){
        $sql = "SELECT * FROM sanpham AS s INNER JOIN giohang AS g ON s.sanpham_id = g.sanpham_id INNER JOIN nguoidung AS n ON g.nguoidung_id = n.nguoidung_id   WHERE n.nguoidung_id = {$nguoidung_id} ";
        
        return sizeof(getCount($sql));
    }

    // function countSanPhamBySearch($search){
    //     $sql = "SELECT * FROM sanpham AS s INNER JOIN danhmuc AS d ON s.danhmuc_id = d.danhmuc_id WHERE s.motangan like '%{$search}%'";
        
    //     return sizeof(getCount($sql));
    // }

    function findByNguoiDung($sortName, $sortBy, $limit, $offset,$nguoidung_id){
    $sql_giohang = "SELECT * FROM sanpham AS s INNER JOIN giohang AS g ON s.sanpham_id = g.sanpham_id INNER JOIN nguoidung AS n ON g.nguoidung_id = n.nguoidung_id   WHERE n.nguoidung_id = {$nguoidung_id} ";
            
            if($sortName != null and $sortBy != null){
                $sql_giohang .= " ORDER BY g.{$sortName} {$sortBy}";
            }
            if($offset >=0 and $limit >=0){
                $sql_giohang .= " LIMIT {$limit} OFFSET {$offset}";
            }
            $list = query($sql_giohang);
            return $list;
    }
    // function findBySearch($search,$sortName,$sortBy,$offset,$limit){
    //     $sql_sanpham = "SELECT * FROM sanpham AS s INNER JOIN danhmuc AS d ON s.danhmuc_id = d.danhmuc_id  WHERE s.motangan like '%{$search}%' ";
                
    //             if($sortName != null and $sortBy != null){
    //                 $sql_sanpham .= " ORDER BY {$sortName} {$sortBy}";
    //             }
    //             if($offset >=0 and $limit >=0){
    //                 $sql_sanpham .= " LIMIT {$limit} OFFSET {$offset}";
    //             }
    //             $list = query($sql_sanpham);
    //             return $list;
    //     }
?>