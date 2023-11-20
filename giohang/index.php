
<section class="noidung">
            <div class="nd-left">
                
                <h3>Giỏ hàng</h3>
                <div class="sanpham">
                <table border="1" class="table table-bordered" >
                    <thead>
                        <th>STT</th>
                        <th>Tên sp</th>
                        <th>Hình ảnh</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Thao tác</th>
                    </thead>

                    <tbody>
                        
                        <?php
                           if(isset($_SESSION['iduser'])&& $_SESSION['iduser']){
                            $stt=1;
                            $tong=0;
                            $i=0;
                            foreach ($_SESSION['mycart'] as $cart){
                                $hinh="../images/".$cart[2];
                               
                                $ttien=$cart[3]*$cart[4];
                                $tong+=$ttien;
                                $xoasp='<a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xoá"></a>';
                                echo '<tr>
                                        <td>'.$stt++.'</td>
                                        <td>'.$cart[1].'</td>
                                        <td><img src="'.$hinh.'" width="150" height="100"></td>
                                        <td>'.$cart[3].'</td>
                                        <td>'.$cart[4].'</td>
                                        <td>'.$ttien.'</td>
                                        <td>'.$xoasp.'</td>
                                    </tr>';
                                    $i+=1;
                            }
                            echo '<tr>
                                    <td colspan="4">Tổng đơn hàng</td>
                                    <td>'.$tong.'</td>
                                    
                                </tr>';
                           }
                        ?>
                    </tbody>
                </table>
                <div style="color: red; font-size: 40px;">
                    <?php  
                        if(isset($thongbao)&& ($thongbao!="")){
                            echo $thongbao;
                        }else{
                            echo "";
                        }
                    
                    ?>
                </div>

                    </div>
            </div>