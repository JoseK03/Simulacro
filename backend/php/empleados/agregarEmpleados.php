<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------
if(isset($_POST['agregar'])){
    require_once('config.php');
    $config = new Config();
    $config->SetNombreEmpleado($_POST['nombre']);
    $config->SetContraseña($_POST['contraseña']);
    $config->InsertData();

    echo "<script>alert('Empleado registrado con exito');document.location='empleados.php'</script>";
}

?>