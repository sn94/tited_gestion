<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Acceso al sistema</title>
  
  
  
      <link rel="stylesheet" href="<?= base_url('assets/css_login/style.css?v='. round(microtime(true) * 1000)) ?>">

  
</head>

<body>

  <div class="login-page">
  <div class="form"   > 

    <?php    include("form.php");   ?>

  </div>
</div>
 <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->


  <script  src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script  src="<?= base_url('assets/js_login/index.js') ?>"></script>




</body>

</html>
