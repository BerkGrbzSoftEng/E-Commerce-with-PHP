<?php
 include 'header.php';  

if (isset($_POST['search'])) {

    $aranan=$_POST['searching'];
    $isimsor=$db->prepare("SELECT * from product p INNER JOIN productimages pi on pi.product_id=p.product_id where p.product_name LIKE ? ");
    $isimsor->execute(array("%$aranan%"));
    $say=$isimsor->rowCount();

} else {

   // Header("Location:index.php?durum=bos");

}


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
                
                <!-- Shop Product Wrap Start -->
                <!-- Shop Product Wrap Start -->
                <div class="shop-product-wrap grid row">
                 <?php 
                 if ($say==0) {
                    echo "Aradiginiz ürün bulanamadi ";
                }
                 
                while($isimcek=$isimsor->fetch(PDO::FETCH_ASSOC)) {
                    
                    ?>
                     
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 pb-30 pt-10">

                        <!-- Product Start -->
                        <div class="ee-product">

                            <!-- Image -->
                            <div class="image">

                                <a href="product-detail.php?product_id=<?php echo $isimcek['product_id']; ?>" class="img"><img src="admin/<?php echo $isimcek['productimages_path']; ?>" alt="Product Image"></a>

                                <div class="wishlist-compare">

                                    <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                </div>



                            </div>

                            <!-- Content -->
                            <div class="content">

                                <!-- Category & Title -->
                                <div class="category-title">

                                    <a href="product-detail.php?product_id=<?php echo $isimcek['product_id']; ?>" class="cat"><?php echo $isimcek['category_name']; ?></a>
                                    <h5 class="title"><a href="product-detail.php?product_id=<?php echo $isimcek['product_id']; ?>"><?php echo $isimcek['product_name']; ?></a></h5>

                                </div>

                                <!-- Price & Ratting -->
                                <div class="price-ratting">

                                    <h5 class="price"><?php echo $isimcek['product_price']; ?>&nbsp;TL</h5>
                                    

                                </div>

                            </div>

                        </div><!-- Product End -->
                        

                        
                    </div>

                <?php  }?>

            </div><!-- Shop Product Wrap End -->

            <div class="row mt-30">
                
            </div>

        </div>

    </div>
</div>
</div><!-- Feature Product Section End -->
<?php include 'footer.php' ?>