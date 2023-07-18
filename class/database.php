<?php
/* @autor Kevin Villabona */
class database{
    
    private $conexion;
    
    function __construct() {
        $conexion = new PDO("mysql:host=localhost:3306;port=3306;dbname=miproyecto", "root", "");
        if ($conexion){
           $this->conexion = $conexion; 
        } else {
            echo "NO ME PUDE CONECTAR";
        }
    }
    
    public function listar($table_name){
        $sql = "SELECT * FROM ".$table_name;
        $resource = $this->conexion->query($sql);
        if (!$resource){
            echo "Revisar la consulta";
            echo "<pre>";
            print_r($resource);
            echo "</pre>";
        } else {
            $result = $resource->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }    
}
