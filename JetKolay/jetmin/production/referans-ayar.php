
<?php include("header.php");?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php $referanssor=$db->prepare("SELECT * FROM referans");
              $referanssor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 style="color:red;">Referans Listeleme <small>

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

                while($referanscek=$referanssor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><img style="widht:200px; height: 80px;" src="../../dist/img/referans/<?php echo $referanscek['referans_resimyol'] ?>"></td>
                 <td><?php echo $referanscek['referans_ad'] ?></td>
                 <td><?php echo $referanscek['referans_url'] ?></td>
                 <td><?php echo $referanscek['referans_sira'] ?></td>

                 <td><center><?php 

                  if ($referanscek['referans_durum']==1) {?>

                  <button class="btn btn-success btn">Aktif</button>


                <?php } else {?>

                <button class="btn btn-danger btn">Pasif</button>


                <?php } ?>
              </center>


            </td>


            <td><center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?php echo $referanscek['referans_id']; ?>">Düzenle</button></a></center></td>
            <!-- Referans Düzenle -->
            <div class="modal fade" id="staticBackdrop-<?php echo $referanscek['referans_id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-<?php echo $referanscek['referans_id']; ?>" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel-<?php echo $referanscek['referans_id']; ?>">referans Düzenle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                     
                     <form action="../netting/islem.php" method="POST" enctype="multipart/form-data">
                                     <div class="form-group">
                                       <label for="exampleInputEmail1">Referans </label>
                                       <input type="file" class="form-control" id="exampleInputEmail1" name="referans_resimyol" value="<?php echo $referanscek['referans_resimyol'] ?>"accept="image/jpeg, image/png, image/gif,image/jpeg" required>
                                     </div>
                                     <div class="form-group">
                                      <label for="exampleInputPassword1">Referans İsim </label>
                                       <input type="text" class="form-control" id="exampleInputPassword1" name="referans_ad" value="<?php echo $referanscek['referans_ad'] ?>"  >
                                     </div>
                                     <div class="form-group">
                                       <label for="exampleInputPassword1">Referans Url (Yönlendireceği site)</label>
                                       <input type="text" class="form-control" id="exampleInputPassword1" name="referans_url" value="<?php echo $referanscek['referans_url'] ?>"  >
                                     </div>
                                     <div class="form-group">
                                       <label for="exampleInputPassword1">Referans Sırası </label>
                                       <input type="number" class="form-control" id="exampleInputPassword1" name="referans_sira" maxlength="2" value="<?php echo $referanscek['referans_sira'] ?>"  >
                                     </div>
                                     <div class="form-group">
                                     <label  for="first-name">Referans Durumu 
                                     </label>
                                     <div class="col-md-6 col-sm-6 col-12">
                                     <select id="heard" class="form-control" name="referans_durum" >
                                       <?php if($referanscek['referans_durum']==1){ ?>
                                     <option style="color:black;" value="1">Aktif</option>
                                     <option  value="0">Pasif </option>
                                   <?php  }else{ ?> 
                                       
                                         <option  value="0">Pasif</option>
                                         <option style="color:black;" value="1">Aktif</option>
                                   <?php } ?>
               
                                     </select><br>

                                     <input type="hidden" name="referans_id" value="<?php echo $referanscek['referans_id'] ;?>"></input>
                                   </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
                    <button name="referansduzenle" type="submit" class="btn btn-primary">Düzenle</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <td><center><a href="../netting/islem.php?referans_resimyol=<?php echo $referanscek['referans_resimyol']; ?>&referanssil=ok"><button class="btn btn-danger btn">Sil</button></a></center></td>
          </tr>



          <?php  }

          ?>


        </tbody>
      </table>


      <!-- Referans Ekle -->            

      <div class="modal fade" id="staticBackdrop-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel-1">Referans Ekle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" enctype="multipart/form-data" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                     
      <form action="../netting/islem.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Referans Seçiniz</label>
                        <input type="file" class="form-control" accept="image/jpeg, image/png, image/gif,image/jpeg" id="exampleInputEmail1" name="referans_resimyol" value="" required >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Referansa isim veriniz</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="referans_ad" value="" required >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Referans Url Giriniz(Yönlendireceği site)</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="referans_url" value=""  >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Referans Sırasını Giriniz</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="referans_sira" maxlength="2" value="" required >
                      </div>
                      <div class="form-group">
                      <label  for="first-name">Referans Durumu
                      </label>
                      <div class="col-md-6 col-sm-6 col-12">
                      <select id="heard" class="form-control" name="referans_durum" required>
                        
                      <option style="color:black;" value="1">Aktif</option>
                      <option style="color:yellow;" value="0">Pasif </option>
                   
                    </select><br>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">İptal</button>
        <button name="referanskaydet" type="submit" class="btn btn-primary">Ekle</button>
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
  