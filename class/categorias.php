<?php
/* @autor Kevin Villabona */
// class categorias{
    
//     public $id;
//     public $nombre;
    
    
//     static public function listar(){
//         $db = new Database();
//         return $db->listar("categorias");
//     }
    
// }

class Categorias {

    protected $id;
    public $nombre;
    private $exists = false;

    function __construct($id = null) {
        if ($id) {
            $db = new Database();
            $response = $db -> select("categorias", "id=?", array($id));

            if (isset($response[0]['id'])) {
                $this -> id = $response[0]['id'];
                $this -> nombre = $response[0]['nombre_categoria'];
                $this -> exists = true;
            }
        }
    }

    public function category_show() {
        echo '<pre>';
        print_r($this);
        echo '</pre>';
    }

    public function guardar() {
        if ($this -> exists) return $this -> category_update();
        else return $this -> category_insert();
    }
    
    public function eliminar() {
        $db = new Database();
        return $db -> delete("categorias", "id = " . $this -> id);
    }
    
    private function category_insert() {
        $db = new Database();
        $response = $db -> insert("categorias", "nombre_categoria=?", "id=?", array($this -> nombre));

        if ($response) {
            $this -> id = $response;
            $this -> exists = true;
            return true;
        }
        else return false;
    }

    private function category_update() {
        $db = new Database();
        return $db -> update("categorias", "nombre_categoria=?", "id=?", array($this -> nombre));
    }

    static public function category_select() {
        $db = new Database();
        return $db -> select("categorias");
    }
}
