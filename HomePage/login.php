<?php include 'header.php' ?>

<!-- Mini Cart Wrap Start -->                      
<div class="mini-cart-wrap">

    <!-- Mini Cart Top -->
    <div class="mini-cart-top">    
    
        <button class="close-cart">Close Cart<i class="icofont icofont-close"></i></button>
        
    </div>

    <!-- Mini Cart Products -->
    <ul class="mini-cart-products">
        <li>
            <a class="image"><img src="assets/images/product/product-1.png" alt="Product"></a>
            <div class="content">
                <a href="single-product.html" class="title">Waxon Note Book Pro 5</a>
                <span class="price">Price: $295</span>
                <span class="qty">Qty: 02</span>
            </div>
            <button class="remove"><i class="fa fa-trash-o"></i></button>
        </li>
        <li>
            <a class="image"><img src="assets/images/product/product-2.png" alt="Product"></a>
            <div class="content">
                <a href="single-product.html" class="title">Aquet Drone D 420</a>
                <span class="price">Price: $275</span>
                <span class="qty">Qty: 01</span>
            </div>
            <button class="remove"><i class="fa fa-trash-o"></i></button>
        </li>
        <li>
            <a class="image"><img src="assets/images/product/product-3.png" alt="Product"></a>
            <div class="content">
                <a href="single-product.html" class="title">Game Station X 22</a>
                <span class="price">Price: $295</span>
                <span class="qty">Qty: 01</span>
            </div>
            <button class="remove"><i class="fa fa-trash-o"></i></button>
        </li>
    </ul>

    <!-- Mini Cart Bottom -->
    <div class="mini-cart-bottom">    
    
        <h4 class="sub-total">Total: <span>$1160</span></h4>

        <div class="button">
            <a href="checkout.html">CHECK OUT</a>
        </div>
        
    </div>

</div><!-- Mini Cart Wrap End --> 

<!-- Cart Overlay -->
<div class="cart-overlay"></div>



<!-- Login Section Start -->
<div class="login-section section mt-90 mb-90">
    <div class="container">
        <div class="row">
            
            <!-- Login -->
            <div class="col-md-6 col-12 d-flex">
                <div class="ee-login">
                    
                    <h3>Hesabınıza Giriş Yapın</h3>
                    <p></p>
                     <?php if($_GET['durum']="kayitbasarili"){ ?>
                                    <div class="alert alert-success">
                                        <strong>Bilgi&nbsp;</strong>Kaydiniz başarili giriş yapabilirsiniz.
                                       </div> 

                                <?php } ?>
                    
                    <!-- Login Form -->
                    <form action="admin/sql/islem.php" method="POST" role="form">
                        <div class="row" >
                            <div class="col-12 mb-30"><input type="text" name="users_email" placeholder="Email Adresinizi Girin"></div>
                            <div class="col-12 mb-20"><input type="password" name="users_password" placeholder="Şifrenizi Girin"></div>
                            <div class="col-12 mb-15">

                                
                                <input type="checkbox" id="remember_me">
                                <label for="remember_me">Beni Hatırla</label>
                                
                                <a href="#">Şifremi Unuttum?</a>
                                
                            </div>
                            <div class="col-12"><input type="submit" name="kullanicigiris" value="GİRİŞ YAP"></div>
                        </div>
                    </form>
                    <h4>Henüz Üyeliğiniz Yok Mu? Lütfen Tıklayınız <a href="register.php">Kayıt Ol</a></h4>
                    
                </div>
            </div>
            
            <div class="col-md-1 col-12 d-flex">
                
                <div class="login-reg-vertical-boder"></div>
                
            </div>
            
            <!-- Login With Social -->
            <!-- <div class="col-md-5 col-12 d-flex">
                
                <div class="ee-social-login">
                    <h3>Also you can login with...</h3>
                    
                    <a href="#" class="facebook-login">Login with <i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter-login">Login with <i class="fa fa-twitter"></i></a>
                    <a href="#" class="google-plus-login">Login with <i class="fa fa-google-plus"></i></a>
                    
                </div>
                
            </div> -->
            
        </div>
    </div>
</div><!-- Login Section End -->

<!-- Brands Section Start -->
<div class="brands-section section mb-90">
    <div class="container">
        <div class="row">
            
            <!-- Brand Slider Start -->
            <div class="brand-slider col">
                <div class="brand-item col"><img src="assets/images/brands/brand-1.png" alt="Brands"></div>
                <div class="brand-item col"><img src="assets/images/brands/brand-2.png" alt="Brands"></div>
                <div class="brand-item col"><img src="assets/images/brands/brand-3.png" alt="Brands"></div>
                <div class="brand-item col"><img src="assets/images/brands/brand-4.png" alt="Brands"></div>
                <div class="brand-item col"><img src="assets/images/brands/brand-5.png" alt="Brands"></div>
            </div><!-- Brand Slider End -->
            
        </div>
    </div>
</div><!-- Brands Section End -->

<!-- Subscribe Section Start -->
<div class="subscribe-section section bg-gray pt-55 pb-55">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Mailchimp Subscribe Content Start -->
            <div class="col-lg-6 col-12 mb-15 mt-15">
                <div class="subscribe-content">
                    <<h2> <span>SON ÇIKAN</span> ÜRÜNLER İÇİN</span></h2>
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