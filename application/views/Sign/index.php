<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Acceso al sistema</title>
  
  
  
      <link rel="stylesheet" href="<?= base_url('assets/css_login/style.css') ?>">

  
</head>

<body>

  <div class="login-page">
  <div class="form"> 

    <form action="sign/in" class="login-form" method="post">
      <input  name="usuario" type="text" placeholder="usuario"/>
      <input  name="password" type="password" placeholder="password"/>
      <button type="submit">Ingresar</button>
      <p class="message">Olvidaste tu clave? <a href="#">Recuperar</a></p>
    </form>

  </div>
</div>
 <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->


  <script  src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script  src="<?= base_url('assets/js_login/index.js') ?>"></script>




</body>

</html>
