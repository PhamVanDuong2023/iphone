<?php  
include_once "pdo.php";
function insert_taikhoan($user,$pass,$email){
    $sql="INSERT INTO taikhoan (user,pass,email) VALUES ('$user','$pass','$email')";
    pdo_execute($sql);
}
function insert_taikhoan_admin($user,$pass,$email,$role){
    $sql="INSERT INTO taikhoan (user,pass,email,role) VALUES ('$user','$pass','$email','$role')";
    pdo_execute($sql);
}

function getuserinfo($user,$pass){
    $sql="select * from taikhoan where user='".$user."' AND pass='".$pass."'";
    $user=pdo_query_one($sql);
    return $user;
}
function getadmininfo($role){
    $sql="select * from taikhoan where role='".$role."'";
    $user=pdo_query_one($sql);
    return $user;
}
function getadmininfo1($id,$role){
    $sql="select * from taikhoan where  id='".$id."' AND role='".$role."'";
    $user=pdo_query_one($sql);
    return $user;
}
function getuserinfo1($id){
    $sql="select * from taikhoan where id='".$id."'";
    $user=pdo_query_one($sql);
    return $user;
}

function update_info($id,$user,$pass,$email,$address,$tel){
    $sql="UPDATE taikhoan set user='".$user."', pass='".$pass."', email='".$email."', address='".$address."', tel='".$tel."' where id=".$id;
    pdo_execute($sql);
}

function checkemail($user,$email){
    $sql="select * from taikhoan where user='".$user."' AND email='".$email."'";
    $user=pdo_query_one($sql);
    return $user;
}
function kh_get_all(){
    $sql="select * from taikhoan where role=0";
    return pdo_query($sql);
}

function tk_get_all(){
    $sql="select * from taikhoan where role=1 OR role=2";
    return pdo_query($sql);
}
function delete_kh($id){
    $sql="delete from taikhoan where id=".$id;
    pdo_query($sql);
}
?>