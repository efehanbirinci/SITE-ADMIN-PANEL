<?php 
//Veritabanı Bağlantısının Yapıldığı Yer
try {

	$db=new PDO("mysql:host=localhost;dbname=jetkolay;charset=utf8",'root','');
	//echo "veritabanı bağlantısı başarılı";
}

catch (PDOExpception $e) {

	echo $e->getMessage();
}


 ?>