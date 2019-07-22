<?php 

ob_start();
session_start();

include 'baglan.php';

if (!empty($_FILES)) {



	$uploads_dir = '../dimg/urun';
	@$tmp_name = $_FILES['file']["tmp_name"];
	@$name = $_FILES['file']["name"];
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);

	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$urun_id=$_POST['product_id'];

	$kaydet=$db->prepare("INSERT INTO productimages SET
		productimages_path=:productimages_path,
		product_id=:product_id");
	$insert=$kaydet->execute(array(
		'productimages_path' => $refimgyol,
		'product_id' => $urun_id
		));




}

if (!empty($_FILES)) {



	$uploads_dir = '../dimg/urundetay';
	@$tmp_name = $_FILES['file']["tmp_name"];
	@$name = $_FILES['file']["name"];
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);

	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$urun_id=$_POST['product_id'];

	$kaydet=$db->prepare("INSERT INTO productimages SET
		productimagesdetail_path=:productimagesdetail_path,
		product_id=:product_id");
	$insert=$kaydet->execute(array(
		'productimagesdetail_path' => $refimgyol,
		'product_id' => $urun_id
		));




}




?>