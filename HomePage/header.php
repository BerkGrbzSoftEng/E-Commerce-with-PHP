<?php
ob_start();
session_start();
include 'admin/sql/baglan.php';
if(!isset($_SESSION['basket'])){
    $_SESSION['basket'] = [];
}
//Belirli veriyi seçme işlemi
$adressor=$db->prepare("SELECT * FROM contact ");
$adressor->execute(array());
$say=$adressor->rowCount();
$adrescek=$adressor->fetch(PDO::FETCH_ASSOC);

$kategorisor=$db->prepare("SELECT * FROM category ");
$kategorisor->execute(array());
$say=$kategorisor->rowCount();
$kategoricek=$kategorisor->fetchAll(PDO::FETCH_ASSOC);



$urundetaykategori=$db->prepare("SELECT * FROM category ");
$urundetaykategori->execute(array());
$say=$urundetaykategori->rowCount();
$detaykategoricek=$urundetaykategori->fetch(PDO::FETCH_ASSOC);

$sayfasor=$db->prepare("SELECT * FROM category ");
$sayfasor->execute(array());
$say=$sayfasor->rowCount();
$sayfacek=$sayfasor->fetch(PDO::FETCH_ASSOC);
 
 $kullanicisor=$db->prepare("SELECT * FROM users where users_email=:mail");
@$kullanicisor->execute(array(
  'mail' => $_SESSION['users_email']
  ));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

$sepetsor=$db->prepare("SELECT * FROM basket b INNER JOIN users s on b.basket_userid=s.users_id where s.users_email=:mail and b.basket_status=0");
@$sepetsor->execute(array(
'mail' => $_SESSION['users_email']
));
$say2=$sepetsor->rowCount();


?>

<!DOCTYPE html>
<html class="no-js" lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SAYSOFT - E-Ticaret </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/saysoft.png">
    
    <!-- CSS
	============================================ -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/icon-font.min.css">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
    .disabled {
        pointer-events: none;
        cursor: default;
    }
</style>
</head>

<body>

<!-- Header Section Start -->
<div class="header-section section">


           <!-- Header Top Start -->
    <div class="header-top header-top-one header-top-border pt-10 pb-10">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col mt-10 mb-10">
                    <!-- Header Links Start -->
                    <div class="header-links">
                        <a href="contact.php"><i class="fa fa-phone"></i> +0 505 101 10 00</a>
                        <a href="contact.php"><i class="fa fa-envelope"></i> saysoft@saysoft.com</a>
                    </div><!-- Header Links End -->
                </div>

                <div class="col order-12 order-xs-12 order-lg-2 mt-10 mb-10">
                    <!-- Header Advance Search Start -->
                    <div class="header-advance-search">
                        
                       <form action="search" method="POST" >
                            <div class="input"><input type="text" name="searching" class="form-control" placeholder="Ara"></div>
                     
                            <div class="submit"><button name="search"><i class="icofont icofont-search-alt-1"></i></button></div>
                        </form>
                        
                    </div><!-- Header Advance Search End -->
                </div>


                   <?php 
                    if (!isset($_SESSION['users_email'])) { ?>

                <div class="col order-2 order-xs-2 order-lg-12 mt-10 mb-10">
                    <!-- Header Account Links Start -->
                    <div class="header-account-links">
                        <a href="register.php" ><i class="icofont icofont-user-alt-7"></i> <span>Üye Ol</span></a>
                        <a href="login.php"><i class="icofont icofont-login d-none"></i> <span>Giriş Yap</span></a>
                    </div><!-- Header Account Links End -->
                </div>
                <?php } ?>




                   

                <div class="col order-12 order-lg-2 order-xl-2 d-none d-lg-block">
                    <!-- HESAP -->
                     <?php 
                    if (isset($_SESSION['users_email'])) { ?>
                   
                    <div class="main-menu">
                        <nav>
                            <ul>
                                
                              
                                <li class="menu-item-has-children"><a href="#"><i class="icofont icofont-user-alt-7"></i>Hesabım</a>
                                    <ul class="sub-menu">
                                        <li><a href="hesabim.php?users_id=<?php echo $kullanicicek['users_id'] ?>">Hesabımı Düzenle</a></li>
                                        <li><a href="cart.php">Siparişlerim</a></li>
                                        <li><a href="oldcart.php">Geçmiş Siparişlerim</a></li>
                                        <li><a href="favori.PHP">Favorilerim</a></li>
                                        <li><a href="logout.php">Çıkış</a></li>
                                    </ul>
                                </li>
                                
                            </ul>
                        </nav>
                    </div><!-- HESAP -->
                    
                      <?php } ?>
                </div>
              


            </div>
        </div>
    </div><!-- Header Top End -->

    <!-- Header Bottom Start -->
    <div class="header-bottom header-bottom-one header-sticky">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col mt-15 mb-15">
                    <!-- Logo Start -->
                    <div class="header-logo">
                        <a href="index.php">
                            <img src="assets/images/logo1.png" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                           
                        </a>
                    </div><!-- Logo End -->
                </div>

                <div class="col order-12 order-lg-2 order-xl-2 d-none d-lg-block">
                    <!-- Main Menu Start -->
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="active"><a href="index.php">Anasayfa</a></li>
                                <li ><a href="allproduct.php">Urunler</a></li>
                              
                                <li><a href="about.php">Hakkımizda</a>
                                  
                                <li><a href="contact.php">İletisim</a></li>
                            </ul>
                        </nav>
                    </div><!-- Main Menu End -->
                </div>

                <div class="col order-2 order-lg-12 order-xl-12">
                    <!-- Header Shop Links Start -->
                    <div class="header-shop-links">
                        
                        
                        <!-- Wishlist -->
                        <a href="favori.php" class="header-wishlist"><i class="ti-heart"></i> </a>
                        <!-- Cart -->
                          <?php 
                    if (isset($_SESSION['users_email'])) { ?>

                        <a href="cart.php" class=""><i class="ti-shopping-cart"></i><span class="number"><?php echo $say2 ?></span></a>


                        <?php } else
                        { ?>
                            <a href="login.php" class=""><i class="ti-shopping-cart"></i><span class="number"><?php echo $say2 ?></span></a>

                       <?php } ?>

                    </div><!-- Header Shop Links End -->
                </div>
                
                <!-- Mobile Menu -->
                <div class="mobile-menu order-12 d-block d-lg-none col"></div>

            </div>
        </div>
    </div><!-- Header Bottom End -->

    <!-- Header Category Start -->
    <div class="header-category-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <!-- Header Category -->
                    <div class="header-category">
                        
                        <!-- Category Toggle Wrap -->
                        <div class="category-toggle-wrap d-block d-lg-none">
                            <!-- Category Toggle -->
                            <button class="category-toggle">Kategoriler <i class="ti-menu"></i></button>
                        </div>
                        
                        <!-- Category Menu -->
                        <nav class="category-menu">
                            <ul>
                                <?php
                                foreach ($kategoricek as $key ) { ?>

                                <li><a href="product.php?category_id=<?php echo $key['category_id'] ?>"><?php echo $key['category_name'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div><!-- Header Category End -->

</div><!-- Header Section End -->