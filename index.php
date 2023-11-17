<section class="noidung">
            <div class="nd-left">
                <div class="box">
                    <div class="box-title" style="margin-right: 20px; margin-top: 10px;">
                        CHI TIẾT SẢN PHẨM
                    </div>
                    <div class="box-content1">
                        <?php 
                        extract($onesp);
                        ?>
                        <h1 style="color: red; text-align:center"><?=$name?></h1>
                    </div>
                    <div class="box-content1">
                        <?php 
                        extract($onesp);
                        echo '<img src="../images/'.$img.'" alt="" width="820px" height="700px">';
                        ?>
                       <div style=" color: red;">
                        <h2>Giá:</h2>
                            <?php
                            echo $price;
                            ?>
                       </div>
                        <h2>Mô tả</h2>
                        <?php
                        echo $mota;
                        ?>
                        <div class="title1">
                            <form action="index.php?act=giohang" method="post">
                                <input type="hidden" name="id" value="<?=$id?>">
                                <input type="hidden" name="name" value="<?=$name?>">
                                <input type="hidden" name="img" value="<?=$img?>">
                                <input type="hidden" name="price" value="<?=$price?>">
                                <a href=""><input type="submit" value="Thêm vào giỏ hàng" class="gh1" name="themvaogh"></a>
                                <button><a href="">Mua ngay</a></button>
                            </form>    
                        </div>
                        
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                            $("#binhluan").load("chitietsp/binhluanform.php", {idpro: <?=$id?>});
                    });
                </script>
                <div class="box" id="binhluan" >
                    
                </div>
                <div class="box">
                    <div class="box-title" style="margin-right: 20px; margin-top: 10px;">SẢN PHẨM CÙNG LOẠI</div>
                    <div class="box-content1">
                        <div class="sp">
                            
                                <?php
                                foreach ($sp_cungloai as $spcl){
                                    extract($spcl);
                                    $link_sp="index.php?act=chitiet&id=".$id;
                                    echo '<div class="sp-item">
                                    <img src="../images/'.$img.'" alt="" id="anh">
                                    <p><a href="'.$link_sp.'">'.$name.'</a></p>
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
                        </div>
                    </div>
                  </div>
            
            
            