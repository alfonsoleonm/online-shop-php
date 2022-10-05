<?php

function agregarProducto($resultado, $id, $cantidad = 1){
    $_SESSION['carrito'][$id] = array(
        'id'=> $resultado['id'],
        'titulo'=> $resultado['titulo'],
        'imagen'=> $resultado['imagen'],
        'precio_publico'=> $resultado['precio_publico'],
        'cantidad'=> $cantidad
    ); 
}


function calcularTotal(){
    $total = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
            $total += $value['precio_publico'] * $value['cantidad'];
        }
    }

    return $total;
}

function cantidadProductos(){
    $cantidad = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
            $cantidad++;
        }
    }

    return $cantidad;
}

function actualizarProducto($id, $cantidad = FALSE){
    if($cantidad){
        $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    }else{
        $_SESSION['carrito'][$id]['cantidad'] += 1;
    }

    
}