<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------

if(isset($_POST['agregar'])){
    require_once('config.php');
    $config = new ConfigCotizacion();
    $config->SetFechaCotizacion($_POST['fecha_cotizacion']);
    $config->SetHoraCotizacion($_POST['hora_cotizacion']);
    $config->SetIdCliente($_POST['cliente']);
}

?>