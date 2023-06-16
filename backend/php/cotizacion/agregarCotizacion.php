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
    $config->SetIdCliente($_POST['id_cliente']);
    $config->SetIdEmpleado($_POST['id_empleado']);
    $config->SetIdMaterial($_POST['id_material']);
    $config->SetCantidadMaterial($_POST['cantidad_material']);
    $config->SetCantidadDias($_POST['dias_servicio']);
    
    $config->InsertData();

    echo "<script>alert('Cotizacion realizada');document.location='cotizacion.php'</script>";
}

?>