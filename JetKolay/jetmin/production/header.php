<?php 
      //EFEHAN BİRİNCİ-JETKOLAY
      
      include 'fonksiyon.php';
      include("../netting/baglan.php");
      
    
      $sitesor=$db->prepare("SELECT * FROM ayar WHERE ayar_id=:id ");
      $sitesor->execute(['id' => 0]);
      $sitecek=$sitesor->fetch(PDO::FETCH_ASSOC);



      $hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=:hid");
      $hakkimizdasor->execute(['hid' => 0]);
      $hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

      $blogsor=$db->prepare("SELECT * FROM blog");
      $blogsor->execute();
      
      $logosor=$db->prepare("SELECT * FROM logo ");
      $logosor->execute();
      $logocek=$logosor->fetch(PDO::FETCH_ASSOC);

      $titlelogosor=$db->prepare("SELECT * FROM titlelogo ");
      $titlelogosor->execute();
      $titlelogocek=$titlelogosor->fetch(PDO::FETCH_ASSOC);
      
      $whitelogosor=$db->prepare("SELECT * FROM whitelogo ");
      $whitelogosor->execute();
      $whitelogocek=$whitelogosor->fetch(PDO::FETCH_ASSOC);

      $contactsor=$db->prepare("SELECT * FROM contact");
      $contactsor->execute();

      $hizmetsor=$db->prepare("SELECT * FROM hizmetler");
      $hizmetsor->execute();


      $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
      $kullanicisor->execute(array(
        'mail' => $_SESSION['userkullanici_mail']
        ));
      $say=$kullanicisor->rowCount();
      $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

      if($say==0)
      {
        header("location:login.php?durum=izinsiz");
      }
      

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "90<?php echo $sitecek['ayar_whatsapp']; ?>",
            call_to_action: "Merhaba, nasıl yardımcı olabilirim?",
            position: "left",
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo "JETKOLAY PANEL" ?></title>

      <link rel = "icon" href ="../../dist/img/logo/<?php echo $titlelogocek['titlelogo_resimyol'] ?>" 
        type = "image/x-icon">

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bootstrap 4 -->
      <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- JQVMap -->
      <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
      <!-- summernote -->
      <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
      <!-- CK Editör -->
      <script type="text/javascript" src="../../dist/ckeditor/ckeditor.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

  <!-- Preloader -->
  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" style="color:white;">
        <a href="index.php" class="nav-link">Anasayfa</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
      <!-- Messages Dropdown Menu -->
      
          
            
         
          
          
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-cog" aria-hidden="true"></i>
        </a>
          
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-width:111px;"> 
          <a class="dropdown-item">
          <button style="border-color:transparent !important; background-color:transparent !important;"   data-bs-toggle="modal" data-bs-target="#staticBackdrop-profil">
          <i class="fa fa-user" aria-hidden="true"></i>&nbsp Profil
          </button>
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
          <i class="fa fa-times" aria-hidden="true"></i>&nbsp Çıkış Yap
          </a>
          
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside  class="main-sidebar sidebar-dark-primary elevation-4" style="color:red !important;" >
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link" style="display: block; margin: 0 auto; min-height:93px;">
      <img src="../../dist/img/logo/<?php echo $whitelogocek["whitelogo_resimyol"] ?>" alt="Jet Kolay Logo" class="brand-image rounded float-left "style="display: block; margin: 0 auto; min-width:170px ; max-width:243px !important; min-height:68px; max-height:75px;">
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          
          <?php echo $_SESSION['userkullanici_mail'] ?>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li>
          <a href="index.php" class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/JetKolay/jetmin/production/index.php") echo "active"; ?> ">
          <i style="margin-left:5px;" class="fa fa-home" aria-hidden="true"></i>
              <p style="margin-left:13px;">               
              Anasayfa
              </p>
            </a>
          </li>
          <li>
          <a href="genel-ayar.php" class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/JetKolay/jetmin/production/genel-ayar.php") echo "active"; ?> ">
          <i style="margin-left:5px;" class='fas fa-pen-square'></i>
              <p style="margin-left:13px;">               
              Genel Ayarlar
              </p>
            </a>
          </li>
          <li style="margin-top:3px;">
          <a href="iletisim-ayar.php" class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/JetKolay/jetmin/production/iletisim-ayar.php") echo "active"; ?> ">
          <i style="margin-left:5px;" class="fa fa-phone" aria-hidden="true"></i>

              <p style="margin-left:13px;">    
              İletişim Ayarları           
              </p>
            </a>
          </li>
          <li style="margin-top:3px;">
          <a href="hakkimizda.php" class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/JetKolay/jetmin/production/hakkimizda.php") echo "active"; ?>">
          <i style="margin-left:5px;" class="fa fa-book" aria-hidden="true"></i>
            <p style="margin-left:13px;">    
              Hakkımızda Ayarları          
            </p>
            </a>
          </li>
          <li style="margin-top:3px;">
          <a href="api-ayar.php" class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/JetKolay/jetmin/production/api-ayar.php") echo "active"; ?> ">
          <i style="margin-left:5px;" class="fa fa-tasks" aria-hidden="true"></i>
          <p style="margin-left:13px;">    
              Api Ayarları        
            </p>
            </a>
          </li>
          <li style="margin-top:3px;">
          <a href="mail-ayar.php" class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/JetKolay/jetmin/production/mail-ayar.php") echo "active"; ?> ">
          <i style="margin-left:5px;" class="fa fa-envelope" aria-hidden="true"></i>
          <p style="margin-left:13px;">    
              Şikayet ve Öneriler          
          </p>
          </a>
          </li>
          
          <li style="margin-top:3px;">
          <a href="slider-ayar.php" class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/JetKolay/jetmin/production/slider-ayar.php") echo "active"; ?> ">
          <i style="margin-left:5px;" class="fa fa-paint-brush" aria-hidden="true"></i>
            <p style="margin-left:13px;">    
              Slider Ayarları          
            </p>
            </a>
          </li>
          <li style="margin-top:3px;">
          <a href="referans-ayar.php" class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/JetKolay/jetmin/production/referans-ayar.php") echo "active"; ?> ">
          <i style="margin-left:5px;" class="fa fa-handshake" aria-hidden="true"></i>
            <p style="margin-left:13px;">    
              Referans Ayarları          
            </p>
            </a>
          </li>
          <li style="margin-top:3px;">
          <a href="blog-ayar.php" class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/JetKolay/jetmin/production/blog-ayar.php") echo "active"; ?> ">
          <i style="margin-left:5px;" class="fa fa-share-alt-square" aria-hidden="true"></i>
            <p style="margin-left:13px;">    
              Blog Ayarları          
            </p>
            </a>
          </li>
          <li style="margin-top:3px;">
          <a href="hizmet-ayar.php" class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/JetKolay/jetmin/production/hizmet-ayar.php") echo "active"; ?> ">
          <i style="margin-left:5px;" class="fa fa-server" aria-hidden="true"></i>
            <p style="margin-left:13px;">    
              Hizmet Ayarları          
            </p>
            </a>
          </li>
          <li style="margin-top:3px;">
          <a href="kullanicilar.php" class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/JetKolay/jetmin/production/kullanicilar.php") echo "active"; ?> ">
          <i style="margin-left:5px;" class="fa fa-user-circle" aria-hidden="true"></i>
            <p style="margin-left:13px;">    
              Kullanıcı Ayarları          
            </p>
            </a>
          </li>
          
          
          
        </ul>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="modal fade" id="staticBackdrop-profil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-profil" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel-profil">Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                     
                     
                     
                     <div class="form-group">
                         <label for="exampleInputEmail1">Ad Soyad</label>
                         <input type="text" class="form-control" id="exampleInputEmail1" name="kullanici_adsoyad" value="<?php echo $_SESSION['userkullanici_adsoyad'] ?>" readonly >
                       </div>
                       <div class="form-group">
                         <label for="exampleInputPassword1">E Posta Adresi</label>
                         <input type="text" class="form-control" id="exampleInputPassword1" name="kullanici_mail" value="<?php echo $_SESSION['userkullanici_mail'] ?>" readonly >
                       </div>
                       <div class="form-group">
                         <label for="exampleInputPassword1">Telefon Numarası</label>
                         <input type="text" class="form-control" id="exampleInputPassword1" name="kullanici_gsm" value="<?php echo $_SESSION['userkullanici_gsm'] ?>" readonly >
                       </div>
                       <div class="form-group">
                       <label  for="first-name">Kullanıcı Yetkisi
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                       <select id="heard" class="form-control" name="kullanici_yetki" disabled>
 
                        <?php if($kullanicicek['kullanici_yetki']==5){ ?>
                        <option style="color:black;" value="5">Yetkili</option>
                        <option style="color:yellow;" value="1">Personel    </option>
                        <?php  }else{ ?> 
                        
                          <option style="color:yellow;" value="1">Personel</option>
                          <option style="color:black;" value="5">Yetkili</option>
                        <?php } ?>
 
                       </select><br>
                       <label for="exampleInputEmail1">Kullanıcı Durum
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                       <select id="heard" class="form-control" name="kullanici_durum" disabled>
 
                       <?php if($kullanicicek['kullanici_durum']==0)
                       { ?>
                   
                       <option value="0">Pasif</option>
                       <option value="1">Aktif</option>
 
                       <?php  }
 
                        else{ ?>
 
                       <option value="1">Aktif</option>
                       <option value="0">Pasif</option>
                        <?php  }  ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
          </div>
            </div>
              </div>
                </div>
  