<?php 
    function selectDanhGia($sortName, $sortBy, $limit, $offset){

        $sql_sanpham = "SELECT * FROM sanpham AS s INNER JOIN danhgia AS d ON s.sanpham_id = d.sanpham_id INNER JOIN nguoidung AS n ON d.nguoidung_id = n.nguoidung_id   ";
        
        if($sortName != null and $sortBy != null){
            $sql_sanpham .= " ORDER BY {$sortName} {$sortBy}";
        }
        if($offset >=0 and $limit >=0){
            $sql_sanpham .= " LIMIT {$limit} OFFSET {$offset}";
        }
        
        $list = query($sql_sanpham);
        return $list;
    }

    function insertDanhGia($nguoidung_id, $sanpham_id, $noidung,$ngayviet){
        $sql = "INSERT INTO danhgia(nguoidung_id, sanpham_id, noidung, ngayviet) values ({$nguoidung_id},{$sanpham_id}, '{$noidung}', '{$ngayviet}')";
        execute($sql);
    }

    function deleteDanhGia($param){
        $sql = "DELETE FROM danhgia WHERE danhgia_id = {$param}";
        execute($sql);
    }

    function deleteDanhGiaByNguoiDung($param){
        $sql = "DELETE FROM danhgia WHERE nguoidung_id = {$param}";
        execute($sql);
    }

    function deleteDanhGiaBySanPham($param){
        $sql = "DELETE FROM danhgia WHERE danhgia_id = {$param}";
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

    // function countSanPham(){
    //     $sql = "SELECT * FROM sanpham AS s INNER JOIN danhgia AS d ON s.sanpham_id = d.sanpham_id INNER JOIN nguoidung AS n ON d.nguoidung_id = n.nguoidung_id   ";
        
    //     return sizeof(getCount($sql));
    // }
    function countSanPhamByDanhGia($sanpham_id){
        $sql = "SELECT * FROM sanpham AS s INNER JOIN danhgia AS d ON s.sanpham_id = d.sanpham_id INNER JOIN nguoidung AS n ON d.nguoidung_id = n.nguoidung_id WHERE s.sanpham_id = {$sanpham_id}  ";
        
        return sizeof(getCount($sql));
    }

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
    function findBySanPham($sanpham_id,$sortName,$sortBy,$limit,$offset){
        $sql_danhgia = "SELECT * FROM sanpham AS s INNER JOIN danhgia AS d ON s.sanpham_id = d.sanpham_id INNER JOIN nguoidung AS n ON d.nguoidung_id = n.nguoidung_id WHERE s.sanpham_id = {$sanpham_id}  ";
                
                if($sortName != null and $sortBy != null){
                    $sql_danhgia .= " ORDER BY d.{$sortName} {$sortBy}";
                }
                if($offset >=0 and $limit >=0){
                    $sql_danhgia .= " LIMIT {$limit} OFFSET {$offset}";
                }
                $list = query($sql_danhgia);
                return $list;
        }
?>