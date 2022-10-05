<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['nombre_usuario'];
    $password = $_POST['clave_usuario'];

    require '../vendor/autoload.php';
    $usuario = new Alfonsoleonproj\Usuario;
    $resultado = $usuario->login($username, $password);

    if($resultado){
        session_start();
        $_SESSION['user_info'] = array(
            'username'=>$resultado['username']
        );
        header('Location: dashboard.php');
    }else{
        exit(json_encode(array('estado'=>FALSE, 'mensaje'=>'Error al iniciar sesion')));
    }
}