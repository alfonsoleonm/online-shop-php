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
                <li class="nav-item active">
                    <a href="/online-shop/panel/pedidos/index.php" class="nav-link active">
                        Pedidos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/online-shop/panel/productos/index.php" class="nav-link">
                        Productos
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php print $_SESSION['user_info']['username'] ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/online-shop/panel/cerrar_session.php">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
    <!--navbar principal -->



</body>