<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------

require_once('config.php');
$config = new Config();
if(isset($_GET['id_empleado']) && isset($_GET['req'])){
    if(isset($_GET['req']) == 'delete'){

        $config->SetIdEmpleado($_GET['id_empleado']);
        $config->Delete();

        echo "<script>alert('Datos borrados exitosamente');document.location='empleados.php'</script>";


    }
}
?>