<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------

require_once('../../config/conectar.php');
require_once('../../config/db.php');

class Config extends Conectar{

    private $nombre_empleado;
    private $contraseña;

    public function __construct($nombre_empleado = "", $contraseña = "", $dbCnx = "" )
    {
        $this->nombre_empleado;
    }
}

?>