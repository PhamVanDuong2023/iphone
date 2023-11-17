
<?php  
include "../../model/binhluan.php";
include "../../model/taikhoan.php";
session_start();
$idpro=$_REQUEST['idpro'];

$dsbl=loadAll_bl($idpro);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style-user.css">
   
    <style>
        .box-content1 table{
            width: 100%;
            margin-left: 20px;
        }
        .box-content1 table td:nth-child(1){
            width: 50%;
        }
        .box-content1 table td:nth-child(2){
            width: 20%;
        }
        .box-content1 table td:nth-child(3){
            width: 30%;
        }
        .bl{
            width: 700px;
            height: 30px;

        }
        .ip_bl{
            height: 30px;
            background-color: red;
            color: white;
        }
        .ip_bl{
            background-color: rgb(229, 113, 113);
        }
    </style>
</head>
<body>
    



<div class="box">
        <div class="box-title" style="margin-right: 20px; margin-top: 10px;">BÌNH LUẬN</div>
       

        <div class="box-content1">
                    <table>
                        <?php
                        foreach($dsbl as $bl){
                            extract($bl);
                            $user=getuserinfo1($iduser);
                            echo ' <tr>
                                        <td>'.$noidung.'</td>
                                        <td>'.$user['user'].'</td>
                                        <td>'.$ngaybinhluan.'</td>
                                    </tr>';
                        }
                        
                        
                        
                        ?>
                    </table>
                    
                </div>
                <?php   
                    if(isset($_SESSION['iduser'])&& $_SESSION['iduser']){
                ?>
                <div class="box-search">
                    <form action="<?=$_SERVER['PHP_SELF'] ;?>" method="POST">
                        <input type="hidden" name="idpro" value="<?=$idpro?>">
                        
                        <input type="text" name="noidung"  class="bl">
                        <input type="submit" name="guibinhluan" value="Gửi bình luận" class="ip_bl">
                    </form>
                </div>

                <?php  
                if(isset($_POST['guibinhluan'])&& $_POST['guibinhluan']){
                    $idpro=$_POST['idpro'];
                    $iduser=$_SESSION['iduser'];
                    $noidung=$_POST['noidung'];
                    $ngaybinhluan=date('d/m/Y');
                    insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan);
                    header("location: ".$_SERVER['HTTP_REFERER']);
                }
                
                
                
                ?>
        <?php }else{
            echo "Vui lòng đăng nhập để bình luận!!";
        }
        ?>
    </div>
    

</body>
</html>