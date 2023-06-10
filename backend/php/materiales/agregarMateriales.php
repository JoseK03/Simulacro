<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------

 if(isset($_POST['agregar'])){

     require_once("config.php");

     $config = new Config;
     $config->SetNombreMaterial($_POST['material']);
     $config->SetPrecio($_POST['precio']);

     $config->InsertData();

     echo "<script>alert('todos los datos fueron agregados exitosamente');document.location='materiales.php'</script>";


 }else{
    echo "hola";
 }
 

?>