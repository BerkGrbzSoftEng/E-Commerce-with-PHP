<?php include 'header.php';
$users_id=$kullanicicek['users_id'];
$sepetsor = $db->prepare("SELECT * from basket b INNER JOIN product p on p.product_id=b.basket_productid INNER JOIN users s on s.users_id=b.basket_userid where b.basket_userid=:users_id and b.basket_status=1 ORDER BY p.product_price");
$sepetsor->execute(array(
    'users_id' => $users_id
));
$say=$sepetsor->rowCount();
$sepetcek=$sepetsor->fetchAll(PDO::FETCH_ASSOC);

$toplamsor = $db->prepare("SELECT format(sum(b.basket_piece*p.product_price),2)from basket b INNER JOIN product p on p.product_id=b.basket_productid INNER JOIN users s on s.users_id=b.basket_userid where b.basket_userid=:users_id");
$toplamsor->execute(array(
    'users_id' => $users_id
));
$toplamcek=$toplamsor->fetchAll(PDO::FETCH_ASSOC);




?>

<!-- Cart Overlay -->
<div class="cart-overlay"></div>

<!-- Page Banner Section Start -->
<div class="page-banner-section section">
    <div class="page-banner-wrap row row-0 d-flex align-items-center ">



    </div>
</div><!-- Page Banner Section End -->

<!-- Cart Page Start -->
<div class="page-section section pt-90 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">               
                    <!-- Cart Table -->
                    <div class="cart-table table-responsive mb-40">

                        <table class="table">
                            <thead>
                                <tr>

                                    <th class="pro-title">Ürün Adi</th>
                                    <th class="pro-price">Fiyat</th>
                                    <th class="pro-quantity">Adet</th>
                                    <th class="pro-subtotal">Toplam</th>

                                </tr>
                            </thead>
                            <?php foreach ($sepetcek as $key ) { ?>
                                <tbody>


                                    <tr>

                                        <td class="pro-title"><a href="#"><?php echo $key['product_name'] ?></a></td>
                                        <td class="pro-price"><span><?php echo $key['product_price'] ?>&nbsp;TL</span></td>
                                        <td class="pro-quantity"><div class=""><input type="number" name="" style="width: 40px"  value="<?php echo $key['basket_piece'] ?>" disabled></div></td>
                                        <td class="pro-subtotal"><span><?php echo $topla=$key['product_price']*$key['basket_piece'] ?>&nbsp;TL</span></td>
                                        
                                    </tr>

                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                    
                </form> 

                <div class="row">

                    <div class="col-lg-6 col-12 mb-15">
                        <!-- Calculate Shipping -->
                        
                        <!-- Discount Coupon -->
                        
                    </div>

             </div>
         </div>
     </div>
 </div>
 <!-- Cart Page End --> 


 <?php include 'footer.php' ?>