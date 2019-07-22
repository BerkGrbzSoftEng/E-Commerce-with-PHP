<?php
 include 'header.php';  


$urunadsor = $db->prepare("SELECT * FROM product p inner join productimages pi on pi.product_id=p.product_id INNER JOIN category c on c.category_id=p.product_categoryid where c.category_id=:category_id ");
$urunadsor->execute(array(
'category_id' => $_GET['category_id']
));
$say=$urunadsor->rowCount();
$uruncek=$urunadsor->fetchAll(PDO::FETCH_ASSOC);
 ?>


<div class="cart-overlay"></div>



<!-- Product Section Start -->
<div class="product-section section mt-50 mb-90">
    <div class="container">
        <div class="row">

            <div class="col-12">

                
                
                <!-- Shop Product Wrap Start -->
                <!-- Shop Product Wrap Start -->
                <div class="shop-product-wrap grid row">
                 <?php 
                 foreach ($uruncek as $key ) {

                     if($key['product_categoryid']==$key['category_id'])  {                   # code...
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

                <?php } }?>

            </div><!-- Shop Product Wrap End -->

            <div class="row mt-30">
              
            </div>

        </div>

    </div>
</div>
</div><!-- Feature Product Section End -->
<?php include 'footer.php' ?>