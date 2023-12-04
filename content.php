


<section class="noidung">
            <div class="nd-left">
                <h3>Sản phẩm mới</h3>
                <div class="sanpham">
                        <div class="sp">

                        <?php
                        
                        foreach($listSp as $item){
                            extract($item);
                            
                            $link_sp="index.php?act=chitiet&id=".$id;
                            echo ' <div class="sp-item">
                                    <img src="../images/'.$img.'" alt="" id="anh">
                                    <p><a href="">'.$name.'</a></p>
                                    <p>'.$price.'</p>
                                    <div class="title">
                                        <form action="index.php?act=giohang" method="post">
                                            <input type="hidden" name="id" value="'.$id.'">
                                            <input type="hidden" name="name" value="'.$name.'">
                                            <input type="hidden" name="img" value="'.$img.'">
                                            <input type="hidden" name="price" value="'.$price.'">
                                            <a href=""><input type="submit" value="Thêm vào giỏ hàng" class="gh" name="themvaogh"></a>
                                            <button><a href="'.$link_sp.'">Xem thêm</a></button>
                                        </form>    
                                    </div>
                                   
                                </div>';
                        }
                        
                        
                        ?>  
                        </div>
                        <button type="submit"><a href="#">Xem thêm</a></button>
                    </div>
            </div>

            