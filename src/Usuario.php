<?php
namespace Alfonsoleonproj;

class Usuario{
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

    public function login($username, $password){
        $sql ="SELECT username FROM usuarios WHERE username = :username AND password = :password ";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":username" => $username,
            ":password" => $password
        );
        
        if ($resultado->execute($_array))
            return $resultado->fetch(); //fetch porque solo es un resultado
        return false;
    }
    
}