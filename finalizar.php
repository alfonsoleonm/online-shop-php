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
            <div class="main-form">
                <div class="col-md-12">
                    <fieldset>
                        <legend>Completar Datos</legend>
                        <form action="completar_pedido.php" method="post">
                            <div class="form-group">
                                <label for="titulo">Nombre</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" name="direccion" required>
                            </div>
                            <div class="form-group">
                                <label for="comentario">Comentarios</label>
                                <textarea type="text" class="form-control" rows="5" name="comentario"></textarea>
                            </div>
                            <br>

                            <div class="row">
                                <button type="submit" class="btn btn-primary btn-md  btn-block">Enviar</button>
                            </div>



                        </form>
                    </fieldset>
                </div>
            </div>
        </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>