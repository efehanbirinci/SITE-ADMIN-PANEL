<?php include("header.php");
include("../netting/baglan.php");
$kullanicisor=$db->prepare("SELECT * FROM kullanici");
$kullanicisor->execute();
$kullanicicek=$kullanicisor->fetchAll(PDO::FETCH_ASSOC);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>JETKOLAY</h1>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div style="widht:100%";>
                    <?php 
             if (isset($_GET["durum"])) {
              
                if($_GET['durum']=='ok')
                { ?>
                  <button onclick="this.parentNode.removeChild(this)"  style="display: block; margin: 0 auto;" type="button" class="btn btn-success">İŞLEM TAMAMLANDI</button>
               <?php  }
                 elseif($_GET['durum']=='no')
                 { ?>
                 <button onclick="this.parentNode.removeChild(this)" style="display: block; margin: 0 auto;" type="button" class="btn btn-danger">HATALI İŞLEM</button>
                <?php } } ?>
                </div><br>

    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 style="margin-top:5px !important;" class="card-title">Admin Tablosu Ve İşlem Menüsü</h3>
                <button style="float:right;" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button"  class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="vertical-align:middle !important;">Sıra</th>
                    <th style="vertical-align:middle !important;">Kullanıcı Ad Soyadı</th>
                    <th style="vertical-align:middle !important;">Kullanıcı Mail</th>
                    <th style="vertical-align:middle !important; max-width: 130px !important;">Kullanıcı Şifre</th>
                    <th style="vertical-align:middle !important;">Kullanıcı Telefon Numarası</th>
                    <th style="vertical-align:middle !important;">Kullanıcı Oluşturulma Zamanı</th>
                    <th style="vertical-align:middle !important;">Durum</th>
                    <th style="vertical-align:middle !important;">Yetkilendirme</th>
                    <th style="vertical-align:middle !important;">İşlemler</th>
                    <th style="vertical-align:middle !important;">İşlemler</th>
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                    
                   

                  <tr>
                  <?php $say=0; ?>
                  <?php   foreach($kullanicicek as $listele) {  $say++;?>
                    
                  
                    <td><p style="text-align: center; vertical-align: middle; margin-top:30px;"><?php echo $say; ?></p></td>
                    <td><p style="text-align: center; vertical-align: middle; margin-top:30px;"><?php echo $listele['kullanici_adsoyad'] ?></p></td>
                    <td><p style="text-align: center; vertical-align: middle; margin-top:30px;"><?php echo $listele['kullanici_mail'] ?></p></td>
                    <?php if($_SESSION['userkullanici_yetki']==5) {?>
                    <td style="max-width: 130px !important; text-align: center; vertical-align: middle; margin-top:30px;"><?php echo $listele['kullanici_password'] ?></td>
                    <?php } else{ ?>
                      <td style="max-width: 130px !important; text-align: center; vertical-align: middle; margin-top:30px;">Görüntüleme Yetkiniz Yoktur</td>
                    <?php } ?>
                    <td><p style="text-align: center; vertical-align: middle; margin-top:30px;"><?php echo $listele['kullanici_gsm'] ?></p></td>
                    <td><p style="text-align: center; vertical-align: middle; margin-top:30px;"><?php echo $listele['kullanici_zaman'] ?></p></td>
                    
                    <?php
                    $sayinin_son_degeri=$say;
                    $_SESSION['sonkullanicisayisi']=$sayinin_son_degeri;
                    if($listele['kullanici_yetki']=='5')
                    { ?>
                      <td ><center>
                      <button style="text-align: center; vertical-align: middle; margin-top:20px;"  type="button" class="btn btn-dark">Yetkili</button></center>
                      </td>
                  <?php  }
                    elseif($listele['kullanici_yetki']=='1')
                    { ?>
                      <td><center>
                      <button style="text-align: center; vertical-align: middle; margin-top:20px;"  type="button" class="btn btn-warning">Personel</button></center>
                    </td>
                 <?php   } 
                   
                    if($listele['kullanici_durum']=='1')
                    { ?>
                      <td><center>
                      <button style="margin-top:20px; text-align: center; vertical-align: middle;" type="button" class="btn btn-success btn">Aktif</button></center>
                      </td>
                  <?php  }
                    elseif($listele['kullanici_durum']==0)
                    { ?>
                      <td><center>
                      <button style="margin:20px; text-align: center; vertical-align: middle; " type="button" class="btn btn-danger btn ">Pasif</button></center>
                    </td>
                 <?php   } ?> 
                    
              
                   
                    
                    <td>
                    <button style="margin-top:20px; text-align: center; vertical-align: middle;" type="button" class="btn btn-primary btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?php echo $listele['kullanici_id']?>">Güncelle</button>

                    <div class="modal fade" id="staticBackdrop-<?php echo $listele['kullanici_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-<?php echo $listele['kullanici_id']?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel-<?php echo $listele['kullanici_id']?>">Kullanıcı Düzenle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                     
                     <form action="../netting/islem.php" method="POST">
                     
                     <div class="form-group">
                         <label for="exampleInputEmail1">Ad Soyad</label>
                         <input type="text" class="form-control" id="exampleInputEmail1" name="kullanici_adsoyad" value="<?php echo $listele['kullanici_adsoyad'] ?>" placeholder="Ad Soyadı Giriniz:">
                       </div>
                       <div class="form-group">
                         <label for="exampleInputPassword1">E Posta Adresi</label>
                         <input type="text" class="form-control" id="exampleInputPassword1" name="kullanici_mail" value="<?php echo $listele['kullanici_mail'] ?>" placeholder="Mail Adresini Giriniz:">
                       </div>
                       <div class="form-group">
                         <label for="exampleInputPassword1">Telefon Numarası</label>
                         <input type="text" class="form-control" id="exampleInputPassword1" name="kullanici_gsm" value="<?php echo $listele['kullanici_gsm'] ?>" placeholder="Telefon Numaranızı Giriniz:">
                       </div>
                       <div class="form-group">
                         <label for="exampleInputPassword1">Şifre</label>
                         <input type="password" maxlength="8" class="form-control" id="exampleInputPassword1" name="kullanici_password" value="<?php echo $listele['kullanici_password'] ?>" placeholder="Şifreyi Giriniz:">
                       </div>
                       <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Yetkisi
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                       <select  id="heard" class="form-control" name="kullanici_yetki" required>
 
                       <?php if($listele['kullanici_yetki']==1)
                       { ?>
                   
                       <option value="1">Personel</option>
                       <option value="5">Yetkili</option>
 
                       <?php  }
 
                        else{ ?>
 
                       <option value="5">Yetkili</option>
                       <option value="1">Personel</option>
 
                       <?php  }  ?>
                        
                       </select><br>
                        </div>
                        <div>
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Durum</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                       <select id="heard" class="form-control" name="kullanici_durum" required>
 
                       <?php if($listele['kullanici_durum']==0)
                       { ?>
                   
                       <option value="0">Pasif</option>
                       <option value="1">Aktif</option>
 
                       <?php  }
 
                        else{ ?>
 
                       <option value="1">Aktif</option>
                       <option value="0">Pasif</option>
 
                        
                      <?php  }  ?>
                      
                     </select>
                     <input type="hidden" name="kullanici_id" value="<?php echo $listele['kullanici_id'] ?>"></input>
                        </div>
                   
                          
                    <div style="float:right !important;" class="modal-footer">
                                <button style="float:right" type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
                                <button style="float:right" type="submit" name="kullaniciduzenle" class="btn btn-primary">Güncelle</button></a>
                  </form>
                 
                  </div>
                  
                  </div>
                 
                              </div>
                             
                            </div>
                            
                        </div>
                      </div>
                    </div> 
                  </div>
                </div>
                                
                        
                    
                    <td>
                      <!-- Silme Butonu -->
                    <br><button style="margin-top:-5px; text-align: center; vertical-align: middle;" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $listele['kullanici_id'] ?>" style="margin-bottom:10px"  class="btn btn-danger btn-sm"> &nbsp Sil &nbsp</button></td><br>
                    <div class="modal fade" id="exampleModal-<?php echo $listele['kullanici_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel-<?php echo $listele['kullanici_id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-<?php echo $listele['kullanici_id'] ?>">İşlem Menüsü</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          İşleme Devam Etmek İstiyor Musunuz?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hayır</button>
                        <a href="../netting/islem.php?kullanici_id=<?php echo $listele['kullanici_id'];?>&silmeislemi=ok"><button type="button" class="btn btn-primary">Evet</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                        </tr>
                        
                   
                    </form>
                    <?php  }  ?>
                    
                  </td>
                  
                  
                   
               
                 
                 
                  </tbody>
                
                </table>
               
              </div>
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Kullanıcı Ekle</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                     
                    <form action="../netting/islem.php" method="POST">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ad Soyad</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="kullanici_adsoyad" value="" required placeholder="Ad Soyadı Giriniz:">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">E Posta Adresi</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="kullanici_mail" value="" required placeholder="Mail Adresini Giriniz:">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Telefon Numarası</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="kullanici_gsm" value="" required placeholder="Telefon Numaranızı Giriniz:">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Şifre</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="kullanici_password" maxlength="8" value="" required placeholder="Şifreyi Giriniz:">
                      </div>
                      <div class="form-group">
                      <label  for="first-name">Kullanıcı Yetkisi
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="heard" class="form-control" name="kullanici_yetki" required>
                      <option style="color:yellow;" value="1">Personel</option>
                      <option style="color:black;" value="5">Yetkili</option>

                      </select><br>
                      <label for="exampleInputEmail1">Kullanıcı Durum
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="heard" class="form-control" name="kullanici_durum" required>

                      <option value="1">Aktif</option>
                      <option value="0">Pasif</option>




              



                 </select>
               </div>
             </div>

             

                        
            
            
            </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">İptal</button>
                      <button style="float:right;" class="btn btn-primary" name="kullaniciekle" >Ekle</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
             
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 
  

            <?php include("footer.php")?>