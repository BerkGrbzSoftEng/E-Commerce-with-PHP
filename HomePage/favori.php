<?php include 'header.php';
$users_id=$kullanicicek['users_id'];
$favorisor = $db->prepare("SELECT * from favorite f INNER JOIN users s on s.users_id=f.favorite_userid INNER JOIN product p on p.product_id=f.favorite_productid where s.users_id=:users_id");
$favorisor->execute(array(
    'users_id' => $users_id
));
$say=$favorisor->rowCount();
$favoricek=$favorisor->fetchAll(PDO::FETCH_ASSOC);





 ?>



<!-- Header Section Start -->
<div class="header-section section">


    <!-- Header Bottom Start -->
    <div class="header-bottom header-bottom-one header-sticky">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col mt-15 mb-15">
                    
                </div>

                <div class="col order-12 order-lg-2 order-xl-2 d-none d-lg-block">
           
                </div>

                
                <!-- Mobile Menu -->
                <div class="mobile-menu order-12 d-block d-lg-none col"></div>

            </div>
        </div>
    </div><!-- Header Bottom End -->

</div><!-- Header Section End -->





<!-- Cart Page Start -->
<div class="page-section section mt-90 mb-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">				
                    <div class="cart-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Resim</th>
                                    <th class="pro-title">Ürün adi</th>
                                    <th class="pro-price">fiyat</th>


                                    <th class="pro-remove">sil</th>
                                </tr>
                            </thead>
                            <?php foreach ($favoricek as $key ) { ?>
                            <tbody>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img src="assets/images/product/product-1.png" alt="Product"></a></td>
                                    <td class="pro-title"><a href="#"><?php echo $key['product_name'] ?></a></td>
                                    <td class="pro-price"><span><?php echo $key['product_price'] ?></span></td>

                                   
                                    <td class="pro-remove"><a href="favorisil.php?id=<?=$key['favorite_id']?>"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                
                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
                    
                </form>	
                
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>