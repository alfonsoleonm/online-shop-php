<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Alfonso Leon Store</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/estilos.css">

</head>

<body>

  <!-- Fixed navbar -->
  <?php require_once('menuBar.php') ?>

  <div class="container" id="main">
    <div class="row">
      <?php
      require 'vendor/autoload.php';
      $producto = new Alfonsoleonproj\Producto;


      $info_producto = $producto->mostrar();
      $cantidad = count($info_producto);

      if ($cantidad > 0) {
        for ($x = 0; $x < $cantidad; $x++) {
          $item = $info_producto[$x];
      ?>
          <div class="col-md-3">
            <div class="card">

              <?php
              $imagen = 'upload/' . $item['imagen'];
              if (file_exists($imagen)) {
              ?>
                <img src="upload/<?php print $item['imagen'] ?>" alt="img" class="card-img-top">
              <?php
              } else {

              ?>
                <img src="assets/imgs/no-image.jpg" alt="img" class="card-img-top">
              <?php } ?>
              <div class="card-body">
                <h3 class="text-center card-title"><?php print $item['titulo'] ?></h1>
              </div>

              <div class="card-footer">
                <a href="carrito.php?id=<?php print $item['id'] ?>" class="btn btn-success">
                  <span class="glyphicon glyphicon-shopping-cart"></span>
                  Comprar
                </a>
              </div>

            </div>
          </div>
          <?php
        }
      } else {
        print "<h4> NO HAY REGISTROS </h4>";
      }

      ?>
    </div>

  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>