<?php include("header.php") 
  //EFEHAN BİRİNCİ-JETKOLAY

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color:red;">İletişim Ayarlar</h1>
          </div>
         
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <div style="widht:100%";>
                    <?php 
             if (isset($_GET["durum"])) {
              
                if($_GET['durum']=='ok')
                { ?>
                  <button onclick="this.parentNode.removeChild(this)" style="display: block; margin: 0 auto;" type="button" class="btn btn-success">İŞLEM TAMAMLANDI</button>
               <?php  }
                 elseif($_GET['durum']=='no')
                 { ?>
                 <button onclick="this.parentNode.removeChild(this)" style="display: block; margin: 0 auto;" type="button" class="btn btn-danger">HATALI İŞLEM</button>
                <?php } } 
                
                ?>
                </div><br>
                  
                  


                  
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="form-group">
                    <form action="../netting/islem.php" method="POST">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site Telefon Numarası</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ayar_tel" value="<?php echo $sitecek['ayar_tel'] ?>" placeholder="Site Telefon Numarasını Giriniz:">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site E-Mail Adresi</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ayar_mail" value="<?php echo $sitecek['ayar_mail'] ?>" placeholder="Site Mail Adresini Giriniz:">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site İl</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ayar_il" value="<?php echo $sitecek['ayar_il'] ?>" placeholder="Şehri Giriniz:">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site İlçe</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ayar_ilce" value="<?php echo $sitecek['ayar_ilce'] ?>" placeholder="İlçe Giriniz:">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site Adres</label>
                        <textarea  class="ckeditor" id="editor1" name="ayar_adres"><?php echo $sitecek['ayar_adres']; ?></textarea>
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site Mesai Saatleri</label>
                        <textarea   class="ckeditor" id="editor1" name="ayar_mesai"><?php echo $sitecek['ayar_mesai']; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site Harita Yerleştirme Linki</label>
                        <textarea class="form-control" id="exampleInputPassword1" name="ayar_maps"  placeholder="Google Harita Linkini Giriniz"><?php echo $sitecek['ayar_maps'] ?></textarea>
                      </div>
                      
                      
                      </div>
                      <br><br>
                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                          <div   class="form-group">
                          <?php echo $sitecek['ayar_maps'] ?>
                        </div>
                      </div>
                          
                      <div class="form-group">
                        <label style="color:blue;" for="exampleInputPassword1">Facebook Link</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ayar_facebook" value="<?php echo $sitecek['ayar_facebook'] ?>" placeholder="Facebook Linkini Giriniz:">
                      </div>
                      <div class="form-group">
                        <label style="color:purple;"  for="exampleInputPassword1">İnstagram Link </label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ayar_instagram" value="<?php echo $sitecek['ayar_instagram'] ?>" placeholder="İnstagram Linkini Giriniz:">
                      </div>
                      <div class="form-group">
                        <label style="color:green;" for="exampleInputPassword1">Whatsapp İletişim Numarasını Giriniz</label>
                        <input type="tel" class="form-control" id="exampleInputPassword1" name="ayar_whatsapp" maxlength="10"  value="<?php echo $sitecek['ayar_whatsapp'] ?>" pattern="\d*" placeholder="Whatsapp Numaranızı Giriniz:">
                      </div>
                      <button style="width:100%" class="btn btn-primary" name="iletisimayarkaydet" >Güncelle</button>
                      </form> <br><br><br>                   
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        
              
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <?php include("footer.php"); ?>
