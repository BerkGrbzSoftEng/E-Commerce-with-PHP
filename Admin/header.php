<?php
ob_start();
session_start();
include '../sql/baglan.php';

$kullanicisor=$db->prepare("SELECT * FROM admin where username=:name");
$kullanicisor->execute(array(
  'name' => $_SESSION['username']
));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if ($say==0) {

  Header("Location:login.php?durum=izinsiz");
  exit;

}
$mesajsor=$db->prepare("SELECT * from messages");
$mesajsor->execute();
$say2=$mesajsor->rowCount();

$kullanicisor=$db->prepare("SELECT * from users s inner join roles r on r.roles_id=s.users_roleid");
$kullanicisor->execute();
$say=$kullanicisor->rowCount();
$kullanicicekim=$kullanicisor->fetch(PDO::FETCH_ASSOC);



?>


<!DOCTYPE html>
<html lang="tr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SaySoft | ADMİN PANEL</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <!-- Dropzone.js -->

  <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">



  <!-- Dropzone.js -->

  <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
  <!-- Ck Editör -->
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>


  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-user"></i> <span>SaySoft | ADMİN </span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/saysoft.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Hoşgeldiniz,</span>
              <h2><?php echo $kullanicicek['username'] ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i>Anasayfa</a></li>
                <li><a href="menuler.php"><i class="fa fa-sitemap"></i>Menüler</a></li>
                <li><a href="kullanici.php"><i class="fa fa-user"></i>Kullanici</a></li>
                <li><a href="kategori.php"><i class="fa fa-list"></i>Kategoriler</a></li>
                <li><a href="urunler.php"><i class="fa fa-shopping-basket"></i>Ürünler</a></li>
                <li><a href="promosyonlar.php"><i class="fa fa-cut"></i>Promosyon</a></li>
                <li><a href="duyurular.php"><i class="fa fa-bullhorn"></i>Duyurular</a></li>
                <li><a href="slider.php"><i class="fa fa-image"></i>Slider</a></li>
                <li><a href="mesajlar.php"><i class="fa fa-envelope"></i>Mesajlar</a></li>
                <li><a><i class="fa fa-cogs"></i> Ayarlar <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="dashboard.php">Dashboard</a></li>

                  </ul>
                </li>     
              </ul>
            </div>
          </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
          </a>
          <a href="logout.php" data-toggle="tooltip" data-placement="top" title="Logout">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="images/saysoft.jpg" alt=""><?php echo $kullanicicek['username'] ?>
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="profil.php"><i class="fa fa-user pull-right"></i> Profil</a></li>

                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Güvenli Çıkış</a></li>
              </ul>
            </li>

            <li role="presentation" class="dropdown">
              <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-green"><?php echo $say2;   ?></span>
              </a>
              <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
               <?php 
               $say=0;
               while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)) {$say++?>
                <li>
                  <a>
                    <span class="image"><img src="images/saysoft.jpg" alt="Profile Image" /></span>
                    <span>
                      <span><?php echo $mesajcek['messages_name'] ?></span>
                      <span class="time"><?php echo $mesajcek['messages_date'] ?></span>
                    </span>
                    <span class="message">
                      <?php echo $mesajcek['messages_content'] ?>
                    </span>
                  </a>
                </li>
              <?php } ?>
                <li>
                  <div class="text-center">
                    <a href="mesajlar.php">
                      <strong>Daha Fazla Görüntüle</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                </li>

              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
        <!-- /top navigation -->