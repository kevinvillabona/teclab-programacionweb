<?php
/* @autor Kevin Villabona */
class autoload{
    
    static public function autocarga($clase){
        $class = array();
        $class['productos'] = '../class/productos.php';
        $class['categorias'] = '../class/categorias.php';
        $class['database'] = '../class/database.php';
        
        if (isset($class[$clase])){
            include $class[$clase];
        } else {
            echo "NO SE DEFINIO EN EL AUTOLOAD LA CLASE ".$clase;
            die();
        }
    }
    
    
}

spl_autoload_register('autoload::autocarga');