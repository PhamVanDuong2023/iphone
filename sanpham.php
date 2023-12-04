<?php
include_once "pdo.php";

function sanpham_get_all(){
    $sql="select * from sanpham order by id desc limit 0,9";
    return pdo_query($sql);
}
function sanpham_get_all_admin(){
    $sql="select * from sanpham order by id desc";
    return pdo_query($sql);
}

function insert_sanpham($ten_sp,$don_gia,$hinh_anh,$mo_ta,$id_dm){
    $sql="INSERT INTO sanpham (name,price,img,mota,iddm) VALUES ('$ten_sp','$don_gia','$hinh_anh','$mo_ta','$id_dm')";
    pdo_execute($sql);
}
function delete_sp($id){
    $sql="delete from sanpham where id=".$id;
    pdo_query($sql);
}

function loadOne_sanpham($id){
    $sql="select * from sanpham where id=".$id;
    $sp=pdo_query_one($sql);
    return $sp;
}
function load_sp_cungloai($id,$iddm){
    $sql="select * from sanpham where iddm=".$iddm." AND id <> ".$id;
    $sp_cungloai=pdo_query($sql);
    return $sp_cungloai;
}
function load_sp_theodm($iddm){
   $sql= "select * from sanpham where iddm=".$iddm;
   $listsanpham=pdo_query($sql);
   return $listsanpham;
}
function update_sanpham($id,$ten_sp,$don_gia,$hinh_anh,$mo_ta,$id_dm){
    if($hinh_anh!=""){
        $sql="UPDATE sanpham set name='".$ten_sp."',price='".$don_gia."',img='".$hinh_anh."',mota='".$mo_ta."',iddm='".$id_dm."' where id=".$id;
    }else{
        $sql="UPDATE sanpham set name='".$ten_sp."',price='".$don_gia."',mota='".$mo_ta."',iddm='".$id_dm."' where id=".$id;
    }
    pdo_execute($sql);
}
function top10sp(){
    $sql= "select * from sanpham where 1 order by luotxem desc limit 0,10";
    $listSp=pdo_query($sql);
    return $listSp;
}
function load_sp_timkiem($kyw){
    $sql= "select * from sanpham where name like '%".$kyw."%'";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}



function loadall_sp_admin(){
    $sql= "select danhmuc.id as iddm,danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice
    from sanpham join danhmuc
    on sanpham.iddm=danhmuc.id
    group by danhmuc.id
    order by danhmuc.id desc ";
    $dstk=pdo_query($sql);
    return $dstk;
}
?>