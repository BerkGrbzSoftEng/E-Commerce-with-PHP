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
            <div class="col-md-6 col-12 d-flex">
                <div class="ee-register">
                    
                    <h3>Kayıt için aşağıdaki formu doldurunuz.</h3>
                  
                    
                    <!-- Register Form -->
                    <form action="admin/sql/islem.php" method="POST" role="form">
                        <div class="row">
                            <div class="col-12 mb-30"><input type="text" name="users_name" placeholder="Adınız Soyadınız"></div>
                            <div class="col-12 mb-30"><input type="email" name="users_email" placeholder="Email Adresiniz"></div>
                             <div class="col-12 mb-30"><input type="text" name="users_address" placeholder="Adres Bilgisi"></div>
                            <div class="col-12 mb-30"><input type="password" name="users_passwordone" placeholder="Şifre"></div>
                            <div class="col-12 mb-30"><input type="password" name="users_passwordtwo" placeholder="Şifre Tekrar"></div>

                            <div class="col-12"><input type="submit" name="kullanicikaydet" value="Kayıt Ol"></div>
                        </div>
                    </form>
                    
                </div>
            </div>
            
            <div class="col-md-1 col-12 d-flex">
                
                <div class="login-reg-vertical-boder"></div>
                
            </div>
            
            <!-- Account Image -->
            <div class="col-md-5 col-12 d-flex">
                
                
            </div>
            
        </div>
    </div>
</div><!-- Register Section End -->

<!-- Brands Section Start -->


<!-- Subscribe Section Start -->
<div class="subscribe-section section bg-gray pt-55 pb-55">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Mailchimp Subscribe Content Start -->
            <div class="col-lg-6 col-12 mb-15 mt-15">
                <div class="subscribe-content">
                    <h2> <span>SON ÇIKAN</span> ÜRÜNLER İÇİN</span></h2>
                    <h2>BÜLTENİMİZE <span>KAYIT OL</span></h2>
                </div>
            </div><!-- Mailchimp Subscribe Content End -->
            
            
            <!-- Mailchimp Subscribe Form Start -->
            <div class="col-lg-6 col-12 mb-15 mt-15">
                
				<form class="subscribe-form" action="#">
					<input type="email" autocomplete="off" placeholder="Email Adresinizi Girin" />
					<button >kayıt ol</button>
				</form>
				<!-- mailchimp-alerts Start -->
				<div class="mailchimp-alerts text-centre">
					<div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
					<div class="mailchimp-success"></div><!-- mailchimp-success end -->
					<div class="mailchimp-error"></div><!-- mailchimp-error end -->
				</div><!-- mailchimp-alerts end -->
                
            </div><!-- Mailchimp Subscribe Form End -->
            
        </div>
    </div>
</div><!-- Subscribe Section End -->

<?php include 'footer.php' ?>