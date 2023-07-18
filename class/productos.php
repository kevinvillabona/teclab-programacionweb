<?php
/* @autor Kevin Villabona */
class productos{
    
    public $id;
    public $nombre_producto;
    public $precio_producto;
    public $categoria_id;
    public $descripcion_producto;
    public $imagen_producto;
    
    static public function listar(){
        $db = new database();
        return $db->listar("productos");
    }
    
}

?>