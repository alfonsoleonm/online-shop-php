<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'funciones.php';
    require_once 'vendor/autoload.php';
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        $cliente = new Alfonsoleonproj\Cliente;

        $_params = array(
            'nombre' => $_POST['nombre'],
            'apellidos' => $_POST['apellidos'],
            'email' => $_POST['email'],
            'telefono' => $_POST['telefono'],
            'direccion' => $_POST['direccion'],
            'comentario' => $_POST['comentario']
        );

        $cliente_id = $cliente->registrar($_params);

        $pedido = new Alfonsoleonproj\Pedido;

        $_params = array(
            'cliente_id' => $cliente_id,
            'total' => calcularTotal(),
            'fecha' => date('Y-m-d'),
            'direccion' => $_POST['direccion']
        );

        $pedido_id = $pedido->registrar($_params);

        foreach($_SESSION['carrito'] as $indice => $value){
            $_array = array(
                "producto_id" => $value['id'], 
                "pedido_id" => $pedido_id, 
                "precio_producto" => $value['precio_publico'], 
                "cantidad" => $value['cantidad'] 
            );

            $pedido->registrarDetalle($_array);
        }

        $_SESSION['carrito'] = array();

        header('Location: gracias.php');
    }
}
