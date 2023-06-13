<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------

require_once('config.php');
$config = new Config();

$id = $_GET['id_cliente'];
$config->SetIdCliente($id);
$data = $config->SelectOne();
$value= $data[0];

if(isset($_POST['editar'])){
    $config->SetNombreCliente($_POST['nombre_cliente']);
    $config->SetCelular($_POST['celular']);
    $config->SetNit($_POST['nit']);

    $config->Update();

    echo "<script>alert('los datos han sido modificados con exito');document.location='clientes.php'</script>";
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <title>AlquilArtemis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../frontend/css/styles.css">
</head>
<body>

    <header>
        <img src="../../../frontend/images/logoo.png" alt="">
        <nav>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link fs-3" href="../materiales/materiales.php" id="link">Materiales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3" href="../cotizacion/cotizacion.php" id="link">Cotizacion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3" href="../clientes/clientes.php" id="link">Clientes</a>
                </li>
                
            </ul>
        </nav>
    </header>
    <main class="main">
        <form action="" class="col d flex flex-wrap" method="post">
            <!-- //todo   seccion edicion del nombre -->
            <div class="form-label" id="div">
                <label for="nombre_cliente">Nombre del Cliente</label>
                <input 
                    type="text"
                    name="nombre_cliente"
                    id="inputs"
                    class="form-control"
                    value = "<?php echo $value['nombre_cliente']; ?>">
            </div>
            <!-- //todo   seccion edicion del nombre -->
            <div class="form-label" id="div">
                <label for="celular">Celular</label>
                <input 
                    type="number"
                    name="celular"
                    id="inputs"
                    class="form-control"
                    value = "<?php echo $value['celular']; ?>">
            </div>

            <div class="form-label" id="div">
                <label for="nit">Nit</label>
                <input 
                    type="number"
                    name="nit"
                    id="inputs"
                    class="form-control"
                    value = "<?php echo $value['nit']; ?>">
            </div>

            <!-- //todo   Boton Editar -->
            <div class=" col-12 m-2">
                <input type="submit" class="btn btn-warning" value="UPDATE" name="editar"/>
              </div>
        </form>

        
    </main>

    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>