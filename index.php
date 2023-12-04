<?php
session_start();
ob_start();
include "../model/sanpham.php";
include "../model/danhmuc.php";
include "../model/taikhoan.php";
include "header.php";
if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];
$listSp=sanpham_get_all();
$listDm=loadAll_danhmuc();
$top10=top10sp();
if(isset($_GET['act'])&&$_GET['act']!=""){
    $act=$_GET['act'];
    switch($act){
        case "chitiet":
            if(isset($_GET['id']) && $_GET['id']>0){
                $onesp=loadOne_sanpham($_GET['id']);
                extract($onesp);
                $sp_cungloai=load_sp_cungloai($_GET['id'],$iddm);
                include "chitietsp/index.php";
                include "box-right.php";
            }else{
                include "content.php";
                include "box-right.php";
            }
            
            break;
        case "sanpham":
            if(isset($_GET['iddm']) && $_GET['iddm']>0){
                $iddm=$_GET['iddm'];
                
                $dssp=load_sp_theodm($iddm);
                $dm=loadOne_danhmuc($iddm);
                include "sp_theodm/index.php";
                include "box-right.php";
            }else{
                include "content.php";
                include "box-right.php";
            }
            
            break;
        case "timkiem":
            if(isset($_POST['kyw'])&&$_POST['kyw']!=""){
                $kyw=$_POST['kyw'];
                $dssp=load_sp_timkiem($kyw);
                include "tim_kiem_sp/index.php";
                include "box-right.php";
            }else{
                include "content.php";
                include "box-right.php";
            }
            
            break;
        case "signin":
            if(isset($_POST['dangky']) && ($_POST['dangky'])){
                if($_POST['user']!=""&& $_POST['pass']!=""&&$_POST['email']!=""){
                    $user=$_POST['user'];
                    $email=$_POST['email'];
                    $pass=$_POST['pass'];
                    insert_taikhoan($user,$pass,$email);
                    $thongbao="Đăng ký thành công.Vui lòng đăng nhập để mua hàng và bình luận!!";
                }else{
                    $thongbao="Vui lòng nhập thông tin!!";
                }
            }
            include "sign-in/sign-in.php";
            break;
        case "login":
            if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])){
                if($_POST['user']!=""&& $_POST['pass']!=""){
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $checkuser=getuserinfo($user,$pass);
                    // echo '<pre>';
                    // print_r($checkuser);
                    // echo '</pre>';
                    // var_dump($checkuser);
                    if(is_array($checkuser)){
                        $role=$checkuser['role'];
                        $id=$checkuser['id'];
                        $checkadmin=getadmininfo1($id,$role);
                        // echo '<pre>';
                        // print_r($checkadmin);
                        // echo '</pre>';
                        // var_dump($checkadmin);
                        if($role==1||$role==2){
                            $_SESSION['role']=$role;
                            $_SESSION['user']=$checkadmin['user'];
                            $_SESSION['iduser']=$checkadmin['id'];
                           
                            
                            header('location: ../admin/index.php');
                            break;
                        }
                        else{
                            $_SESSION['role']=$role;
                            $_SESSION['user']=$checkuser['user'];
                            $_SESSION['iduser']=$checkuser['id'];
                            header('location: index.php');
                            break;
                        }
                    }
                
                }
                if($_POST['user']==""&& $_POST['pass']==""){
                    $thongbao="Vui lòng nhập thông tin!!";
                    include "login/login.php";
                }
                else{
                    $thongbao="tài khoản không tồn tại. Vui lòng kiểm tra lại";
                    include "login/login.php";
                }
                
                }else{
                    include "login/login.php";
                }
                break;
        case "userinfo":
            if(isset($_GET['idinfo'])&& $_GET['idinfo']){
                $idinfo=$_GET['idinfo'];
                $info=getuserinfo1($idinfo);
                include "login/userinfo.php";
                include "box-right.php";
            }
            break;
        case "edit_taikhoan":
                if(isset($_GET['idtk'])&&$_GET['idtk']){
                    $idtk=$_GET['idtk'];
                    $user_edit=getuserinfo1($idtk);
                    
                    include "login/update_tk.php";
                }
                
                break;
        case "update_taikhoan":
                if(isset($_POST['update'])&& $_POST['update']){
                    $id=$_POST['id'];
                    $user=$_POST['user'];
                    $email=$_POST['email'];
                    $pass=$_POST['pass'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    update_info($id,$user,$pass,$email,$address,$tel);
                    header("location: index.php?act=userinfo&idinfo=".$id);
                    
                }
            
            break;

        case "giohang":
             if(isset($_SESSION['iduser']) && $_SESSION['iduser']){
                if(isset($_POST['themvaogh'])&& ($_POST['themvaogh'])){
                    $id=$_POST['id'];
                    $name=$_POST['name'];
                    $img=$_POST['img'];
                    $price=$_POST['price'];
                    $soluong=1;
                    $ttien=$soluong*$price;
                    $spadd=[$id,$name,$img,$price,$soluong,$ttien];
                    array_push( $_SESSION['mycart'],$spadd);
                   
                 }
             }else{
                $thongbao="Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!!";
             }
            
            include "giohang/index.php";
            include "box-right.php";
            break;
        case "delcart":
            if(isset($_GET['idcart'])){
                $id = $_GET['idcart'];
                echo $id;
                
                unset($_SESSION['mycart'][$id]);
                
            }else{
                $_SESSION['mycart']=[];
            }
            header("location: index.php?act=giohang");
            break;
        case "quenmk":
            if(isset($_POST['laymk'])&&$_POST['laymk']){
                $email=$_POST['email'];
                $user=$_POST['user'];
                $quenmk=checkemail($user,$email);
                if(is_array($quenmk)){
                    $thongbao="Mật khẩu của bạn là:".$quenmk['pass'];
                }else{
                    $thongbao="Sai thông tin email hoặc tên đăng nhập!!!";
                }
            }
            include "login/quenmk.php";
            break;
       
        case "thoat":
            if(isset($_SESSION['iduser'])&& $_SESSION['iduser']){
                unset($_SESSION['iduser']);
            }
            header("location: index.php");
            break;
        default: 
            include "content.php";
            include "box-right.php";
    }
}else{
    include "content.php";
    include "box-right.php";
}
include "footer.php"



?>


