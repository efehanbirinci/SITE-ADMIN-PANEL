<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/etc/lf/Login_v14/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Mar 2023 05:24:42 GMT -->
<head>
<title>JET KOLAY</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico" />

<link rel="stylesheet" type="text/css" href="../../dist/vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../../dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="../../dist/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

<link rel="stylesheet" type="text/css" href="../../dist/vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="../../dist/vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="../../dist/vendor/animsition/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="../../dist/vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="../../dist/vendor/daterangepicker/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="../../dist/css/util.css">
<link rel="stylesheet" type="text/css" href="../../dist/css/main.css">

<meta name="robots" content="noindex, follow">

<body>
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
<span class="login100-form-title p-b-32">
<?php 
if(isset($_GET["durum"])){
if($_GET["durum"]=="no")
{ ?>
  <b onclick="this.parentNode.removeChild(this)" style="color:Red;">GİRİŞ İŞLEMİ BAŞARISIZ </b>
<?php }}

?>

Giriş Yap
</span>
<span class="txt1 p-b-11">
Mail Adresi
</span>
<form action="../netting/islem.php" method="POST">
<div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
<input class="input100" type="mail" name="kullanici_mail" >
<span class="focus-input100"></span>
</div>
<span class="txt1 p-b-11">
Şifre
</span>
<div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
<span class="btn-show-pass">
<i class="fa fa-eye"></i>
</span>
<input class="input100" type="password" name="kullanici_password">
<span class="focus-input100"></span>
</div>
<div class="container-login100-form-btn">
<button class="login100-form-btn" name="admingiris" style="margin-left:110px ;">
Giriş Yap
</button>
</form>
</div>
</div>
</div>
</div>
<div id="dropDownSelect1"></div>

<script src="../../dist/vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="../../dist/vendor/animsition/js/animsition.min.js"></script>

<script src="../../dist/vendor/bootstrap/js/popper.js"></script>
<script src="../../dist/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="../../dist/vendor/select2/select2.min.js"></script>

<script src="../../dist/vendor/daterangepicker/moment.min.js"></script>
<script src="../../dist/vendor/daterangepicker/daterangepicker.js"></script>

<script src="../../dist/vendor/countdowntime/countdowntime.js"></script>

<script src="../../dist/js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a48a7423e1a50ee","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from colorlib.com/etc/lf/Login_v14/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Mar 2023 05:24:47 GMT -->
</html>
