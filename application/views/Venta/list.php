<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Tited - B&uacute;squeda de comprobantes</title>
  
  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://sachinchoolur.github.io/lightGallery/lightgallery/css/lightgallery.css'>
<link rel='stylesheet' href='https://sachinchoolur.github.io/lightGallery/lightgallery/css/lg-animations.css'>

      <link rel="stylesheet" href="../assets/css/lightgallery_style.css">

  
      <style>

        body{
          margin: 30px;
          border: 1px #3F51B5 solid;
        }
      </style>

</head>

<body>

  
<div class="container-fluid">

    <h1 class="display-4">FACTURAS DE VENTA</h1>  <a href="/tited_gestion" class="btn btn-primary">Volver</a>
   
    


  <div class="row">

    <div class="col-sm-8">
      <div class="demo-gallery" id="demo-gallery">
  

      <br>
      <?php    if( !$lista ){ ?>
        <div class="alert alert-success col col-md-4"> <h4>Sin fotos</h4> </div>
      <?php }  ?>


      <ul id="lightgallery">
       
       <?php   foreach( $lista as $row){ ?>
<li data-responsive="../<?= $row->Venta_foto ?>"  data-src="../<?= $row->Venta_foto ?>"
    data-sub-html="<p class='cat'><?= $row->Empresa_razon."(".$row->Venta_fecha.")" ?></p>">
        <a href="">
          <img class="img-responsive text-center" src="../<?= $row->Venta_foto ?>">
          <div class="demo-gallery-poster">
                 </div>
  </a>
  <p class="capt"><?= $row->Empresa_razon."(".$row->Venta_fecha.")" ?></p>
      </li>
      <?php  } ?>
  
</ul>     
    </div> </div>  <!-- end of demo-gallery -->   
    
      
</div>      <!--end -->
</div>     <!-- end of row -->
</div>     <!-- end of container -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script src='https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js'></script>
<script src='https://sachinchoolur.github.io/lightGallery/lightgallery/js/lightgallery.js'></script>
<script src='https://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-fullscreen.js'></script>
<script src='https://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-autoplay.js'></script>
<script src='https://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-zoom.js'></script>
<script src='https://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-hash.js'></script>
<script src='https://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-pager.js'></script>
<script src='https://sachinchoolur.github.io/lightGallery/external/jquery.mousewheel.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.7/js/lg-thumbnail.min.js'></script>

  

    <script  src="../assets/js/lightgallery_index.js"></script>




</body>

</html>
