<header>
	<meta charset="utf-8">
</header>

<?php 



ob_start();
error_reporting(E_ALL ^ E_NOTICE);
set_time_limit(0);
// date_default_timezone_get('Europe/Istanbul');

include 'admin/sql/baglan.php';
//include 'admin/production/baglan.php';//PHP olusucak



$veri=file_get_contents("http://www.spot34.com/35-hediyelik-esya");
preg_match_all('@<div class="product-image-container">(.*?)<a class="quick-view" href="http://www.spot34.com/(.*?)"@si',$veri,$dlinkcek);//pattern kısmına isterler girilecek $veri$dlinkcek
 echo "<br>";
echo $say=count($dlinkcek[2]); echo "urun bulundu. <br><br>";
 echo "<pre>";
 print_r($dlinkcek[2]);
 echo "<pre>";


 for($i=0;$i<$say; $i++){
 		echo "<br>";
		echo $git="http://www.spot34.com/".$dlinkcek[2][$i];

		$urunbaslik=$veri = file_get_contents($git);
preg_match_all('@<h1 itemprop="name">Toptan (.*?)</h1>@si', $veri, $baslik);
 echo "<br>";
 echo $product_name=strip_tags(trim($link=$baslik[1][0])) ; 

 preg_match_all('@<h1 itemprop="name">(.*?)</h1>@si', $veri, $icerik);
 echo "<br>";
 echo $product_content=strip_tags(trim($link=$icerik[1][0])) ;

  preg_match_all('@<span id="our_price_display" class="price" itemprop="price">(.*?)TL</span>@si',$veri, $fiyat);
 echo "<br>";
 echo $product_price=strip_tags(trim($link=$fiyat[1][0])) ;

 $product_categoryid=13;
 echo "<br>";

 $kaydet=$db->prepare("INSERT INTO product SET
             product_name=:product_name,
             product_content=:product_content,
             product_price=:product_price,
 			 product_categoryid=:product_categoryid
			");
          echo  $insert=$kaydet->execute(array(
 			'product_name' => $product_name,
 			'product_content' => $product_content,
 			'product_price' => $product_price-1,
 			'product_categoryid' => $product_categoryid

 		));

	}

 ?>