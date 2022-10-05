<?php 
session_start();

require_once 'funciones.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light">
        <a href="/online-shop/index.php" class="navbar-brand mb-0 h1">
            <img src="/online-shop/assets/imgs/logo-crown.png" height="50" width="75">
            A.L Store
        </a>

        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido" class="navbar-toggler" aria-controls="navbarContenido" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- buttons -->
        <div class="collapse navbar-collapse" id="navbarContenido">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="carrito.php" class="btn btn-outline-dark">
                        Carrito <span class="badge bg-dark"><?php print cantidadProductos(); ?></span>
                    </a>
                </li>
            </ul>
        </div>

    </nav>
    <!--navbar principal -->


</body>