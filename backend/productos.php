<?php

include '../class/autoload.php';
$listado_categorias = categorias::listar();
include './views/productos.html';