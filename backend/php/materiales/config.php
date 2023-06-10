<?php
    //? Lector de errores

    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);
    
    error_reporting(E_ALL);

    //?------------------------------

    require_once("../../config/db.php");
    require_once("../../config/conectar.php");

    //? Crear la clase

    class Config extends Conectar{

        private $id_material;
        private $nombre_material;
        private $precio;

        public function __construct($id_material = 0, $nombre_material = "", $precio = "");

    }

?>
