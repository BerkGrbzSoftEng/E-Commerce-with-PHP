<?php
try {

	$db=new PDO("mysql:host=localhost;dbname=saysoft;charset=utf8",'root','abg010203');
	//echo "veritabanı bağlantısı başarılı";
}

catch (PDOExpception $e) {

	echo $e->getMessage();
}
?>