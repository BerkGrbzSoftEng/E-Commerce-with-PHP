<?php
ob_start();
session_start();

include 'baglan.php';

if (isset($_POST['admingiris'])) {

	$kullanici_id=$_POST['username'];
	$kullanici_sifre=$_POST['password'];

	$kullanicisor=$db->prepare("SELECT * FROM admin where username=:id and password=:psw");
	$kullanicisor->execute(array(
		'id' => $kullanici_id,
		'psw' => $kullanici_sifre,
		
	));

	$say=$kullanicisor->rowCount();

	if ($say==1) {

		$_SESSION['username']=$kullanici_id;
		header("Location:../production/index.php");
		exit;



	} else {

		header("Location:../production/login.php?durum=no");
		exit;
	}
	

}


if (isset($_POST['kategorikaydet'])) {

	$kategoriekle=$db->prepare("INSERT INTO category SET
		category_name=:category_name,
		category_alignment=:category_alignment,
		category_status=:category_status

		");

	$insert=$kategoriekle->execute(array(
		'category_name' => $_POST['category_name'],
		'category_alignment' => $_POST['category_alignment'],
		'category_status' => $_POST['category_status']
	));


	if ($insert) {

		Header("Location:../production/kategori.php?durum=ok");

	} else {

		Header("Location:../production/kategori.php?durum=no");
	}

}
if (isset($_POST['kategoriduzenle'])) {

	$id=$_POST['category_id'];
	
	$ayarkaydet=$db->prepare("UPDATE category SET
		category_name=:category_name,
		category_alignment=:category_alignment,
		category_status=:category_status
		WHERE category_id={$_POST['category_id']}");

	$update=$ayarkaydet->execute(array(
		'category_name' => $_POST['category_name'],
		'category_alignment' => $_POST['category_alignment'],
		'category_status' => $_POST['category_status']
	));


	if ($update) {

		Header("Location:../production/kategori.php?id=$id&durum=ok");

	} else {

		Header("Location:../production/kategori.php?id=$id&durum=no");
	}

}

if (isset($_POST['ürünkaydet'])) {

	$ürünekle=$db->prepare("INSERT INTO product SET
		product_name=:product_name,
		product_content=:product_content,
		product_price=:product_price,
		product_categoryid=:product_categoryid,
		product_status=:product_status

		");

	$insert=$ürünekle->execute(array(
		'product_name' => $_POST['product_name'],
		'product_content' => $_POST['product_content'],
		'product_price' => $_POST['product_price'],
		'product_categoryid' => $_POST['product_categoryid'],
		'product_status' => $_POST['product_status']
	));


	if ($insert) {

		Header("Location:../production/urunler.php?durum=ok");

	} else {

		Header("Location:../production/urunler.php?durum=no");
	}

}
if (isset($_POST['stokkaydet'])) {
	$id=$_POST['prod_id'];

	$ürünekle=$db->prepare("INSERT INTO stock SET
		stock_productid=:stock_productid,
		stock_total=:stock_total


		");

	$insert=$ürünekle->execute(array(
		'stock_productid' => $_POST['prod_id'],
		'stock_total' => $_POST['stock_total']
		
	));


	if ($insert) {

		Header("Location:../production/urunler.php?durum=ok");

	} else {

		Header("Location:../production/urunler.php?durum=no");
	}

}
if (isset($_POST['urunduzenle'])) {

	$id=$_POST['product_id'];
	
	$ayarkaydet=$db->prepare("UPDATE product SET
		product_name=:product_name,
		product_content=:product_content,
		product_categoryid=:product_categoryid,
		product_price=:product_price,
		product_status=:product_status
		WHERE product_id={$_POST['product_id']}");

	$update=$ayarkaydet->execute(array(
		'product_name' => $_POST['product_name'],
		'product_content' => $_POST['product_content'],
		'product_categoryid' => $_POST['product_categoryid'],
		'product_price' => $_POST['product_price'],
		'product_status' => $_POST['product_status']
	));


	if ($update) {

		Header("Location:../production/urunler.php?id=$id&durum=ok");

	} else {

		Header("Location:../production/urunler.php?id=$id&durum=no");
	}

}

if ($_GET['urunsil']=="ok") {

	$sil=$db->prepare("DELETE from product where product_id=:product_id");
	$kontrol=$sil->execute(array(
		'product_id' => $_GET['product_id']
	));


	if ($kontrol) {


		header("location:../production/urunler.php?sil=ok");


	} else {

		header("location:../production/urunler.php?sil=no");

	}


}
if ($_GET['kategorisil']=="ok") {

	$sil=$db->prepare("DELETE from category where category_id=:category_id");
	$kontrol=$sil->execute(array(
		'category_id' => $_GET['category_id']
	));


	if ($kontrol) {


		header("location:../production/kategori.php?sil=ok");


	} else {

		header("location:../production/kategori.php?sil=no");

	}


}
if (isset($_POST['kullaniciduzenle'])) {

	$id=$_POST['users_id'];
	
	$ayarkaydet=$db->prepare("UPDATE users SET
		users_name=:users_name,
		users_email=:users_email,
		users_address=:users_address,
		users_roleid=:users_roleid
		WHERE users_id={$_POST['users_id']}");

	$update=$ayarkaydet->execute(array(
		'users_name' => $_POST['users_name'],
		'users_email' => $_POST['users_email'],
		'users_address' => $_POST['users_address'],
		'users_roleid' => $_POST['users_roleid']
	));


	if ($update) {

		Header("Location:../production/kullanici.php?id=$id&durum=ok");

	} else {

		Header("Location:../production/kullanici.php?id=$id&durum=no");
	}

}


if (isset($_POST['sliderkaydet'])) {


	$uploads_dir = '../dimg/slider';
	@$tmp_name = $_FILES['slider_path']["tmp_name"];
	@$name = $_FILES['slider_path']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir,3)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_name=:slider_name,
		slider_alignment=:slider_alignment,
		slider_status=:slider_status,
		slider_path=:slider_path
		
		");
	$insert=$kaydet->execute(array(
		'slider_name' => $_POST['slider_name'],
		'slider_alignment' => $_POST['slider_alignment'],
		'slider_status' => $_POST['slider_status'],
		'slider_path' => $refimgyol
	));

	if ($insert) {

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}




}
if ($_GET['slidersil']=="ok") {

	$sil=$db->prepare("DELETE from slider where slider_id=:slider_id");
	$kontrol=$sil->execute(array(
		'slider_id' => $_GET['slider_id']
	));


	if ($kontrol) {


		header("location:../production/slider.php?sil=ok");


	} else {

		header("location:../production/slider.php?sil=no");

	}


}
if (isset($_POST['kullanicikaydet'])) {
	echo $users_name=htmlspecialchars($_POST['users_name']); echo "<br>";
	echo $users_surname=htmlspecialchars($_POST['users_surname']); echo "<br>";
	echo $users_email=htmlspecialchars($_POST['users_email']); echo "<br>";
	echo $users_address=htmlspecialchars($_POST['users_address']); echo "<br>";
	echo $users_passwordone=$_POST['users_passwordone']; echo "<br>";
	echo $users_passwordtwo=$_POST['users_passwordtwo']; echo "<br>";


	if ($users_passwordone==$users_passwordtwo) {


		if ($users_passwordone) {


// Başlangıç

			$kullanicisor=$db->prepare("select * from users where users_email=:email");
			$kullanicisor->execute(array(
				'email' => $users_email
			));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();



			if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=$users_passwordone;

				$users_roleid=2;

			//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet=$db->prepare("INSERT INTO users SET
					users_name=:users_name,
					users_email=:users_email,
					users_address=:users_address,
					users_password=:users_password,
					users_roleid=:users_roleid
					");
				$insert=$kullanicikaydet->execute(array(
					'users_name' => $users_name,
					'users_email' => $users_email,
					'users_address' => $users_address,
					'users_password' => $password,
					'users_roleid' => $users_roleid
				));

				if ($insert) {


					header("Location:../../login.php?durum=kayitbasarili");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../login.php?durum=basarisiz");
				}

			} else {

				header("Location:../../login.php?durum=kayitlikullanici");



			}

		} else {


			header("Location:../../login.php?durum=eksiksifre");


		}



	} else {



		header("Location:../../login.php?durum=farklisifre");
	}
	


}

if (isset($_POST['kullanicigiris'])) {


	
	echo $users_email=htmlspecialchars($_POST['users_email']); echo "<br>";
	echo $users_password=$_POST['users_password']; echo "<br>";



	$kullanicisor=$db->prepare("select * from users where users_email=:mail and users_roleid=:yetki and users_password=:password ");
	$kullanicisor->execute(array(
		'mail' => $users_email,
		'yetki' => 2,
		'password' => $users_password,
		
	));


	$say=$kullanicisor->rowCount();
	$rows = $kullanicisor->fetchAll(PDO::FETCH_ASSOC);

	if ($say==1) {

		$_SESSION['users_email']=$users_email;
		$_SESSION['users_id']=$rows[0]['users_id'];

		if(count($_SESSION['basket']) > 0)
		{///
		    ///
			foreach ($_SESSION['basket'] as $data){
				$temp = $db->prepare("select * from basket where basket_productid=:pid and basket_userid=:uid and basket_status=0");
				$temp->execute(array(
					'pid' => $data['basket_productid'],
					'uid' => $_SESSION['users_id']
				));
				$rows = $temp->fetchAll(PDO::FETCH_ASSOC);

				$count =   $temp->rowCount();

				if($count > 0)
				{
					$temp = $db->prepare("update basket set basket_piece=basket_piece+1 where basket_id=:id");
					$temp->execute(array(
						'id' => $rows[0]['basket_id']
					));
					$insert = false;
				}
				else
				{
					$ayarekle=$db->prepare("INSERT INTO basket SET
						basket_piece=:basket_piece,
						basket_userid=:basket_userid,
						basket_productid=:basket_productid	

						");

					$insert=$ayarekle->execute(array(
						'basket_piece' => 1,
						'basket_userid' => $_SESSION['users_id'],
						'basket_productid' => $data['basket_productid']

					));
				}
            } // eof foreach

            $_SESSION['basket'] = [];

        }///

        header("Location:../../index.php?durum=loginbasarili");
        exit;



    } else {


    	header("Location:../../login.php?durum=basarisiz");

    }


}

if ($_GET['category_status']=="ok") {

	
	$duzenle=$db->prepare("UPDATE category SET
		category_status=:category_status
		WHERE category_id={$_GET['category_id']}");

	$update=$duzenle->execute(array(
		'category_status' => $_GET['category_sts']
	));


	if ($update) {

		Header("Location:../production/kategori.php?id=$id&durum=ok");

	} else {

		Header("Location:../production/kategori.php?id=$id&durum=no");
	}

}
if ($_GET['product_status']=="ok") {

	
	$duzenle=$db->prepare("UPDATE product SET
		product_status=:product_status
		WHERE product_id={$_GET['product_id']}");

	$update=$duzenle->execute(array(
		'product_status' => $_GET['product_sts']
	));


	if ($update) {

		Header("Location:../production/urunler.php?id=$id&durum=ok");

	} else {

		Header("Location:../production/urunler.php?id=$id&durum=no");
	}

}
if ($_GET['slider_status']=="ok") {

	
	$duzenle=$db->prepare("UPDATE slider SET
		slider_status=:slider_status
		WHERE slider_id={$_GET['slider_id']}");

	$update=$duzenle->execute(array(
		'slider_status' => $_GET['slider_sts']
	));


	if ($update) {

		Header("Location:../production/slider.php?id=$id&durum=ok");

	} else {

		Header("Location:../production/slider.php?id=$id&durum=no");
	}

}
if ($_GET['menu_status']=="ok") {

	
	$duzenle=$db->prepare("UPDATE menu SET
		menu_status=:menu_status
		WHERE menu_id={$_GET['menu_id']}");

	$update=$duzenle->execute(array(
		'menu_status' => $_GET['menu_sts']
	));


	if ($update) {

		Header("Location:../production/menuler.php?id=$id&durum=ok");

	} else {

		Header("Location:../production/menuler.php?id=$id&durum=no");
	}

}
if (isset($_POST['menukaydet'])) {

	$menuekle=$db->prepare("INSERT INTO menu SET
		menu_name=:menu_name,
		menu_alignment=:menu_alignment,
		menu_url=:menu_url,
		menu_status=:menu_status

		");

	$insert=$menuekle->execute(array(
		'menu_name' => $_POST['menu_name'],
		'menu_alignment' => $_POST['menu_alignment'],
		'menu_url' => $_POST['menu_url'],
		'menu_status' => $_POST['menu_status']
	));


	if ($insert) {

		Header("Location:../production/menuler.php?durum=ok");

	} else {

		Header("Location:../production/menuler.php?durum=no");
	}

}
if (isset($_POST['menuduzenle'])) {

	$id=$_POST['menu_id'];
	
	$ayarkaydet=$db->prepare("UPDATE menu SET
		menu_name=:menu_name,
		menu_alignment=:menu_alignment,
		menu_url=:menu_url,
		menu_status=:menu_status
		WHERE menu_id={$_POST['menu_id']}");

	$update=$ayarkaydet->execute(array(
		'menu_name' => $_POST['menu_name'],
		'menu_alignment' => $_POST['menu_alignment'],
		'menu_url' => $_POST['menu_url'],
		'menu_status' => $_POST['menu_status']
	));


	if ($update) {

		Header("Location:../production/menuler.php?id=$id&durum=ok");

	} else {

		Header("Location:../production/menuler.php?id=$id&durum=no");
	}

}
if(isset($_POST['urunfotosil'])) {

	$product_id=$_POST['product_id'];


	echo $checklist = $_POST['urunfotosec'];

	
	foreach($checklist as $list) {

		$sil=$db->prepare("DELETE FROM productimages where product_id=:product_id");
		$kontrol=$sil->execute(array(
			'product_id' => $list
		));
	}

	if ($kontrol) {

		Header("Location:../production/urun-galeri.php?product_id=$product_id&durum=ok");

	} else {

		Header("Location:../production/urun-galeri.php?product_id=$urunproduct_id_id&durum=no");
	}


} 
if(isset($_POST['mesajgonder'])) {

	$responsemail=$_POST['users_email'];
	$query = $db->query("SELECT * FROM users where users_email='{$responsemail}'")->fetch(PDO::FETCH_ASSOC);
	if ( $query ){
		$messages_roleid=2;
		$query = $db->prepare("INSERT INTO messages SET
			messages_content = ?,
			messages_subject = ?,
			messages_email = ?,
			messages_name = ?,
			messages_roleid=?
			");
		$insert = $query->execute(array(
			$_POST['messages_content'], $_POST['messages_subject'], $_POST['users_email'], $_POST['users_name'],$messages_roleid
		));
		if ( $insert ){
			$last_id = $db->lastInsertId();

			Header("Location:../../contact.php?durum=başarılı");


		}else{
			Header("Location:../../contact.php?durum=başarısız");
		}
	}else{
		$messages_roleid=0;
		$query = $db->prepare("INSERT INTO messages SET
			messages_content = ?,
			messages_subject = ?,
			messages_email = ?,
			messages_name = ?,
			messages_roleid=?
			");
		$insert = $query->execute(array(
			$_POST['messages_content'], $_POST['messages_subject'], $_POST['users_email'], $_POST['users_name'],$messages_roleid
		));
		if ( $insert ){
			$last_id = $db->lastInsertId();
			Header("Location:../../contact.php?durum=başarılı");

		}else{
			Header("Location:../../contact.php?durum=başarısız");
		}
	}
}

if (isset($_POST['kullaniciduzenle'])) {

	$id=$_POST['users_id'];
	$roleid=2;
	$kullaniciduzenle=$db->prepare("UPDATE users SET
		users_name=:users_name,
		users_email=:users_email,
		users_address=:users_address,
		users_password=:users_password,
		users_roleid=:users_roleid
		WHERE users_id={$_POST['users_id']}");

	$update=$kullaniciduzenle->execute(array(
		'users_name' => $_POST['users_name'],
		'users_email' => $_POST['users_email'],
		'users_address' => $_POST['users_address'],
		'users_password' => $_POST['users_password'],
		'users_roleid' => $roleid
	));


	if ($update) {

		Header("Location:../../logout.php?id=$id&durum=ok");

	} else {

		Header("Location:../../logout.php?id=$id&durum=no");
	}

}
if (isset($_POST['duyurukaydet'])) {


	$uploads_dir = '../dimg/duyurular';
	@$tmp_name = $_FILES['mainnotification_path']["tmp_name"];
	@$name = $_FILES['mainnotification_path']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizsayi5=rand(20000,32000);		
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4.$benzersizsayi5;
	$refimgyol=substr($uploads_dir,3)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$kaydet=$db->prepare("INSERT INTO mainnotification SET
		mainnotification_name=:mainnotification_name,
		mainnotification_status=:mainnotification_status,
		mainnotification_path=:mainnotification_path,
		mainnotification_content=:mainnotification_content

		
		");
	$insert=$kaydet->execute(array(
		'mainnotification_name' => $_POST['mainnotification_name'],
		'mainnotification_status' => $_POST['mainnotification_status'],
		'mainnotification_path' => $refimgyol,
		'mainnotification_content' => $_POST['mainnotification_content']
	));

	if ($insert) {

		Header("Location:../production/duyurular.php?durum=ok");

	} else {

		Header("Location:../production/duyurular.php?durum=no");
	}




}
if ($_GET['duyurusil']=="ok") {

	$sil=$db->prepare("DELETE from mainnotification where mainnotification_id=:mainnotification_id");
	$kontrol=$sil->execute(array(
		'mainnotification_id' => $_GET['mainnotification_id']
	));


	if ($kontrol) {


		header("location:../production/duyurular.php?sil=ok");


	} else {

		header("location:../production/duyurular.php?sil=no");

	}


}
if ($_GET['mainnotification_status']=="ok") {

	
	$duzenle=$db->prepare("UPDATE mainnotification SET
		mainnotification_status=:mainnotification_status
		WHERE mainnotification_id={$_GET['mainnotification_id']}");

	$update=$duzenle->execute(array(
		'mainnotification_status' => $_GET['mainnotification_sts']
	));


	if ($update) {

		Header("Location:../production/duyurular.php?id=$id&durum=ok");

	} else {

		Header("Location:../production/duyurular.php?id=$id&durum=no");
	}

}
if (isset($_POST['duyuruduzenle'])) {

	$id=$_POST['mainnotification_id'];
	
	$ayarkaydet=$db->prepare("UPDATE menu SET
		mainnotification_name=:mainnotification_name,
		mainnotification_content=:mainnotification_content,
		mainnotification_status=:mainnotification_status
		WHERE mainnotification_id={$_POST['mainnotification_id']}");

	$update=$ayarkaydet->execute(array(
		'mainnotification_name' => $_POST['mainnotification_name'],
		'mainnotification_content' => $_POST['mainnotification_content'],
		'mainnotification_status' => $_POST['mainnotification_status']
	));


	if ($update) {

		Header("Location:../production/duyurular.php?id=$id&durum=ok");

	} else {

		Header("Location:../production/duyurular.php?id=$id&durum=no");
	}

}


if (isset($_POST['sepetekle'])) {
	$id=$_POST['basket_productid'];
	if(!isset($_SESSION['users_email']))
	{
		$arrBasket = $_SESSION['basket'];
		array_push($arrBasket, array(
			'basket_productid' => $_POST['basket_productid'],
			'basket_userid' => $_POST['basket_userid']
		));
		$_SESSION['basket'] = $arrBasket;
	}
	else{

		$temp = $db->prepare("select * from basket where basket_productid=:pid and basket_userid=:uid and basket_status=0");
		$temp->execute(array(
			'pid' => $_POST['basket_productid'],
			'uid' => $_POST['basket_userid']
		));
		$rows = $temp->fetchAll(PDO::FETCH_ASSOC);

		$count =   $temp->rowCount();

		if($count > 0)
		{
			$temp = $db->prepare("update basket set basket_piece=basket_piece+1 where basket_id=:id");
			$temp->execute(array(
				'id' => $rows[0]['basket_id']
			));
			$insert = false;
		}
		else
		{
			$ayarekle=$db->prepare("INSERT INTO basket SET
				basket_piece=:basket_piece,
				basket_userid=:basket_userid,
				basket_productid=:basket_productid	

				");

			$insert=$ayarekle->execute(array(
				'basket_piece' => $_POST['basket_piece'],
				'basket_userid' => $_POST['basket_userid'],
				'basket_productid' => $_POST['basket_productid']

			));
		}




	}


	if ($insert or $count > 0) {

		Header("Location:../../cart.php?id=$id&durum=ok");
		Header("Location:../../allproduct.php");

	} else {

		Header("Location:../../cart.php?id=$id&durum=no");

		Header("Location:../../allproduct.php");
	}

}

if (isset($_POST['favorikaydet'])) {
	$id=$_POST['favorite_productid'];

	$ayarekle=$db->prepare("INSERT INTO favorite SET
		favorite_userid=:favorite_userid,
		favorite_productid=:favorite_productid
		
		");

	$insert=$ayarekle->execute(array(
		'favorite_userid' => $_POST['favorite_userid'],
		'favorite_productid' => $_POST['favorite_productid']
		
	));


	if ($insert) {

		Header("Location:../../favori.php?id=$id&durum=ok");
		

	} else {

		Header("Location:../../favori.php?id=$id&durum=no");

		
	}

}

	if(isset($_POST['kategoripromosyonkaydet'])) {
		$category_promotion=$_POST['category_promosyon'];
		$category_categoryid=$_POST['category_id'];

		$ürünekle=$db->prepare("UPDATE product SET
			product_price=product_price*(100-?)/100 where
			product_categoryid=?

			");

		$insert=$ürünekle->execute(array(
			$category_promotion,
			$category_categoryid

		));


		if ($insert) {

			Header("Location:../production/promosyonlar.php?durum=ok");

		} else {

			Header("Location:../production/promosyonlar.php?durum=no");
		}



	} 
	if(isset($_POST['urunpromosyonkaydet'])) {
		$product_promotion=$_POST['product_promosyon'];
		$product_id=$_POST['product_id'];

		$ürünekle=$db->prepare("UPDATE product SET
			product_price=product_price*(100-?)/100 where
			product_id=?

			");

		$insert=$ürünekle->execute(array(
			$product_promotion,
			$product_id

		));


		if ($insert) {

			Header("Location:../production/promosyonlar.php?durum=ok");

		} else {

			Header("Location:../production/promosyonlar.php?durum=no");
		}



	} 

	?>