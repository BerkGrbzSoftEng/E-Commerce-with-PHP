<?php 


$b = $db->prepare("SELECT * FROM product p inner join productimages pi on pi.product_id=p.product_id INNER JOIN category c on c.category_id=p.product_categoryid ");
$b->execute(array(
));
$say=$b->rowCount();
$bcek=$b->fetchAll(PDO::FETCH_ASSOC);

$a = $db->prepare("SELECT * FROM category ");
$a->execute(array(
));
$say=$a->rowCount();
$acek=$a->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- Best Deals Product Section Start -->
<div class="product-section section mb-40">
    <div class="container">
        <div class="row">

            <!-- Section Title Start -->
            <div class="col-12 mb-40">
                <div class="section-title-one" data-title="ÖNE ÇIKANLAR"><h1>Öne Çıkanlar</h1></div>
            </div><!-- Section Title End -->
            
            <!-- Product Tab Filter Start-->
            <div class="col-12">
                <div class="offer-product-wrap row">

                    <!-- Product Tab Filter Start -->
                    <div class="col mb-30">
                        <div class="product-tab-filter">
                            <!-- Tab Filter Toggle -->
                            <button class="product-tab-filter-toggle">showing: <span></span><i class="icofont icofont-simple-down"></i></button>
                            
                            <!-- Product Tab List -->
                            
                        </div>
                    </div><!-- Product Tab Filter End -->
                    
                    <!-- Offer Time Wrap Start -->
                    <div class="col mb-30">
                        <div class="offer-time-wrap" style="background-image: url(assets/images/bg/offer-products.jpg)">
                            <h1><span>BİTEN</span> 99%</h1>
                            
                            <h4><span>PROJEMİZ DE </span>KALAN ZAMAN</h4>
                            <div class="countdown" data-countdown="2019/04/5"></div>
                        </div>
                    </div><!-- Offer Time Wrap End -->

                    <!-- Product Tab Content Start -->
                    <div class="col-12 mb-30">
                        <div class="tab-content">

                            <!-- Tab Pane Start -->
                            <div class="tab-pane fade show active" id="tab-three">

                                <!-- Product Slider Wrap Start -->
                                <div class="product-slider-wrap product-slider-arrow-two">
                                    <!-- Product Slider Start -->
                                    <div class="product-slider product-slider-3">
                                        <?php 
                                            foreach ($bcek as $key ) {
                                                # code...
                                            ?>
                                        <div class="col pb-20 pt-10">
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

                                                        <a href="product-detail.php?product_id=<?php echo $key['product_id']; ?>" class="cat"><?php echo $key['product_name']; ?></a>
                                                        <h5 class="title"><a href="single-product.html"></a></h5>

                                                    </div>

                                                    <!-- Price & Ratting -->
                                                    <div class="price-ratting">

                                                        <h5 class="price"><?php echo $key['product_price']; ?>&nbsp;TL</h5>
                                                        

                                                    </div>

                                                </div>

                                            </div><!-- Product End -->
                                        </div>
                                    <?php }?>


                                    </div><!-- Product Slider End -->
                                </div><!-- Product Slider Wrap End -->

                            </div><!-- Tab Pane End -->

                            <!-- Tab Pane Start -->
                            <div class="tab-pane fade" id="tab-four">

                                <!-- Product Slider Wrap Start -->
                                <div class="product-slider-wrap product-slider-arrow-two">
                                    <!-- Product Slider Start -->
                                    <div class="product-slider product-slider-3">


                                        <div class="col pb-20 pt-10">
                                            <!-- Product Start -->
                                            <div class="ee-product">

                                                <!-- Image -->
                                                <div class="image">

                                                    <span class="label new">new</span>

                                                    <a href="single-product.html" class="img"><img src="assets/images/product/product-22.png" alt="Product Image"></a>

                                                    <div class="wishlist-compare">
                                                        <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                                        <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                                    </div>

                                                    <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>

                                                </div>

                                                <!-- Content -->
                                                <div class="content">

                                                    <!-- Category & Title -->
                                                    <div class="category-title">

                                                        <a href="#" class="cat">Kitchen Appliances</a>
                                                        <h5 class="title"><a href="single-product.html">shine Microwave Oven</a></h5>

                                                    </div>

                                                    <!-- Price & Ratting -->
                                                    <div class="price-ratting">

                                                        <h5 class="price"><span class="old">$389</span>$245.00</h5>
                                                        <div class="ratting">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div><!-- Product End -->
                                        </div>

                                    </div><!-- Product Slider End -->
                                </div><!-- Product Slider Wrap End -->

                            </div><!-- Tab Pane End -->

                        </div>
                    </div><!-- Product Tab Content End -->
                    
                </div>
            </div><!-- Product Tab Filter End-->
            
        </div>
    </div>
</div><!-- Best Deals Product Section End -->
