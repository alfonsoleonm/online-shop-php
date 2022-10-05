<?php

//activar las sesiones
session_start();
require 'funciones.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    require 'vendor/autoload.php';

    $producto = new Alfonsoleonproj\Producto;

    $resultado = $producto->mostrarPorId($id);

    if (!$resultado)
        header('Location: index.php');

    if (isset($_SESSION['carrito'])) { //si el carrito existe

        //verificar si el producto existe en el carrito
        if (array_key_exists($id, $_SESSION['carrito'])) {
            //modificamos la cantidad
            actualizarProducto($id);
        } else {
            //si el producto no existe en el carrito
            agregarProducto($resultado, $id);
        }
    } else {
        //si el carrito no existe
        agregarProducto($resultado, $id);
    }
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body>

    <!-- Fixed navbar -->
    <?php require_once('menuBar.php') ?>

    <div class="container" id="main">

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Img</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                    $total = 0;
                    $contador = 0;
                    foreach ($_SESSION['carrito'] as $indice => $value) {
                        $contador++;
                        $total = $value['precio_publico'] * $value['cantidad'];
                ?>
                        <tr>
                            <form action="actualizar_carrito.php" method="post">
                                <td><?php print $contador; ?></td>
                                <td><?php print $value['titulo']; ?></td>
                                <td>
                                    <?php
                                    $imagen = 'upload/' . $value['imagen'];
                                    if (file_exists($imagen)) {
                                    ?>
                                        <img src="upload/<?php print $value['imagen'] ?>" alt="img" width="35">
                                    <?php
                                    } else {

                                    ?>
                                        <img src="assets/imgs/no-image.jpg" alt="img" width="35">
                                    <?php } ?>
                                </td>
                                <td>$<?php print $value['precio_publico']; ?></td>
                                <td>
                                    <input type="text" name="cantidad" class="form control u-size-100" value="<?php print $value['cantidad']; ?>">
                                    <input type="hidden" name="id" value="<?php print $value['id']; ?>">
                                </td>
                                <td>
                                    $<?php print $total ?>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-xs"><i class="bi-arrow-repeat" style="font-size: 1rem; color: white;"></i></button>
                                    <a href="eliminar_carrito.php?id=<?php print $value['id']; ?>" class="btn btn-danger btn-xs"><i class="bi-trash" style="font-size: 1rem; color: white;"></i></a>
                                </td>
                            </form>
                        </tr>

                    <?php
                    }
                } else {

                    ?>
                    <tr>
                        <td colspan="7">NO HAY PRODUCTOS EN EL CARRITO</td>
                    </tr>

                <?php

                }

                ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-end">Total</td>
                    <td>$<?php print calcularTotal();?></td>
                    <td></td>
                </tr>
            </tfoot>

        </table>
        
        <hr>
        <?php
            if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
        ?>

        <div class="row">
            <div class="col-md-6 d-flex justify-content-start">
                <a href="index.php" class="btn btn-primary">Seguir comprando</a>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="finalizar.php" class="btn btn-success">Finalizar compra</a>
            </div>
        </div>

        <?php } ?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>