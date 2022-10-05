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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">

</head>

<body>

    <!-- Fixed navbar -->
    <?php require_once('../menuBar.php') ?>

    <div class="container" id="main">

        <div class="main-login">
            <form action="login.php" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center">ACCESOS AL PANEL</h3>
                    </div>
                    <div class="panel-body">
                        <p class="text-center">
                            <img src="../assets/imgs/logo.png" alt="logo" width="80%">
                        </p>

                        <div class="form-group">
                            <!-- 
                                You can adjust the width of your block buttons with grid column width classes. For example, for a half-width “block button”, use .col-6. Center it horizontally with .mx-auto, too.
                            -->
                            <div class="d-grid gap-2">
                                <label for="">Usuario:</label>
                                <input type="text" class="form-control" name="nombre_usuario" placeholder="username" required>

                                <label for="">Contraseña:</label>
                                <input type="password" class="form-control" name="clave_usuario" placeholder="password" required>

                                <button type="submit" class="btn btn-outline-primary">Login</button>
                            </div>
                        </div>


                    </div>
                </div>
            </form>
        </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

</body>

</html>