<?php
/* @autor Kevin Villabona */
class categorias{
    
    public $id;
    public $nombre_categoria;
    
    
    static public function listar(){
        $db = new database();
        return $db->listar("categorias");
    }
    
}
