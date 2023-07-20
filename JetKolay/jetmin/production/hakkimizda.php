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
            <h1 style="color:red;">Hakkımızda Ayarlar</h1>
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
                <?php } } ?>
                </div><br>
             


                  
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="form-group">
                    <form action="../netting/islem.php" method="POST">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Hakkımızda Başlık</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="hakkimizda_baslik" value="<?php echo $hakkimizdacek['hakkimizda_baslik'] ?>" placeholder="Hakkımızda Başlığı Giriniz:">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Hakkımızda İçerik</label>
                        <textarea  class="ckeditor" id="editor1" name="hakkimizda_icerik"><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Hakkımızda Video Youtube(Youtube Linkinin Sonundaki =' den sonraki kodu giriniz.)</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="hakkimizda_video" value="<?php echo $hakkimizdacek['hakkimizda_video'] ?>" placeholder="Hakkımızda Video Youtube Linkini Giriniz:">
                      </div>
                      <div style="text-align: center; vertical-align: middle;" class="form-group">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek['hakkimizda_video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Hakkımızda Misyon</label>
                        <textarea  class="ckeditor" id="editor1" name="hakkimizda_misyon"><?php echo $hakkimizdacek['hakkimizda_misyon']; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Hakkımızda Vizyon</label>
                        <textarea  class="ckeditor" id="editor1" name="hakkimizda_vizyon"><?php echo $hakkimizdacek['hakkimizda_vizyon']; ?></textarea>
                        
                      </div>
                      
                      <button style="float:right;" class="btn btn-primary" name="hakkimizdakaydet" >Güncelle</button>
                      </form>
                      </div>
                      <br><br>
                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                          <div class="form-group">
                          <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                           </div>
                        </div>
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
