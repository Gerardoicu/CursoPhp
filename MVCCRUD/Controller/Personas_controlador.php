<?php

require_once("Model/Personas_modelo.php");
$personas=new Personas_modelo();
$matrizPersonas=$personas->get_personas();
require_once("View/Personas_view.php");
?>