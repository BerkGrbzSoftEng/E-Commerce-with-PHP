<?php
include 'header.php';  



?>


<div class="cart-overlay"></div>



<!-- Product Section Start -->
<div class="product-section section mt-0 mb-90">
    <div class="container">
        <div class="row">

            <div class="col-12">

                <div class="row mb-50">
                    <div class="col">



                    </div>
                </div>
                <?php

                $sayfada = 12; // sayfada gösterilecek içerik miktarını belirtiyoruz.


                $sorgu=$db->prepare("select * from product");
                $sorgu->execute();
                $toplam_urun=$sorgu->rowCount();

                $toplam_sayfa = ceil($toplam_urun / $sayfada);

                  // eğer sayfa girilmemişse 1 varsayalım.
                $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

          // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                if($sayfa < 1) $sayfa = 1; 

        // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 

                $limit = ($sayfa - 1) * $sayfada;
                $urunadsor = $db->prepare("SELECT * FROM product p inner join productimages pi on pi.product_id=p.product_id INNER JOIN category c on c.category_id=p.product_categoryid ORDER by p.product_id ASC limit $limit,$sayfada ");
                $urunadsor->execute(array());
                $say=$urunadsor->rowCount();
                $uruncek=$urunadsor->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <!-- Shop Product Wrap Start -->
                <!-- Shop Product Wrap Start -->
                <div class="shop-product-wrap grid row">
                   <?php 
                   foreach ($uruncek as $key ) {
                # code...
                    ?>
                    <input type="hidden" name="product_id" value="<?php echo $uruncek['product_id'] ?>"> 
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 pb-30 pt-10">

                        <!-- Product Start -->
                        <div class="ee-product">

                            <!-- Image -->
                            <div class="image">

                                <a href="product-detail.php?product_id=<?php echo $key['product_id']; ?>" class="img"><img src="admin/<?php echo $key['productimages_path']; ?>" alt="Product Image"></a>



                            </div>

                            <!-- Content -->
                            <div class="content">

                                <!-- Category & Title -->
                                <div class="category-title">

                                    <a href="product-detail.php?product_id=<?php echo $key['product_id']; ?>" class="cat"><?php echo $key['category_name']; ?></a>
                                    <h5 class="title"><a href="product-detail.php?product_id=<?php echo $key['product_id']; ?>"><?php echo $key['product_name']; ?></a></h5>

                                </div>

                                <!-- Price & Ratting -->
                                <div class="price-ratting">

                                    <h5 class="price"><?php echo $key['product_price']; ?>&nbsp;TL</h5>
                                    
                                </div>

                            </div>

                        </div><!-- Product End -->
                        

                        
                    </div>

                <?php  }?>

            </div><!-- Shop Product Wrap End -->

            <div class="row mt-30">
                <div class="col">

                    <ul class="pagination">

                        <?php

                        $s=0;

                        while ($s < $toplam_sayfa) {

                          $s++; ?>

                          <?php 

                          if ($s==$sayfa) {?>

                              <li class="active">

                                <a href="allproduct.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                            </li>

                        <?php } else {?>


                          <li>

                            <a href="allproduct.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                        </li>

                    <?php   }

                }

                ?>
            </ul>

        </div>

    </div>

</div>

</div>
</div>
</div><!-- Feature Product Section End -->
<?php include 'footer.php' ?>