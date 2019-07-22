<!-- Single Product Section Start -->
<?php include 'header.php';
$urundetaysor = $db->prepare("SELECT * from stock s INNER JOIN product p on p.product_id=s.stock_productid where p.product_id=:product_id");
$urundetaysor->execute(array(
    'product_id' => $_GET['product_id']
));
$say=$urundetaysor->rowCount();
$urundetaycek=$urundetaysor->fetch(PDO::FETCH_ASSOC);

$urundetayresimsor = $db->prepare("SELECT * FROM product p inner join productimages pi on pi.product_id=p.product_id where p.product_id=:product_id");
$urundetayresimsor->execute(array(
    'product_id' => $_GET['product_id']
));
$say=$urundetayresimsor->rowCount();
$urundetayresimcek=$urundetayresimsor->fetchAll(PDO::FETCH_ASSOC);

$kullanicisor=$db->prepare("SELECT * FROM users where users_email=:mail");
$kullanicisor->execute(array(
  'mail' => $_SESSION['users_email']
));
$say=$kullanicisor->rowCount();
$kullanicicek2=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>


<div class="product-section section mt-90 mb-90">
    <div class="container">

        <div class="row mb-90">

            <div class="col-lg-6 col-12 mb-50">

                <!-- Image -->
                <div class="single-product-image thumb-right">

                    <div class="tab-content">
                        <div id="single-image-1" class="tab-pane fade show active big-image-slider">
                            <?php foreach ($urundetayresimcek as $resim ) { ?>
                                <div class="big-image"><img src="admin/<?php echo $resim['productimages_path']; ?>" alt="Big Image"><a href="admin/<?php echo $resim['productimages_path']; ?>" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div><?php } ?>


                            </div>

                        </div>


                    </div>

                </div>

                <div class="col-lg-6 col-12 mb-50">

                    <!-- Content -->
                    <div class="single-product-content">
                        <form action="admin/sql/islem.php" method="POST">
                            <!-- Category & Title -->
                            <div class="head-content">

                                <div class="category-title">
                                    <a href="#" class="cat"><?php echo $detaykategoricek['category_name']; ?></a>
                                    <h5 class="title"><?php echo $urundetaycek['product_name']; ?></h5>
                                </div>

                                <h5 class="price"><?php echo $urundetaycek['product_price']; ?> TL</h5>

                            </div>

                            <div class="single-product-description">

                                <div class="ratting">

                                </div>

                                <div class="desc">
                                    <p><?php echo $urundetaycek['product_content']; ?></p>
                                </div>

                                <span class="availability">Durum: <span><?php if($urundetaycek['stock_total']==0){echo "Stokta Yok";}else{echo $urundetaycek['stock_total']; echo " Adet Bulunmaktadir";} ?> </span></span>

                                <div class="quantity-colors">

                                    <div class="quantity">
                                        <h5>Adet</h5>
                                        <input type="number" style="width: 80px" class="form-control" name="basket_piece" min="1" max="<?php echo $urundetaycek['stock_total'] ?>" value="1"
                                    </div>                            


                                </div> 

                                <input type="hidden" name="basket_userid" value="<?php echo $kullanicicek2['users_id'] ?>">

                                <input type="hidden" name="basket_productid" value="<?php echo $urundetaycek['product_id'] ?>">


                                <div class="actions">

                                    <button type="submit" name="sepetekle" class="btn btn-default btn-red btn-sm"<?php
                                    if($urundetaycek['stock_total']==0)
                                        { ?> disabled  <?php } ?>><span class="addchart">Sepete Ekle</span></button>

                                            <div class="wishlist-compare" style="padding-right:10px ">

                                             <button name="favorikaydet" type="submit" class="btn btn-default btn-red btn-sm"><i class="ti-heart"><input type="hidden" name="favorite_userid" value="<?php echo $kullanicicek2['users_id'] ?>"><input type="hidden" name="favorite_productid" value="<?php echo $urundetaycek['product_id'] ?>"></i></button> 
                                         </div>

                                     </div>
                                 </form>

                                 <div class="tags">

                                    <h5>Kategori:</h5>
                                    <a href="#"><?php echo $detaykategoricek['category_name']; ?></a>

                                </div>

                                <div class="share">

                                    <h5>Share: </h5>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



            </div>
        </div><!-- Single Product Section End -->
        <?php include 'footer.php' ?>