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
            <h1 style="color:red;">Genel Ayarlar</h1>
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

               <?php }
                 elseif($_GET['durum']=='no')
                 { ?>
                 <button onclick="this.parentNode.removeChild(this)" style="display: block; margin: 0 auto;" type="button" class="btn btn-danger">HATALI İŞLEM</button>
                <?php } } ?>
                </div><br>

             


                  
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="form-group">
                      <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                          <div class="form-group">
                          <label for="exampleInputFile">Logo Seçiniz:</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <form action="../netting/islem.php" method="POST" enctype="multipart/form-data">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="logo_resimyol"  >
                                <label class="custom-file-label" for="exampleInputFile"><?php echo $logocek['logo_resimyol'] ?></label>
                           </div>
                         </div>
                      </div>
                      <button style="float:right;" type="submit" class="btn btn-primary" name="sitelogokaydet">Güncelle</button><br>
                    
                      <div>
                      <label style="text-align=center" for="exampleInputFile">Site Logosu</label>
                      
                      <img style="display: block; margin: 0 auto; " src="../../dist/img/logo/<?php echo $logocek['logo_resimyol'] ?>"> </img>
                      
                    </div>
                    </form>

                    <div class="form-group">
                          <label for="exampleInputFile">Başlık Logo Seçiniz:</label>
                            <div class="input-group">
                              <div class="custom-file">
                      <form action="../netting/islem.php" method="POST" enctype="multipart/form-data">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="titlelogo_resimyol"   >
                          <label class="custom-file-label" for="exampleInputFile"><?php echo $titlelogocek['titlelogo_resimyol'] ?></label>
                            </div> 
                         </div> 
                      </div>
                      <button style="float:right;" type="submit" class="btn btn-primary" name="sitetitlelogokaydet">Güncelle</button><br>
                    
                      <div>
                      <label style="text-align=center" for="exampleInputFile">Site Başlık logosu</label>
                      
                      <img style="display: block; margin: 0 auto;" src="../../dist/img/logo/<?php echo $titlelogocek['titlelogo_resimyol'] ?>"> </img>
                      
                      </div>
                      </form>
                    
                    </div>
                    <div class="form-group">
                          <label for="exampleInputFile">Beyaz Logo Seçiniz:</label>
                            <div class="input-group">
                              <div class="custom-file">
                      <form action="../netting/islem.php" method="POST" enctype="multipart/form-data">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="whitelogo_resimyol"  >
                          <label class="custom-file-label" for="exampleInputFile"><?php echo $whitelogocek['whitelogo_resimyol'] ?></label>
                            </div> 
                         </div> 
                      </div>
                      <button style="float:right;" type="submit" class="btn btn-primary" name="sitebeyazlogokaydet">Güncelle</button><br>
                    
                      <div>
                      <label style="text-align=center" for="exampleInputFile">Site Beyaz logosu</label>
                      
                      <img style="display: block; margin: 0 auto; background-color: black;" src="../../dist/img/logo/<?php echo $whitelogocek['whitelogo_resimyol'] ?>"> </img>
                      
                      </div>
                      </form>
                    
                    </div>
                    <form action="../netting/islem.php" method="POST">
                        <label for="exampleInputEmail1">Site Başlığı</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="ayar_title" value="<?php echo $sitecek['ayar_title'] ?>" placeholder="Site Başlığını Giriniz:">
                      </div><br>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site Açıklaması Giriniz:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ayar_description" value="<?php echo $sitecek['ayar_description'] ?>" placeholder="Site Açıklama Giriniz:">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site Sahibini Giriniz:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ayar_author" value="<?php echo $sitecek['ayar_author'] ?>" placeholder="Site Sahibini Giriniz:">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site Footer Yazısı Giriniz:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ayar_footeryazi" value="<?php echo $sitecek['ayar_footeryazi'] ?>" placeholder="Site Footer Yazısını Giriniz:">
                      </div>
                      
                      <button style="float:right;" type="submit" class="btn btn-primary" name="siteayarkaydet" >Güncelle</button>
                      </form>
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
  </div><br><br>
  <?php include("footer.php"); ?>
