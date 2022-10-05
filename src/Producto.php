<?php
namespace Alfonsoleonproj;

class Producto{
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

        $sql = "INSERT INTO `productos`(`titulo`, `descripcion`, `categoria_id`, `precio_publico`, `margen_utilidad`, `imagen`) VALUES (:titulo, :descripcion, :categoria_id, :precio_publico, :margen_utilidad, :imagen)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":titulo" => $_params['titulo'], 
            ":descripcion" => $_params['descripcion'], 
            ":categoria_id" => $_params['categoria_id'], 
            ":precio_publico" => $_params['precio_publico'], 
            ":margen_utilidad" => $_params['margen_utilidad'], 
            ":imagen" => $_params['imagen']
        );

        if ($resultado->execute($_array))
            return true;
        return false;

    }


    public function actualizar($_params){
        $sql = "UPDATE `productos` SET `titulo`=:titulo,`descripcion`=:descripcion,`categoria_id`=:categoria_id,`precio_publico`=:precio_publico,`margen_utilidad`=:margen_utilidad,`imagen`=:imagen WHERE `id`=:id";


        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":titulo" => $_params['titulo'], 
            ":descripcion" => $_params['descripcion'], 
            ":categoria_id" => $_params['categoria_id'], 
            ":precio_publico" => $_params['precio_publico'], 
            ":margen_utilidad" => $_params['margen_utilidad'], 
            ":imagen" => $_params['imagen'],
            ":id" => $_params['id']
        );

        if ($resultado->execute($_array))
            return true;
        return false;
    }


    public function eliminar($id){
        $sql ="DELETE FROM `productos` WHERE `id`=:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":id" => $id
        );

        if ($resultado->execute($_array))
            return true;
        return false;
    }


    public function mostrar(){
        $sql ="SELECT productos.id, titulo, descripcion, precio_publico, margen_utilidad, imagen, nombre FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id ORDER BY productos.id DESC";

        $resultado = $this->cn->prepare($sql);
        
        if ($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }


    public function mostrarPorId($id){
        $sql ="SELECT * FROM `productos` WHERE `id`=:id ";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":id" => $id
        );
        
        if ($resultado->execute($_array))
            return $resultado->fetch(); //fetch porque solo es un resultado
        return false;
    }
    
}