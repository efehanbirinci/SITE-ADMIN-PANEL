
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
       


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 style="color:red;">Hizmet Listeleme <small>

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
                  <th>Başlık</th>
                  <th>İcon</th>
                  <th>Açıklama</th>
                  <th>Url</th>
                  <th>Sıra</th>
                  <th>Durum</th>
                  <th></th>
                  <th><button style="display: block; margin: 0 auto;" data-bs-toggle="modal" data-bs-target="#staticBackdrop-ekle" type="button"  class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i></button></a></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($hizmetcek=$hizmetsor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><?php echo $hizmetcek['hizmet_baslik'] ?></td>
                 <td ><?php echo $hizmetcek['hizmet_icon'] ?></td>
                 <td><?php echo $hizmetcek['hizmet_aciklama'] ?></td>
                 <td><?php echo $hizmetcek['hizmet_url'] ?></td>
                 <td><?php echo $hizmetcek['hizmet_sira'] ?></td>
                 

                 <td><center><?php 

                  if ($hizmetcek['hizmet_durum']==1) {?>

                  <button class="btn btn-success btn">Aktif</button>


                <?php } else {?>

                <button class="btn btn-danger btn">Pasif</button>


                <?php } ?>
              </center>


            </td>


            <td><center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?php echo $hizmetcek['hizmet_id']; ?>">Düzenle</button></a></center></td>
            <!-- Hizmet Düzenle -->
            <div class="modal fade" id="staticBackdrop-<?php echo $hizmetcek['hizmet_id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-<?php echo $hizmetcek['hizmet_id']; ?>" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel-<?php echo $hizmetcek['hizmet_id']; ?>">Hizmet Düzenle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                     
                     <form action="../netting/islem.php" method="POST" enctype="multipart/form-data">

                                     <div class="form-group">
                                      <label for="exampleInputPassword1">Hizmet Başlık </label>
                                       <input type="text" class="form-control" id="exampleInputPassword1" name="hizmet_baslik" value="<?php echo $hizmetcek['hizmet_baslik'] ?>">
                                     </div>
                                     <div class="form-group">
                                       <label for="exampleInputPassword1">Hizmet Url (Yönlendireceği site)</label>
                                       <input type="text" class="form-control" id="exampleInputPassword1" name="hizmet_url" value="<?php echo $hizmetcek['hizmet_url'] ?>">
                                     </div>
                                     <label for="exampleInputPassword1">Hizmet İcon Giriniz(Font Awesome Sitesinden Seçtiğiniz İcon Kodları)</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="hizmet_icon" value="<?php echo $hizmetcek['hizmet_icon'] ?>">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Hizmet Açıklamasını Giriniz</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="hizmet_aciklama"  value="<?php echo $hizmetcek['hizmet_aciklama'] ?>" required >
                                    </div>
                                     <div class="form-group">
                                       <label for="exampleInputPassword1">Hizmet Sırası </label>
                                       <input type="number" class="form-control" id="exampleInputPassword1" name="hizmet_sira" maxlength="2" value="<?php echo $hizmetcek['hizmet_sira'] ?>"  >
                                     </div>
                                     <div class="form-group">
                                     <label  for="first-name">Hizmet Durumu 
                                     </label>
                                     <div class="col-md-6 col-sm-6 col-12">
                                     <select id="heard" class="form-control" name="hizmet_durum" >
                                       <?php if($hizmetcek['hizmet_durum']==1){ ?>
                                     <option style="color:black;" value="1">Aktif</option>
                                     <option  value="0">Pasif </option>
                                   <?php  }else{ ?> 
                                       
                                         <option  value="0">Pasif</option>
                                         <option style="color:black;" value="1">Aktif</option>
                                   <?php } ?>
               
                                     </select><br>

                                     <input type="hidden" name="hizmet_id" value="<?php echo $hizmetcek['hizmet_id'] ;?>"></input>
                                   </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
                    <button name="hizmetduzenle" type="submit" class="btn btn-primary">Düzenle</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <td><center><a href="../netting/islem.php?hizmet_id=<?php echo $hizmetcek['hizmet_id']; ?>&hizmetsil=ok"><button class="btn btn-danger btn">Sil</button></a></center></td>
          </tr>



          <?php  }

          ?>


        </tbody>
      </table>


      <!-- Hizmet Ekle -->            

      <div class="modal fade" id="staticBackdrop-ekle" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-ekle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel-ekle">Hizmet Ekle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                     
      <form action="../netting/islem.php" method="POST" >
                      
                      <div class="form-group">
                        <label for="exampleInputPassword1">Hizmet Başlık Giriniz</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="hizmet_baslik" value="" required >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Hizmet Url Giriniz(Yönlendireceği site)</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="hizmet_url" value=""  >
                      </div>
                      <label for="exampleInputPassword1">Hizmet İcon Giriniz(Font Awesome Sitesinden Seçtiğiniz İcon Kodları)</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="hizmet_icon" value=""  >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Hizmet Açıklamasını Giriniz</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="hizmet_aciklama"  value="" required >
                      </div>
                      <label for="exampleInputPassword1">Hizmet Sırasını Giriniz</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="hizmet_sira"  value="" required >
                      </div>
                      <div class="form-group">
                      <label  for="first-name">Hizmet Durumunu Giriniz
                      </label>
                      <div class="col-md-6 col-sm-6 col-12">
                      <select id="heard" class="form-control" name="hizmet_durum" required>
                        
                      <option style="color:black;" value="1">Aktif</option>
                      <option style="color:yellow;" value="0">Pasif </option>
                   
                    </select><br>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">İptal</button>
        <button name="hizmetkaydet" type="submit" class="btn btn-primary">Ekle</button>
        </form>
      </div>



      


      
      

     


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
  