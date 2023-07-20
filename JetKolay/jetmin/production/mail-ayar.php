<?php include("header.php");
$contactcek=$contactsor->fetchAll(PDO::FETCH_ASSOC)
?>

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gelen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Gelen Kutusu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">

          <div class="card">
            
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
         
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
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
                <?php } }
                print_r($_POST) ?>
                </div><br>
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Gelen Mesajlar</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                
                <div class="btn-group">
                <form action="../netting/islem.php" method="POST">
                <button type="submit" name="contactsil" class="btn btn-default btn-sm" >
                 <i class="far fa-trash-alt"></i>
                </button>
                  
                  
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  
                  <?php
                  $say=0;
                  
                   foreach($contactcek as $clist) { $say++ ;
                    $dateTime = new DateTime($clist['contact_time']);

                    // Saat, dakika, saniye, gün, ay ve yıl bilgilerini alır
                    $hour = $dateTime->format('H');
                    $minute = $dateTime->format('i');
                    $second = $dateTime->format('s');
                    $day = $dateTime->format('d');
                    $month = $dateTime->format('m');
                    $year = $dateTime->format('Y');
                    
                    // Tarihi istediğiniz formatta yazdırır
                    $formattedDate = "$hour:$minute:$second $day/$month/$year";
                    
                    ?>
                    
                  <tr>
                    <td>
                      <div class="icheck-primary">
                        <input name="contact_ids[]" type="checkbox" value="<?php echo $clist['contact_id'] ?>" id="check<?php echo $say; ?>" >
                        <label for="check<?php echo $say; ?>"></label>
                      </div>
                    </td>
                    <td class="mailbox-star"><?php echo $say ?></td>
                    <td class="mailbox-name"><a href="mail-oku.php?contact_id=<?php echo $clist['contact_id'] ?>"><?php echo $clist['contact_name'] ?></a></td>
                    <td class="mailbox-name"><?php echo $clist['contact_tel'] ?></td>
                    <td class="mailbox-name"><?php echo $clist['contact_mail'] ?></td>
                    <td id="shortened-text" > <?php echo $clist['contact_message'] ?></td>
                    <td id="mailbox-date" class="mailbox-date" ><?php echo $formattedDate ?></td>
                  </tr>
                  
                  <?php } ?>
                   
                  </tbody>
                </table>
                
                <script>
                const text = document.querySelector("#shortened-text").textContent;
                const shortenedText = text.substring(0, 50);
                document.querySelector("#shortened-text").textContent = shortenedText;
                </script>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                  <i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" name="contactsil" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                   </form>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>
</body>
  <?php include("footer.php"); ?>
