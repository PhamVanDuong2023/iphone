<?php  
include_once "pdo.php";
function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
    $sql="INSERT INTO binhluan (noidung,iduser,idpro,ngaybinhluan) VALUES ('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}

function loadAll_bl($idpro){
    $sql="select * from binhluan where idpro='".$idpro."'order by id desc ";
    return pdo_query($sql);
}
function loadall_bl_admin(){
    $sql="select * from binhluan order by id desc ";
    return pdo_query($sql);
}

function delete_bl($id){
    $sql="delete from binhluan where id=".$id;
    pdo_query($sql);
}



?>