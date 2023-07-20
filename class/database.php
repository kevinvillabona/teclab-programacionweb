<?php
/* @autor Kevin Villabona */

define('errorSelect', 'No se ha podido realizar la consulta');
define('errorInsert', 'Error al insertar los datos');
define('errorUpdate', 'Error al actualizar los datos');
define('errorDelete', 'Error al eliminar el registro');
class Database{
    
    private $conexion;
    
    function __construct() {
        $conexion = new PDO("mysql:host=localhost:3306;port=3306;dbname=miproyecto", "root", "");
        if ($conexion){
           $this->conexion = $conexion; 
        } else {
            echo "NO ME PUDE CONECTAR";
        }
    }
    //////////////////////////////////////////////
    //          Codigo con Aquiles
    /////////////////////////////////////////////
    //
    // public function listar($table_name){
    //     $sql = "SELECT * FROM ".$table_name;
    //     $resource = $this->conexion->query($sql);
    //     if (!$resource){
    //         echo "Revisar la consulta";
    //         echo "<pre>";
    //         print_r($resource);
    //         echo "</pre>";
    //     } else {
    //         $result = $resource->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     }
    // } 

    function select($tabla, $filtros = null, $arr_prepare = null, $order = null, $limit = null) {
        $sql = "SELECT * FROM " . $tabla;

        if ($filtros != null) $sql .= " WHERE " . $filtros;
        if ($order != null) $sql .= " ORDER BY " . $order;
        if ($limit != null) $sql .= " LIMIT " . $limit;
        
        $resource = $this -> conexion -> prepare($sql);
        $resource -> execute($arr_prepare);

        if ($resource) return $resource -> fetchAll(PDO::FETCH_ASSOC);
        else {
            echo '<pre>';
            print_r($this -> conexion -> errorInfo());
            echo '</pre>';

            throw new Exception(errorSelect);
        }
    }
    
    function delete($tabla, $condition = null, $arr_prepare = null) {
        $sql = "DELETE FROM " . $tabla . " WHERE " . $condition;

        $resource = $this -> conexion -> prepare($sql);
        $resource -> execute($arr_prepare);
        
        if ($resource) return $resource -> fetchAll(PDO::FETCH_ASSOC);
        else {
            echo '<pre>';
            print_r($this -> conexion -> errorInfo());
            echo '</pre>';

            throw new Exception(errorDelete);
        }
    }

    function insert($tabla, $campos, $valores, $arr_prepare = null) {
        $sql = "INSERT INTO " . $tabla . "(" . $campos . ") VALUES ($valores)";

        $resource = $this -> conexion -> prepare($sql);
        $resource -> execute($arr_prepare);

        if ($resource) {
            $this -> conexion -> lastInsertId();
            return $resource -> fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            echo '<pre>';
            print_r($this -> conexion -> errorInfo());
            echo '</pre>';

            throw new Exception(errorInsert);
        }
    }

    function update($tabla, $campo, $valor, $filtros, $arr_prepare = null) {
        $sql = "UPDATE " . $tabla . " SET " . $campo . ' = ' . $valor . " WHERE " . $filtros;

        $resource = $this -> conexion -> prepare($sql);
        $resource -> execute($arr_prepare);
        if ($resource) {
            return $resource -> fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            echo '<pre>';
            print_r($this -> conexion -> errorInfo());
            echo '</pre>';

            throw new Exception(errorUpdate);
        }
    }


}
