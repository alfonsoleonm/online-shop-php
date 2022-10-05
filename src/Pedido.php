<?php
namespace Alfonsoleonproj;

class Pedido{
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

        $sql = "INSERT INTO `pedidos`(`cliente_id`, `total`, `fecha`, `direccion`) 
        VALUES (:cliente_id, :total, :fecha, :direccion)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":cliente_id" => $_params['cliente_id'], 
            ":total" => $_params['total'], 
            ":fecha" => $_params['fecha'], 
            ":direccion" => $_params['direccion']
        );

        if ($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;

    }

    public function registrarDetalle($_params){
        $sql = "INSERT INTO `producto_pedido`(`producto_id`, `pedido_id`, `precio_producto`, `cantidad`) 
        VALUES (:producto_id, :pedido_id, :precio_producto, :cantidad)";
        $resultado = $this->cn->prepare($sql);
        

        $_array = array(
            ":producto_id" => $_params['producto_id'], 
            ":pedido_id" => $_params['pedido_id'], 
            ":precio_producto" => $_params['precio_producto'], 
            ":cantidad" => $_params['cantidad'] 
        );

        if ($resultado->execute($_array))
            return true;
        
        return false;

    }

    public function mostrar(){
        $sql = "select p.id, nombre, apellidos, email, c.direccion, total, fecha from pedidos p inner join clientes c on p.cliente_id = c.id order by p.id desc";
        $resultado = $this->cn->prepare($sql);
        if ($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id){
        $sql = "select p.id, nombre, apellidos, email, c.direccion, total, fecha from pedidos p inner join clientes c on p.cliente_id = c.id where p.id = :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':id'=> $id
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }

    public function mostrarDetallePorIdPedido($id){
        $sql = "select pp.id, titulo, precio_publico, cantidad, imagen from producto_pedido pp
        inner join productos p on p.id = pp.producto_id
        where pp.pedido_id = :id";
        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':id'=> $id
        );


        if ($resultado->execute($_array))
            return $resultado->fetchAll();

        return false;
    }


    public function mostrarUltimos(){
        $sql = "select p.id, nombre, apellidos, email, c.direccion, total, fecha from pedidos p inner join clientes c on p.cliente_id = c.id order by p.id desc limit 10";
        $resultado = $this->cn->prepare($sql);
        if ($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }
}