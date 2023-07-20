<?php
/* @autor Kevin Villabona */
class autoload{
    
    static public function autocarga($clase){
        $class = array();
        $class['Productos'] = '../class/productos.php';
        $class['Categorias'] = '../class/categorias.php';
        $class['Database'] = '../class/database.php';
        
        if (isset($class[$clase])){
            include $class[$clase];
        } else {
            echo "No se definio en el autoload la clase: ".$clase;
            die();
        }
    }
    
    
}

spl_autoload_register('autoload::autocarga');