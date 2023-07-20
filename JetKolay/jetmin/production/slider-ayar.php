
<?php include("header.php");?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php $slidersor=$db->prepare("SELECT * FROM slider");
              $slidersor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 style="color:red;">Slider Listeleme <small>

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
              


            </small></h2>

            <div class="clearfix"></div>

            
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Resim</th>
                  <th>Ad</th>
                  <th>Url</th>
                  <th>Sıra</th>
                  <th>Durum</th>
                  <th></th>
                  <th><button style="display: block; margin: 0 auto;" data-bs-toggle="modal" data-bs-target="#staticBackdrop-1" type="button"  class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i></button></a></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><img style="widht:200px; height: 80px;" src="../../dist/img/slider/<?php echo $slidercek['slider_resimyol'] ?>"></td>
                 <td><?php echo $slidercek['slider_ad'] ?></td>
                 <td><?php echo $slidercek['slider_url'] ?></td>
                 <td><?php echo $slidercek['slider_sira'] ?></td>

                 <td><center><?php 

                  if ($slidercek['slider_durum']==1) {?>

                  <button class="btn btn-success btn">Aktif</button>


                <?php } else {?>

                <button class="btn btn-danger btn">Pasif</button>


                <?php } ?>
              </center>


            </td>


            <td><center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?php echo $slidercek['slider_id']; ?>">Düzenle</button></a></center></td>
            <!-- Slider Düzenle -->
            <div class="modal fade" id="staticBackdrop-<?php echo $slidercek['slider_id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-<?php echo $slidercek['slider_id']; ?>" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel-<?php echo $slidercek['slider_id']; ?>">Slider Düzenle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                     
                     <form action="../netting/islem.php" method="POST" enctype="multipart/form-data">
                                     <div class="form-group">
                                       <label for="exampleInputEmail1">Slider </label>
                                       <input type="file" class="form-control" id="exampleInputEmail1" name="slider_resimyol" value=".jpg"accept="image/jpeg, image/png, image/gif,image/jpeg" >
                                     </div>
                                     <div class="form-group">
                                      <label for="exampleInputPassword1">Slider İsim </label>
                                       <input type="text" class="form-control" id="exampleInputPassword1" name="slider_ad" value="<?php echo $slidercek['slider_ad'] ?>"  >
                                     </div>
                                     <div class="form-group">
                                       <label for="exampleInputPassword1">Slider Url (Yönlendireceği site)</label>
                                       <input type="text" class="form-control" id="exampleInputPassword1" name="slider_url" value="<?php echo $slidercek['slider_url'] ?>"  >
                                     </div>
                                     <div class="form-group">
                                       <label for="exampleInputPassword1">Slider Sırası </label>
                                       <input type="number" class="form-control" id="exampleInputPassword1" name="slider_sira" maxlength="2" value="<?php echo $slidercek['slider_sira'] ?>"  >
                                     </div>
                                     <div class="form-group">
                                     <label  for="first-name">Slider Durumu 
                                     </label>
                                     <div class="col-md-6 col-sm-6 col-12">
                                     <select id="heard" class="form-control" name="slider_durum" >
                                       <?php if($slidercek['slider_durum']==1){ ?>
                                     <option style="color:black;" value="1">Aktif</option>
                                     <option  value="0">Pasif </option>
                                   <?php  }else{ ?> 
                                       
                                         <option  value="0">Pasif</option>
                                         <option style="color:black;" value="1">Aktif</option>
                                   <?php } ?>
               
                                     </select><br>

                                     <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id'] ;?>"></input>
                                   </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
                    <button name="sliderduzenle" type="submit" class="btn btn-primary">Düzenle</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <td><center><a href="../netting/islem.php?slider_resimyol=<?php echo $slidercek['slider_resimyol']; ?>&slidersil=ok"><button class="btn btn-danger btn">Sil</button></a></center></td>
          </tr>



          <?php  }

          ?>


        </tbody>
      </table>


      <!-- Slider Ekle -->            

      <div class="modal fade" id="staticBackdrop-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel-1">Slider Ekle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" enctype="multipart/form-data" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                     
      <form action="../netting/islem.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Slider Seçiniz</label>
                        <input type="file" class="form-control" accept="image/jpeg, image/png, image/gif,image/jpeg" id="exampleInputEmail1" name="slider_resimyol" value="" required >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Slidera isim veriniz</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="slider_ad" value="" required >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Slider Url Giriniz(Yönlendireceği site)</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="slider_url" value=""  >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Slider Sırasını Giriniz</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="slider_sira" maxlength="2" value="" required >
                      </div>
                      <div class="form-group">
                      <label  for="first-name">Slider Durumu
                      </label>
                      <div class="col-md-6 col-sm-6 col-12">
                      <select id="heard" class="form-control" name="slider_durum" required>
                      <option  value="1">Aktif</option>
                      <option  value="0">Pasif </option>

                      </select><br>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">İptal</button>
        <button name="sliderkaydet" type="submit" class="btn btn-primary">Ekle</button>
        </form>
      </div>



      


      
      

      <!-- Div İçerik Bitişi -->


          </div>
         </div>
        </div>
       </div>




</div>
</div>
    </div>                
   </section>
    <!-- /.content -->
  </div>
  
    </div>
  </div>
</div>
  
                                                


  <?php include("footer.php") ?>                
  