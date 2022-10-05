<?php
namespace Alfonsoleonproj;

class Cliente{
    private $config;
    private $cn = null;


    public function __construct()
    {
        //la funcion que se encarga de parsear el archivo
        //DIR te saca el directorio 
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'], array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' //para trabajar con tíldes en la base de datos
        )); //los campos en config.ini


    }


    public function registrar($_params){

        $sql = "INSERT INTO `clientes`(`nombre`, `apellidos`, `email`, `telefono`, `direccion`, `comentario`) VALUES (:nombre,:apellidos,:email,:telefono,:direccion,:comentario)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'], 
            ":apellidos" => $_params['apellidos'], 
            ":email" => $_params['email'], 
            ":telefono" => $_params['telefono'], 
            ":direccion" => $_params['direccion'], 
            ":comentario" => $_params['comentario']
        );

        if ($resultado->execute($_array))
            return $this->cn->lastInsertId();
            
        return false;

    }


    
}