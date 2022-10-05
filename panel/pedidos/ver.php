<?php 
session_start();


if(!isset($_SESSION['user_info']) OR empty($_SESSION['user_info'])){
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
                    <?php
                    require_once '../../vendor/autoload.php';
                    $id = $_GET['id'];
                    $pedido = new Alfonsoleonproj\Pedido;

                    $info_pedido = $pedido->mostrarPorId($id);

                    $info_detalle_pedido = $pedido->mostrarDetallePorIdPedido($id);
                    ?>

                    <legend>Informacion de la Compra</legend>
                    <div class="form-group">
                        <label>Nombre del cliente: </label>
                        <input type="text" class="form-control" readonly value="<?php print $info_pedido['nombre'] . ' ' . $info_pedido['apellidos'] ?>">

                        <label>Email:</label>
                        <input type="text" class="form-control" readonly value="<?php print $info_pedido['email'] ?>">

                        <label>Dirección:</label>
                        <input type="text" class="form-control" readonly value="<?php print $info_pedido['direccion'] ?>">


                        <label>Fecha:</label>
                        <input type="text" class="form-control" readonly value="<?php print $info_pedido['fecha'] ?>">
                    </div>

                    <hr>
                    Productos Comprados
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Imagen</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $cantidad = count($info_detalle_pedido);

                            if ($cantidad > 0) {
                                $cont = 0;
                                for ($x = 0; $x < $cantidad; $x++) {
                                    $cont++;
                                    $item = $info_detalle_pedido[$x];
                                    $total = $item['precio_publico'] * $item['cantidad'];
                            ?>
                                    <tr>
                                        <td><?php print $cont ?></td>
                                        <td><?php print $item['titulo'] ?></td>
                                        <td class="text-center">
                                            <?php
                                            $imagen = '../../upload/' . $item['imagen'];
                                            if (file_exists($imagen)) {
                                            ?>
                                                <img src="<?php print $imagen ?>" alt="img" width="60">
                                            <?php
                                            } else {
                                                print "SIN FOTO";
                                            }

                                            ?>
                                        </td>
                                        <td>$<?php print $item['precio_publico'] ?></td>
                                        <td><?php print $item['cantidad'] ?></td>
                                        <td>$<?php print $total ?></td>
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

                    <div class="col-md-3">
                        <label>Total de la compra:</label>
                        <input type="text" class="form-control" readonly value="<?php print '$' . $info_pedido['total'] ?>">
                    </div>

                    
                </fieldset>
                <br>
                <div class="row">
                    <div class="col-md-6"><a href="index.php" class="btn btn-primary float-start">Regresar</a></div>
                    <div class="col-md-6"><a href="javascript:;" id="btnImprimir" class="btn btn-danger float-end">Imprimir</a></div>
                </div>
                
            </div>
        </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script>
        $('#btnImprimir').on('click', function(){
            window.print();
            return false;
        })
    </script>
</body>

</html>