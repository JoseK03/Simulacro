<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------

require_once('config.php');
$config = new Config();

if(isset($_GET['id_material']) && isset($_GET['req'])){
    if($_GET['req']=='delete'){
            
        $config->Delete();

        echo "<script>alert('los datos se borraron exitosamente');document.location='materiales.php'</script>";
    }
}else{
    echo "hola";
}
echo "holaaa";
?>