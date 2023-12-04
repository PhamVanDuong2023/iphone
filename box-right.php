<div class="nd-right">
            <div class="row">
                <div class="box-title">DANH MỤC</div>
                <div class="box-content">
                        <ul>
                           <?php  
                           foreach($listDm as $dm){
                              extract($dm);
                              $linkdm="index.php?act=sanpham&iddm=".$id;
                              echo '<li>
                                    <a href="'.$linkdm.'">'.$name.'</a>
                              
                                </li>';
                              }?>
                        </ul>
                </div>
                <div class="box-footer">
                   <form action="index.php?act=timkiem" method="post" >
                        <input type="text" placeholder="tìm kiếm tại đây" name="kyw">
                        <button type="submit">Tìm</button>
                   </form>
                </div>
            </div>
            <div class="row" style="margin-top: 83px;">
                <div class="box-title">TOP 10 SẢN PHẨM ĐƯỢC YÊU THÍCH NHẤT</div>
                <div class="box-content">
                  <?php
                  foreach ($top10 as $sp){
                     extract($sp);
                     $linksp="index.php?act=chitiet&id=".$id;
                     echo '<div class="top10-item">
                        <a href="'.$linksp.'"><img src="../images/'.$img.'" alt=""></a>
                        <a href="'.$linksp.'" style="margin-top: 40px;">'.$name.'</a>
                     </div>';
                  }
                  ?>    
                </div>
            </div>
        </div>
        </section>