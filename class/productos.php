<?php
/* @autor Kevin Villabona */
// class productos{
    
//     public $id;
//     public $nombre;
//     public $precio;
//     public $categoria;
//     public $descripcion;
//     public $imagen;
    
//     static public function listar(){
//         $db = new Database();
//         return $db->listar("productos");
//     }
    
// }

class Productos {
    protected $id;
    public $nombre;
    public $precio;
    public $categoria_id;
    public $descripcion;
    public $imagen;
    private $exists = false;

    function __construct($id = null) {
        $db = new Database();
        $response = $db -> select("productos", "id=?", array($id));

        if(isset($response[0]['id'])) {
            $this -> id = $response[0]['id'];
            $this -> nombre = $response[0]['nombre_producto'];
            $this -> descripcion = $response[0]['descripcion_producto'];
            $this -> precio = $response[0]['precio_producto'];
            $this -> categoria_id = $response[0]['categoria_id'];
            $this -> imagen = $response[0]['imagen_producto'];
            $this -> exists = true;
        }
    }

    public function product_show() {
        echo '<pre>';
        print_r($this);
        echo '</pre>';
    }
    
    public function guardar() {
        if ($this -> exists) return $this -> product_update();
        else return $this -> product_insert();
    }
    
    public function eliminar() {
        $db = new Database();
        return $db -> delete("productos", "id = " . $this -> id);
    }

    private function product_insert() {
        $db = new Database();
        $response = $db -> insert("productos",
        "nombre_producto=?, descripcion_producto=?, precio_producto=?, categoria_id=?, imagen_producto=?",
        "?,?,?,?", array($this -> nombre, $this -> descripcion, $this -> precio, $this -> categoria_id, $this -> imagen));

        if ($response) {
            $this -> id = $response;
            $this -> exists = true;
            return true;
        }
        else return false;
    }
    private function product_update() {
        $db = new Database();
        return $db -> update("productos",
        "nombre_producto=?, descripcion_producto=?, precio_producto=?, categoria_id=?, imagen_producto=?",
        "id=?", array($this -> nombre, $this -> descripcion, $this -> precio, $this -> categoria_id, $this -> imagen));
    }

    static public function product_select() {
        $db = new Database();
        return $db -> select("productos");
    }
}

?>