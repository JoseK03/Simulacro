<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------

require_once('config.php');
$config = new Config();

if(isset($_GET['id_cliente']) && isset($_GET['req'])){
    if($_GET['req'] == 'delete'){

        $config->SetIdCliente($_GET['id_cliente']);
        $config->Delete();

        echo "<script>alert('los datos han sido borrados exitosamente');document.location='clientes.php'</script>";
    }else{
    echo "hgola";
    }
}



?>