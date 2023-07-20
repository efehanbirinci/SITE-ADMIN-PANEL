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
            <h1 style="color:red;">Api Ayarlar</h1>
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
                        <label for="exampleInputPassword1">Site Keywords </label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ayar_keywords" value="<?php echo $sitecek['ayar_keywords'] ?>" placeholder="Site Keywords Giriniz:">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site Analystic </label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ayar_analystic" value="<?php echo $sitecek['ayar_analystic'] ?>" placeholder="Site Analystic Giriniz:">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site Zopim</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ayar_zopim" value="<?php echo $sitecek['ayar_zopim'] ?>" placeholder="Site Zopim Giriniz:">
                      </div>
                      <button style="float:right;" class="btn btn-primary" name="apiayarkaydet" >Güncelle</button>
                      </form>
                      </div>
                      <br><br>
                       
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
