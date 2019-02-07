<?php

require_once("Model/Productos_modelo.php");
$producto=new Productos_modelo();
$matrizProductos=$producto->get_productos();
require_once("View/Productos_view.php");
?>