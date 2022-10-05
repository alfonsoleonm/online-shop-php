<?php

print '<pre>';
print_r($_POST);
print_r($_FILES);

require '../vendor/autoload.php';

$producto = new Alfonsoleonproj\Producto;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* Solo que venga de un formulario con el método post */
    if ($_POST['accion'] === 'Registrar') {
        if (empty($_POST['titulo']))
            exit('Por favor complete el título');

        if (empty($_POST['descripcion']))
            exit('Por favor complete la descripción del producto');

        if (empty($_POST['categoria_id']))
            exit('Por favor elija una categoría');

        if (!is_numeric($_POST['categoria_id']))
            exit('Por favor seleccione una categoría válida');

        if (empty($_POST['precio_publico']))
            exit('Por favor complete el precio al publico');

        if (empty($_POST['margen_utilidad']))
            exit('Por favor complete el márgen de utilidad');

        $_params = array(
            'titulo' => $_POST['titulo'],
            'descripcion' => $_POST['descripcion'],
            'categoria_id' => $_POST['categoria_id'],
            'precio_publico' => $_POST['precio_publico'],
            'margen_utilidad' => $_POST['margen_utilidad'],
            'imagen' => subirImagen()
        );

        $rpt = $producto->registrar($_params);
        var_dump($rpt); /* para ver la longitud de la variable y su tipo ¨*/

        if ($rpt)
            header('Location: productos/index.php');
        else
            print 'Error al registrar el producto';
    }

    if ($_POST['accion'] === 'Actualizar') {
        if (empty($_POST['titulo']))
            exit('Por favor complete el título');

        if (empty($_POST['descripcion']))
            exit('Por favor complete la descripción del producto');

        if (empty($_POST['categoria_id']))
            exit('Por favor elija una categoría');

        if (!is_numeric($_POST['categoria_id']))
            exit('Por favor seleccione una categoría válida');

        if (empty($_POST['precio_publico']))
            exit('Por favor complete el precio al publico');

        if (empty($_POST['margen_utilidad']))
            exit('Por favor complete el márgen de utilidad');

        $_params = array(
            'titulo' => $_POST['titulo'],
            'descripcion' => $_POST['descripcion'],
            'categoria_id' => $_POST['categoria_id'],
            'precio_publico' => $_POST['precio_publico'],
            'margen_utilidad' => $_POST['margen_utilidad'],
            'id' => $_POST['id']
        );

        if (!empty($_POST['imagen_temp'])) {
            $_params['imagen'] = $_POST['imagen_temp'];
        }

        if (!empty($_POST['imagen']['name'])) {
            $_params['imagen'] = subirImagen();
        }

        $rpt = $producto->actualizar($_params);
        //var_dump($rpt); /* para ver la longitud de la variable y su tipo ¨*/

        if ($rpt)
            header('Location: productos/index.php');
        else
            print 'Error al actualizar el producto';
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $rpt = $producto->eliminar($id);

    if ($rpt)
        header('Location: productos/index.php');
    else
        print 'Error al eliminar el producto';
}


function subirImagen()
{
    $carpeta = __DIR__ . '/../upload/';
    $archivo = $carpeta . $_FILES['imagen']['name'];

    move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo); /* variable tempora, ruta */

    return $_FILES['imagen']['name']; /* este es el nombre con el que se va a subir*/
}
