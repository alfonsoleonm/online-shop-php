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
        <fieldset>
          <legend>Listado de Pedidos</legend>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Cliente</th>
                <th># pedido</th>
                <th>Total</th>
                <th>Fecha</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              require '../../vendor/autoload.php';
              $pedido = new Alfonsoleonproj\Pedido;

              $info_pedido = $pedido->mostrar();
              $cantidad = count($info_pedido);

              if ($cantidad > 0) {
                $cont = 0;
                for ($x = 0; $x < $cantidad; $x++) {
                  $cont++;
                  $item = $info_pedido[$x];
              ?>
                  <tr>
                    <td><?php print $cont ?></td>
                    <td><?php print $item['nombre'] . " " . $item['apellidos']  ?></td>
                    <td><?php print $item['id'] /* El nombre de la pelicula */ ?></td>
                    <td>$<?php print $item['total'] ?></td>
                    <td><?php print $item['fecha'] ?></td>
                    <td class="text-center">
                      <a href="ver.php?id=<?php print $item['id'] ?>" class="btn btn-info"><i class="bi bi-eye" style="font-size: 1rem; color: white;"></i></a>
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