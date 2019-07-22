<?php include 'header.php' ?>
<!-- Mini Cart Wrap Start -->                      
<div class="mini-cart-wrap">

    <!-- Mini Cart Top -->
    <div class="mini-cart-top">    
    
        <button class="close-cart">Close Cart<i class="icofont icofont-close"></i></button>
        
    </div>


</div><!-- Mini Cart Wrap End --> 

<!-- Cart Overlay -->
<div class="cart-overlay"></div>



<!-- Register Section Start -->
<div class="register-section section mt-90 mb-90">
    <div class="container">
        <div class="row">
            
            <!-- Register -->
            <div class=" col-md-6 col-12 d-flex">
                <div class="ee-register">
                    
                    <h3>BİLGİLERİNİZİ GÜNCELLEYİNİZ</h3>
                  
                    
                    <!-- Register Form -->
                    <form action="admin/sql/islem.php" method="POST" role="form">
                        <div class="row">
                            <div class="col-12 mb-30"><input type="text" name="users_name" placeholder="Adınız Soyadınız"></div>
                            <div class="col-12 mb-30"><input type="email" name="users_email" placeholder="Email Adresiniz"></div>
                             <div class="col-12 mb-30"><input type="text" name="users_address" placeholder="Adres Bilgisi"></div>
                            <div class="col-12 mb-30"><input type="password" name="users_password" placeholder="Şifre"></div>
                         
                            <div class="col-12"><input type="submit" name="kullaniciduzenle" value="güncelle"></div>
                            <input type="hidden" name="users_id" value="<?php echo $kullanicicek['users_id'] ?>"> 
                      
                        </div>
                    </form>

                    
                </div>

            </div>
            
            <div class="col-md-1 col-12 d-flex">
                
                <div class="login-reg-vertical-boder"></div>
                
            </div>
            </div>
        </div>
    </div>

<?php include 'footer.php' ?>