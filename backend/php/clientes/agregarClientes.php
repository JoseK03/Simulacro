<?php

 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------

if(isset($_POST['agregar'])){
    require_once("config.php");
    $config = new Config();
    $config->SetNombreCliente($_POST['nombre']);
    $config->SetCelular($_POST['celular']);
    $config->SetNit($_POST['nit']);

    $config->InsertData();

    echo "<script>alert('Cliente agregado exitosamente');document.location='clientes.php'</script>  ";
}

?>