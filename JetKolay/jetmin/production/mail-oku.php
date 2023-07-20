<?php include 'header.php' ;
$contact_id=$_GET['contact_id'];
$mesajoku=$db->prepare("SELECT * FROM contact where contact_id=:contact_id");
$mesajoku->bindParam(":contact_id", $contact_id, PDO::PARAM_INT); // Parametre olarak contact_id'yi ekliyoruz
$mesajoku->execute();
$contactcek=$mesajoku->fetch(PDO::FETCH_ASSOC);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Mesaj-Oku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <a href="mail-ayar.php" class="btn btn-primary btn-block mb-3">Gelen Kutusuna Dönün</a>

            
                
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <?php $dateTime = new DateTime($contactcek['contact_time']);

            // Saat, dakika, saniye, gün, ay ve yıl bilgilerini alır
            $hour = $dateTime->format('H');
            $minute = $dateTime->format('i');
            $second = $dateTime->format('s');
            $day = $dateTime->format('d');
            $month = $dateTime->format('m');
            $year = $dateTime->format('Y');

            // Tarihi istediğiniz formatta yazdırır
            $formattedDate = "$hour:$minute:$second $day/$month/$year"; ?>
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Mesajı Oku</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>Site Ziyaretçisi Gelen Mesaj</h5>
                <h6><?php echo $contactcek['contact_mail'] ?>
                  <span class="mailbox-read-time float-right"><?php echo $formattedDate ?></span></h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <?php echo $contactcek['contact_message'] ?>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

            <!-- /.card-body -->
            

    <?php include 'footer.php' ?>