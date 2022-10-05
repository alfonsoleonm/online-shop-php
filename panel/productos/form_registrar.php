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

        <div class="row justify-content-center">
            <div class="col-4">

                <fieldset>
                    <legend>Datos del Producto</legend>
                    <form method="POST" action="../acciones.php" enctype="multipart/form-data" class="d-grid gap-2">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" name="titulo" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea type="text" class="form-control" name="descripcion" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="categoria_id">Categoría</label>
                            <select name="categoria_id" class="form-control">
                                <option value="">--SELECCIONE--</option>
                                <?php
                                require '../../vendor/autoload.php';
                                $categoria = new Alfonsoleonproj\Categoria;

                                $info_categoria = $categoria->mostrar();
                                $cantidad = count($info_categoria);

                                if ($cantidad > 0) {
                                    $cont = 0;
                                    for ($x = 0; $x < $cantidad; $x++) {
                                        $cont++;
                                        $item = $info_categoria[$x];

                                ?>
                                        <option value="<?php print $item['id'] ?>"><?php print $item['nombre'] ?></option>

                                <?php
                                    }
                                }

                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="precio_publico">Precio al público</label>
                            <input type="number" class="form-control" name="precio_publico" placeholder="$0.00" required>
                        </div>

                        <div class="form-group">
                            <label for="margen_utilidad">% Margen de utilidad</label>
                            <input type="number" min="0" max="100" step="1" class="form-control" name="margen_utilidad" placeholder="0%" required>
                        </div>


                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control" name="imagen" required>
                        </div>

                        <input type="submit" name="accion" class="btn btn-success" value="Registrar">
                        <a href="index.php" class="btn btn-danger">Cancelar</a>
                    </form>
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