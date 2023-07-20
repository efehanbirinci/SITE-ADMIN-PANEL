<?php 
namespace Verot\Upload;
session_Start();
ob_start();
include 'baglan.php';
include 'class.upload.php';

//Site Genel Ayarlarının Yapıldığı Bölüm

if(isset($_POST['siteayarkaydet']))
{
    
    $ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_author=:ayar_author,
        ayar_footeryazi=:ayar_footeryazi
        WHERE ayar_id=0");

	$update=$ayarkaydet->execute([
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_author' => $_POST['ayar_author'],
        'ayar_footeryazi' => $_POST['ayar_footeryazi']
        
        ]);

        if($update)
        {
            header("Location:../production/genel-ayar.php?durum=ok");
            exit;
        }
        else
        {
            header("Location:../production/genel-ayar.php?durum=no");
            exit;
        }

}

    //İletişim  Ayarlarının Yapıldığı Yer

        if(isset($_POST['iletisimayarkaydet']))
{
    
    $ayarkaydet=$db->prepare("UPDATE ayar SET
		
        ayar_tel=:ayar_tel,
        ayar_mail=:ayar_mail,
        ayar_il=:ayar_il,
        ayar_ilce=:ayar_ilce,
        ayar_adres=:ayar_adres,
        ayar_mesai=:ayar_mesai,
        ayar_maps=:ayar_maps,
        ayar_facebook=:ayar_facebook,
        ayar_instagram=:ayar_instagram,
        ayar_whatsapp=:ayar_whatsapp
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute([
		
        'ayar_tel'=> $_POST['ayar_tel'],
        'ayar_mail' => $_POST['ayar_mail'],
        'ayar_il' => $_POST["ayar_il"],
        'ayar_ilce' => $_POST['ayar_ilce'],
        'ayar_adres' => $_POST["ayar_adres"],
        'ayar_mesai' => $_POST['ayar_mesai'],
        'ayar_maps' => $_POST['ayar_maps'],
        'ayar_facebook'=> $_POST['ayar_facebook'],
        'ayar_instagram' => $_POST['ayar_instagram'],
        'ayar_whatsapp' => $_POST['ayar_whatsapp']


		]);

        if ($update) {

            header("Location:../production/iletisim-ayar.php?durum=ok");
            exit;
    
        } else {
    
            header("Location:../production/iletisim-ayar.php?durum=no");
            exit;
        }



}   
    //Login Ayarlarının Yapıldığı Yer

    if(isset($_POST['admingiris']))
{
    $kullanici_mail = $_POST['kullanici_mail'];
    $kullanici_password = $_POST['kullanici_password'];
      
    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:kullanici_mail AND kullanici_password=:kullanici_password AND kullanici_durum=:kullanici_durum");
    $kullanicisor->bindParam(':kullanici_mail', $kullanici_mail);
    $kullanicisor->bindParam(':kullanici_password', $kullanici_password);
    $kullanicisor->bindValue(':kullanici_durum', 1);
    $kullanicisor->execute();
      
    $say = $kullanicisor->rowCount();
    $kullanici = $kullanicisor->fetch(\PDO::FETCH_ASSOC);

    if($say == 1)
    {
        $_SESSION['userkullanici_mail'] = $kullanici_mail;
        $_SESSION['userkullanici_adsoyad']=$kullanici['kullanici_adsoyad'];
        $_SESSION['userkullanici_gsm']=$kullanici['kullanici_gsm'];
        $_SESSION['userkullanici_durum']=$kullanici['durum'];
        $_SESSION['userkullanici_yetki']=$kullanici['kullanici_yetki'];

        header("Location:../production/index.php");
        exit();
    }
    else
    {
        header("Location:../production/login.php?durum=basarisizgiris");
        exit;
    }
}


    //Hakkımızda Ayarlarının Yapıldığı Yer

if (isset($_POST['hakkimizdakaydet'])) {
	
	
	$hakkimizdakaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon
		WHERE hakkimizda_id=0");

	$update=$hakkimizdakaydet->execute(array(
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
		'hakkimizda_video' => $_POST['hakkimizda_video'],
		'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
		));


	if ($update) {

		header("Location:../production/hakkimizda.php?durum=ok");
        exit;

	} else {

		header("Location:../production/hakkimizda.php?durum=no");
        exit;
	}
	
}

    //Site Logo Ayarlarının Yapıldığı Yer

if(isset($_POST["sitelogokaydet"]))
{
    $dosyaAdi = $_FILES['logo_resimyol']['name'];
    $resimyolu= pathinfo($dosyaAdi, PATHINFO_FILENAME);
    $uzanti = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
    //Dosyaların karışmaması için dosyaya rastgele isim verdim
    $benzersizsayi4=rand(20000,32000);

    //Uzantıya göre dosyaya isim verdik
    $eskidosyaadi=$resimyolu.".".$uzanti;
    $yenidosyaadi=$benzersizsayi4.".".$uzanti;

    rename($eskidosyaadi,$yenidosyaadi);

    

    $foo = new Upload($_FILES['logo_resimyol']); 
    if ($foo->uploaded) {

        $foo->file_new_name_body = $benzersizsayi4;
        $foo->process('../../dist/img/logo');
       
       if ($foo->processed) {
        
       } else {
         echo 'error : ' . $foo->error;
       }
    }
   
  

$duzenle = $db->prepare("UPDATE logo SET logo_resimyol=:logo_resimyol");
$update = $duzenle->execute(array('logo_resimyol' => $yenidosyaadi));

if ($update) {
    
    header('Location:../production/genel-ayar.php?durum=ok');
} else {
    header('Location:../production/genel-ayar.php?durum=no');
}


};


//Site Başlık Logosu Ayarlarının Yapıldığı Yer

    if(isset($_POST["sitetitlelogokaydet"]))
{
    $dosyaAdi = $_FILES['titlelogo_resimyol']['name'];
    $resimyolu= pathinfo($dosyaAdi, PATHINFO_FILENAME);
    $uzanti = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
    //Dosyaların karışmaması için dosyaya rastgele isim verdim
    $benzersizsayi4=rand(20000,32000);

    //Uzantıya göre dosyaya isim verdik
    $eskidosyaadi=$resimyolu.".".$uzanti;
    $yenidosyaadi=$benzersizsayi4.".".$uzanti;

    rename($eskidosyaadi,$yenidosyaadi);

    

    $foo = new Upload($_FILES['titlelogo_resimyol']); 
    if ($foo->uploaded) {

        $foo->file_new_name_body = $benzersizsayi4;
        $foo->process('../../dist/img/titlelogo');
       
       if ($foo->processed) {
        
       } else {
         echo 'error : ' . $foo->error;
       }
    }
   
  

$duzenle = $db->prepare("UPDATE titlelogo SET titlelogo_resimyol=:titlelogo_resimyol");
$update = $duzenle->execute(array('titlelogo_resimyol' => $yenidosyaadi));

if ($update) {    
    
    header('Location:../production/genel-ayar.php?durum=ok');
} else {
    header('Location:../production/genel-ayar.php?durum=no');
}


	
};



if(isset($_POST["sitebeyazlogokaydet"]))
{
    $dosyaAdi = $_FILES['whitelogo_resimyol']['jpg'];
    $resimyolu= pathinfo($dosyaAdi, PATHINFO_FILENAME);
    $uzanti = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
    //Dosyaların karışmaması için dosyaya rastgele isim verdim
    $benzersizsayi4=rand(20000,32000);

    //Uzantıya göre dosyaya isim verdik
    $eskidosyaadi=$resimyolu.".".$uzanti;
    $yenidosyaadi=$benzersizsayi4.".".$uzanti;

    rename($eskidosyaadi,$yenidosyaadi);

    

    $foo = new Upload($_FILES['whitelogo_resimyol']); 
    if ($foo->uploaded) {

        $foo->file_new_name_body = $benzersizsayi4;
        $foo->process('../../dist/img/whitelogo');
       
       if ($foo->processed) {
        
       } else {
         echo 'error : ' . $foo->error;
       }
    }
   
  

$duzenle = $db->prepare("UPDATE whitelogo SET whitelogo_resimyol=:whitelogo_resimyol ");
$update = $duzenle->execute(array('whitelogo_resimyol' => $yenidosyaadi));

if ($update) {
    
    header('Location:../production/genel-ayar.php?durum=ok');
} else {
    header('Location:../production/genel-ayar.php?durum=no');
}


};
 //Kullanıcı Ekleme Yeri

 if(isset($_POST['kullaniciekle']))
 {
    

    $kullanicikaydet=$db->prepare("INSERT INTO kullanici SET 
    
    kullanici_adsoyad=:kullanici_adsoyad,
    kullanici_mail=:kullanici_mail,
    kullanici_gsm=:kullanici_gsm,
    kullanici_password=:kullanici_password,
    kullanici_yetki=:kullanici_yetki,
    kullanici_durum=:kullanici_durum
    ");
    
    $kaydet=$kullanicikaydet->execute([

    'kullanici_adsoyad'=>$_POST['kullanici_adsoyad'],  
    'kullanici_mail' => $_POST['kullanici_mail'],
    'kullanici_gsm' => $_POST['kullanici_gsm'],
    'kullanici_password'=>$_POST['kullanici_password'],
    'kullanici_yetki'=>$_POST['kullanici_yetki'],
    'kullanici_durum'=>$_POST['kullanici_durum']
    ]);

    if($kaydet)
    {
        header('location:../production/kullanicilar.php?durum=ok');
        exit;
    }
    else
    {
        header('location:../production/kullanicilar.php?durum=no');
        exit;
    }





 };


// Kullanıcı Düzenleme Yeri
		
if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_adsoyad=:kullanici_adsoyad,
        kullanici_mail=:kullanici_mail,
        kullanici_gsm=:kullanici_gsm,
        kullanici_password=:kullanici_password,
        kullanici_yetki=:kullanici_yetki,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id=:kullanici_id");

	$update=$ayarkaydet->execute(array(
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
        'kullanici_mail' => $_POST['kullanici_mail'],
        'kullanici_gsm' => $_POST['kullanici_gsm'],
        'kullanici_password' => $_POST['kullanici_password'],
        'kullanici_yetki' => $_POST['kullanici_yetki'],
		'kullanici_durum' => $_POST['kullanici_durum'],
        'kullanici_id' => $_POST['kullanici_id']
		));


	if ($update) {

		Header("Location:../production/kullanicilar.php?kullanici_id=$kullanici_id&durum=ok");
        exit;

	} else {

		Header("Location:../production/kullanicilar.php?kullanici_id=$kullanici_id&durum=no");
        exit;
	}

};
   
//Kullanıcı Silme Yeri

 if(isset($_GET['silmeislemi'])=='ok')
 {

    $sil=$db->prepare("DELETE FROM kullanici WHERE kullanici_id=:kullanici_id");
    $kontrol = $sil->execute([

        'kullanici_id' => $_GET['kullanici_id']



    ]);
    if($kontrol)
    {
        header("location:../production/kullanicilar.php?durum=ok");
        exit;
    }
    else
    {
        header("Location:../production/kullanicilar.php?durum=no");

    }
    




//Api Ayar Kaydetme Yeri 

 };
 if(isset($_POST['apiayarkaydet']))
{
    
    $ayarkaydet=$db->prepare("UPDATE ayar SET
		
        ayar_keywords=:ayar_keywords,
        ayar_analystic=:ayar_analystic,
        ayar_zopim=:ayar_zopim
        WHERE ayar_id=0");

	$update=$ayarkaydet->execute([
		
        'ayar_keywords'=> $_POST['ayar_keywords'],
        'ayar_analystic' => $_POST['ayar_analystic'],
        'ayar_zopim' => $_POST["ayar_zopim"]
        
        ]);

        if ($update) {

            header("Location:../production/api-ayar.php?durum=ok");
            exit;
    
        } else {
    
            header("Location:../production/api-ayar.php?durum=no");
            exit;
        }
    }



    //Mail Ayar Kaydetme Yeri

    if(isset($_POST['mailayarkaydet']))
{
    
    $ayarkaydet=$db->prepare("UPDATE ayar SET
		
        ayar_smtphost=:ayar_smtphost,
        ayar_smtppassword=:ayar_smtppassword,
        ayar_smtpport=:ayar_smtpport
        WHERE ayar_id=0");

	$update=$ayarkaydet->execute([
		
        'ayar_smtphost'=> $_POST['ayar_smtphost'],
        'ayar_smtppassword' => $_POST['ayar_smtppassword'],
        'ayar_smtpport' => $_POST["ayar_smtpport"]
        
        ]);

        if ($update) {

            header("Location:../production/mail-ayar.php?durum=ok");
            exit;
    
        } else {
    
            header("Location:../production/mail-ayar.php?durum=no");
            exit;
        }
    }


   

    //Slider Ekleme Yeri

    if (isset($_POST['sliderkaydet'])) {

        $dosyaAdi = $_FILES['slider_resimyol']['name'];
        $resimyolu= pathinfo($dosyaAdi, PATHINFO_FILENAME);
        $uzanti = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
        //Dosyaların karışmaması için dosyaya rastgele isim verdim
        $benzersizsayi4=rand(20000,32000);

        //Uzantıya göre dosyaya isim verdik
        $eskidosyaadi=$resimyolu.".".$uzanti;
        $yenidosyaadi=$benzersizsayi4.".".$uzanti;

        rename($eskidosyaadi,$yenidosyaadi);

        

        $foo = new Upload($_FILES['slider_resimyol']); 
        if ($foo->uploaded) {

            $foo->file_new_name_body = $benzersizsayi4;
            $foo->process('../../dist/img/slider');
           
           if ($foo->processed) {
            
           } else {
             echo 'error : ' . $foo->error;
           }
        }
       
      
        
    
    
        $kaydet=$db->prepare("INSERT INTO slider SET
            slider_ad=:slider_ad,
            slider_sira=:slider_sira,
            slider_url=:slider_url,
            slider_durum=:slider_durum,
            slider_resimyol=:slider_resimyol
            ");
        $insert=$kaydet->execute(array(
            'slider_ad' => $_POST['slider_ad'],
            'slider_sira' => $_POST['slider_sira'],
            'slider_url' => $_POST['slider_url'],
            'slider_durum' => $_POST['slider_durum'],
            'slider_resimyol' => $yenidosyaadi
            ));
    
        if ($insert) {
    
            Header("Location:../production/slider-ayar.php?durum=ok");
    
        } else {
    
            Header("Location:../production/slider-ayar.php?durum=no");
        }
    
    
    
    
    }

    //Slider Silme Yeri

    if(isset($_GET['slidersil'])=='ok')
    {

        $slidersil=$db->prepare("DELETE FROM slider WHERE slider_resimyol=:slider_resimyol");

        $slideryoket=$slidersil->execute([
        
        'slider_resimyol' => $_GET['slider_resimyol']
        
        
        ]);
    if($slideryoket)
    {
        unlink("../../dist/img/slider/".$_GET['slider_resimyol']);
        header("location:../production/slider-ayar.php?durum=ok");
    }
    else
    {
        header("location:../production/slider-ayar.php?durum=no");
    }

    };




    //Slider Düzenleme Yeri 

if(isset($_POST['sliderduzenle']))
{
        
        $dosyaAdi = $_FILES['slider_resimyol']['name'];
        $resimyolu= pathinfo($dosyaAdi, PATHINFO_FILENAME);
        $uzanti = pathinfo($dosyaAdi, PATHINFO_EXTENSION);

        //Dosyaların karışmaması için dosyaya rastgele isim verdim
        $benzersizsayi4=rand(20000,32000);


        $eskidosyaadi=$resimyolu.".".$uzanti;
        $yenidosyaadi=$benzersizsayi4.".".$uzanti;

        rename($eskidosyaadi,$yenidosyaadi);
       
        $foo = new Upload($_FILES['slider_resimyol']); 
        if ($foo->uploaded) {

            $foo->file_new_name_body = $benzersizsayi4;
            $foo->process('../../dist/img/slider');
           
           if ($foo->processed) {
            
           } else {
             echo 'error : ' . $foo->error;
           }
        }
       
       



    $sliderid=$_POST['slider_id'];

    $slidercek=$db->prepare("UPDATE slider SET
        slider_ad=:slider_ad,
        slider_resimyol=:slider_resimyol,
        slider_sira=:slider_sira,
        slider_url=:slider_url,
        slider_durum=:slider_durum
        WHERE slider_id=:slider_id");
    $sliderduzenle=$slidercek->execute([
        'slider_ad' => $_POST['slider_ad'],
        'slider_resimyol'=> $yenidosyaadi,
        'slider_sira' => $_POST['slider_sira'],
        'slider_url' => $_POST['slider_url'],
        'slider_durum' => $_POST['slider_durum'],
        'slider_id' => $_POST['slider_id']]);

    if($sliderduzenle)
    {
        header("location:../production/slider-ayar.php?slider_id=$sliderid&durum=ok");
    }
    else
    {
        header("location:../production/slider-ayar.php?slider_id=$sliderid&durum=no");
   };



}


//Referans Ekleme Yeri

if (isset($_POST['referanskaydet'])) {

    $dosyaAdi = $_FILES['referans_resimyol']['name'];
    $resimyolu= pathinfo($dosyaAdi, PATHINFO_FILENAME);
    $uzanti = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
    //Dosyaların karışmaması için dosyaya rastgele isim verdim
    $benzersizsayi4=rand(20000,32000);

    //Uzantıya göre dosyaya isim verdik
    $eskidosyaadi=$resimyolu.".".$uzanti;
    $yenidosyaadi=$benzersizsayi4.".".$uzanti;

    rename($eskidosyaadi,$yenidosyaadi);

    

    $foo = new Upload($_FILES['referans_resimyol']); 
    if ($foo->uploaded) {

        $foo->file_new_name_body = $benzersizsayi4;
        $foo->process('../../dist/img/referans');
       
       if ($foo->processed) {
        
       } else {
         echo 'error : ' . $foo->error;
       }
    }
   
  
    


    $kaydet=$db->prepare("INSERT INTO referans SET
        referans_ad=:referans_ad,
        referans_sira=:referans_sira,
        referans_url=:referans_url,
        referans_durum=:referans_durum,
        referans_resimyol=:referans_resimyol
        ");
    $insert=$kaydet->execute(array(
        'referans_ad' => $_POST['referans_ad'],
        'referans_sira' => $_POST['referans_sira'],
        'referans_url' => $_POST['referans_url'],
        'referans_durum' => $_POST['referans_durum'],
        'referans_resimyol' => $yenidosyaadi
        ));

    if ($insert) {

        Header("Location:../production/referans-ayar.php?durum=ok");

    } else {

        Header("Location:../production/referans-ayar.php?durum=no");
    }




}

//Referans Silme Yeri

if(isset($_GET['referanssil'])=='ok')
{

    $referanssil=$db->prepare("DELETE FROM referans WHERE referans_resimyol=:referans_resimyol");

    $referansyoket=$referanssil->execute([
    
    'referans_resimyol' => $_GET['referans_resimyol']
    
    
    ]);
if($referansyoket)
{
    unlink("../../dist/img/referans/".$_GET['referans_resimyol']);
    header("location:../production/referans-ayar.php?durum=ok");
}
else
{
    header("location:../production/referans-ayar.php?durum=no");
}

};




//Referans Düzenleme Yeri 

if(isset($_POST['referansduzenle']))
{
    
    $dosyaAdi = $_FILES['referans_resimyol']['name'];
    $resimyolu= pathinfo($dosyaAdi, PATHINFO_FILENAME);
    $uzanti = pathinfo($dosyaAdi, PATHINFO_EXTENSION);

    //Dosyaların karışmaması için dosyaya rastgele isim verdim
    $benzersizsayi4=rand(20000,32000);


    $eskidosyaadi=$resimyolu.".".$uzanti;
    $yenidosyaadi=$benzersizsayi4.".".$uzanti;

    rename($eskidosyaadi,$yenidosyaadi);
   
    $foo = new Upload($_FILES['referans_resimyol']); 
    if ($foo->uploaded) {

        $foo->file_new_name_body = $benzersizsayi4;
        $foo->process('../../dist/img/referans');
       
       if ($foo->processed) {
        
       } else {
         echo 'error : ' . $foo->error;
       }
    }
   
   



$referansid=$_POST['referans_id'];

$referanscek=$db->prepare("UPDATE referans SET
    referans_ad=:referans_ad,
    referans_resimyol=:referans_resimyol,
    referans_sira=:referans_sira,
    referans_url=:referans_url,
    referans_durum=:referans_durum
    WHERE referans_id=:referans_id");
$referansduzenle=$referanscek->execute([
    'referans_ad' => $_POST['referans_ad'],
    'referans_resimyol'=> $yenidosyaadi,
    'referans_sira' => $_POST['referans_sira'],
    'referans_url' => $_POST['referans_url'],
    'referans_durum' => $_POST['referans_durum'],
    'referans_id' => $_POST['referans_id']]);

if($referansduzenle)
{
    header("location:../production/referans-ayar.php?referans_id=$referansid&durum=ok");
}
else
{
    header("location:../production/referans-ayar.php?referans_id=$referansid&durum=no");
};



}

//Blog Ekleme Yeri

if (isset($_POST['blogkaydet'])) {

    $dosyaAdi = $_FILES['blog_resimyol']['name'];
    $resimyolu= pathinfo($dosyaAdi, PATHINFO_FILENAME);
    $uzanti = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
    //Dosyaların karışmaması için dosyaya rastgele isim verdim
    $benzersizsayi4=rand(20000,32000);

    //Uzantıya göre dosyaya isim verdik
    $eskidosyaadi=$resimyolu.".".$uzanti;
    $yenidosyaadi=$benzersizsayi4.".".$uzanti;

    rename($eskidosyaadi,$yenidosyaadi);

    

    $foo = new Upload($_FILES['blog_resimyol']); 
    if ($foo->uploaded) {

        $foo->file_new_name_body = $benzersizsayi4;
        $foo->process('../../dist/img/blog');
       
       if ($foo->processed) {
        
       } else {
         echo 'error : ' . $foo->error;
       }
    }
   
  
    


    $kaydet=$db->prepare("INSERT INTO blog SET
       blog_ad=:blog_ad,
        blog_sira=:blog_sira,
        blog_url=:blog_url,
        blog_durum=:blog_durum,
        blog_resimyol=:blog_resimyol
        ");
    $insert=$kaydet->execute(array(
        'blog_ad' => $_POST['blog_ad'],
        'blog_sira' => $_POST['blog_sira'],
        'blog_url' => $_POST['blog_url'],
        'blog_durum' => $_POST['blog_durum'],
        'blog_resimyol' => $yenidosyaadi
        ));

    if ($insert) {

        Header("Location:../production/blog-ayar.php?durum=ok");

    } else {

        Header("Location:../production/blog-ayar.php?durum=no");
    }




}

//blog Silme Yeri

if(isset($_GET['blogsil'])=='ok')
{

    $blogsil=$db->prepare("DELETE FROM blog WHERE blog_resimyol=:blog_resimyol");

    $blogyoket=$blogsil->execute([
    
    'blog_resimyol' => $_GET['blog_resimyol']
    
    
    ]);
if($blogyoket)
{
    unlink("../../dist/img/blog/".$_GET['blog_resimyol']);
    header("location:../production/blog-ayar.php?durum=ok");
}
else
{
    header("location:../production/blog-ayar.php?durum=no");
}

};




//blog Düzenleme Yeri 

if(isset($_POST['blogduzenle']))
{
    
    $dosyaAdi = $_FILES['blog_resimyol']['name'];
    $resimyolu= pathinfo($dosyaAdi, PATHINFO_FILENAME);
    $uzanti = pathinfo($dosyaAdi, PATHINFO_EXTENSION);

    //Dosyaların karışmaması için dosyaya rastgele isim verdim
    $benzersizsayi4=rand(20000,32000);


    $eskidosyaadi=$resimyolu.".".$uzanti;
    $yenidosyaadi=$benzersizsayi4.".".$uzanti;

    rename($eskidosyaadi,$yenidosyaadi);
   
    $foo = new Upload($_FILES['blog_resimyol']); 
    if ($foo->uploaded) {

        $foo->file_new_name_body = $benzersizsayi4;
        $foo->process('../../dist/img/blog');
       
       if ($foo->processed) {
        
       } else {
         echo 'error : ' . $foo->error;
       }
    }
   
   



$blogid=$_POST['blog_id'];

$blogcek=$db->prepare("UPDATE blog SET
    blog_ad=:blog_ad,
    blog_resimyol=:blog_resimyol,
    blog_sira=:blog_sira,
    blog_url=:blog_url,
    blog_durum=:blog_durum
    WHERE blog_id=:blog_id");
$blogduzenle=$blogcek->execute([
    'blog_ad' => $_POST['blog_ad'],
    'blog_resimyol'=> $yenidosyaadi,
    'blog_sira' => $_POST['blog_sira'],
    'blog_url' => $_POST['blog_url'],
    'blog_durum' => $_POST['blog_durum'],
    'blog_id' => $_POST['blog_id']]);

if($blogduzenle)
{
    header("location:../production/blog-ayar.php?blog_id=$blogid&durum=ok");
}
else
{
    header("location:../production/blog-ayar.php?blog_id=$blogid&durum=no");
};


};

if(isset($_POST['blogayarkaydet']))


{
    $blogkaydet=$db->prepare("UPDATE ayar SET
		ayar_blog_baslik=:blog_baslik,
		ayar_blog_aciklama=:blog_aciklama
		
		");

	$update=$blogkaydet->execute(array(
		'blog_baslik' => $_POST['blog_baslik'],
		'blog_aciklama' => $_POST['blog_aciklama']
		
		));


	if ($update) {

		header("Location:../production/blog-ayar.php?durum=ok");
        exit;

	} else {

		header("Location:../production/blog-ayar.php?durum=no");
        exit;
	}

};

if(isset($_POST['hizmetkaydet']))
{
    $hizmetekle=$db->prepare("INSERT INTO hizmetler SET
    hizmet_baslik=:hizmet_baslik,
    hizmet_icon=:hizmet_icon,
    hizmet_aciklama=:hizmet_aciklama,
    hizmet_url=:hizmet_url,
    hizmet_sira=:hizmet_sira,
    hizmet_durum=:hizmet_durum
    ");

    $insert=$hizmetekle->execute(array(
        'hizmet_baslik'=>$_POST['hizmet_baslik'],
        'hizmet_icon'=>$_POST['hizmet_icon'],
        'hizmet_aciklama'=>$_POST['hizmet_aciklama'],
        'hizmet_url'=>$_POST['hizmet_url'],
        'hizmet_sira'=>$_POST['hizmet_sira'],
        'hizmet_durum'=>$_POST['hizmet_durum']
    ));

        if ($insert) {

            header("Location:../production/hizmet-ayar.php?durum=ok");
            exit;
    
        } else {
    
            header("Location:../production/hizmet-ayar.php?durum=no");
            exit;
        }

    

}

if (isset($_POST['hizmetduzenle'])) 
{
    $hizmetguncelle=$db->prepare("UPDATE hizmetler set
    hizmet_baslik=:hizmet_baslik,
    hizmet_icon=:hizmet_icon,
    hizmet_aciklama=:hizmet_aciklama,
    hizmet_url=:hizmet_url,
    hizmet_sira=:hizmet_sira,
    hizmet_durum=:hizmet_durum
    WHERE hizmet_id=:hizmet_id
    ");

    $update=$hizmetguncelle->execute([
        'hizmet_baslik'=>$_POST['hizmet_baslik'],
        'hizmet_icon'=>$_POST['hizmet_icon'],
        'hizmet_aciklama'=>$_POST['hizmet_aciklama'],
        'hizmet_url'=>$_POST['hizmet_url'],
        'hizmet_sira'=>$_POST['hizmet_sira'],
        'hizmet_durum'=>$_POST['hizmet_durum'],
        'hizmet_id'=>$_POST['hizmet_id']
        
    ]);

    if ($update) {

        header("Location:../production/hizmet-ayar.php?durum=ok");
        exit;

    } else {

        header("Location:../production/hizmet-ayar.php?durum=no");
        exit;
    }
}


    if(isset($_GET['hizmetsil'])=='ok')
    {

        $blogsil=$db->prepare("DELETE FROM hizmetler WHERE hizmet_id=:hizmet_id");

        $blogyoket=$blogsil->execute([
        
        'hizmet_id' => $_GET['hizmet_id']
        
        
        ]);
    if($blogyoket)
    {
        header("location:../production/hizmet-ayar.php?durum=ok");
    }
    else
    {
        header("location:../production/hizmet-ayar.php?durum=no");
    }

    };


    if(isset($_POST['contactkaydet']))
    {
        $contactekle=$db->prepare("INSERT INTO contact set
        
        contact_name=:contact_name,
        contact_mail=:contact_mail,
        contact_tel=:contact_tel,
        contact_message=:contact_message
        
        
        ");

        $kaydet=$contactekle->execute([
        'contact_name' => $_POST['contact_name'],
        'contact_mail' => $_POST['contact_mail'],
        'contact_tel'  => $_POST['contact_tel'],
        'contact_message' => $_POST['contact_message']
        ]);

        if($kaydet )
        {
            header("location:../../contact.php?durum=ok");
        }
        else
        {
            header("location:../../contact.php?durum=no");
        }
    }

    $contactsor=$db->prepare("SELECT * FROM contact");
    $contactcek=$contactsor->fetchAll(\PDO::FETCH_ASSOC);

    if(isset($_POST["contactsil"]))
    
    {
        $contact_ids=$_POST['contact_ids'];
        foreach($contact_ids as $cid){

        $contactsil=$db->prepare("DELETE FROM contact where contact_id=:contact_id");
        $sil=$contactsil->execute([
            'contact_id' => $_POST['contact_ids'] 
        ]);

        if($sil)
        {
            header("location:../production/mail-ayar.php?durum=ok"); 
        }
        else
        {
            header("location:../production/mail-ayar.php?durum=no");
        }
        }
    }
    elseif(!$_POST["contactsil"])
    {
        header("location:../production/mail-ayar.php");    
    }
   

    

    










?>