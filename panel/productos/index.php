<?php
session_start();


if (!isset($_SESSION['user_info']) or empty($_SESSION['user_info'])) {
  header('Location: ../index.php');
}

?>

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
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/estilos.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>

  <!--  -->
  <?php require_once('../menuBarAdmin.php') ?>

  <div class="container" id="main">

    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-end">
          <a href="form_registrar.php" class="btn btn-success"><i class="bi-plus-circle" style="font-size: 1rem; color: white;"></i></a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <fieldset>
          <legend>Listado de Productos</legend>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio P.</th>
                <th>Margen u.(%)</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              require '../../vendor/autoload.php';
              $producto = new Alfonsoleonproj\Producto;

              $info_producto = $producto->mostrar();
              $cantidad = count($info_producto);

              if ($cantidad > 0) {
                $cont = 0;
                for ($x = 0; $x < $cantidad; $x++) {
                  $cont++;
                  $item = $info_producto[$x];
              ?>
                  <tr>
                    <td><?php print $cont ?></td>
                    <td><?php print $item['titulo'] ?></td>
                    <td><?php print $item['nombre'] /* El nombre de la pelicula */ ?></td>
                    <td><?php print $item['precio_publico'] ?></td>
                    <td><?php print $item['margen_utilidad'] ?></td>
                    <td class="text-center">
                      <?php
                      $imagen = '../../upload/' . $item['imagen'];
                      if (file_exists($imagen)) {
                      ?>
                        <img src="<?php print $imagen ?>" alt="img" width="50">
                      <?php
                      } else {
                        print "SIN FOTO";
                      }

                      ?>
                    </td>
                    <td class="text-center">
                      <a href="../acciones.php?id=<?php print $item['id'] ?>" class="btn btn-danger"><i class="bi-trash" style="font-size: 1rem; color: white;"></i></a>
                      <a href="form_actualizar.php?id=<?php print $item['id'] ?>" class="btn btn-primary"><i class="bi-pencil" style="font-size: 1rem; color: white;"></i></a>
                    </td>
                  </tr>

                <?php
                }
              } else {


                ?>
                <tr>
                  <td colspan="6">NO HAY REGISTROS</td>
                  </trx>

                <?php
              }

                ?>

            </tbody>


          </table>
        </fieldset>
      </div>
    </div>

  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>

</body>

</html>