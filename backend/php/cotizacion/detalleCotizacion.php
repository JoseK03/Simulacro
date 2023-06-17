<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------
require_once('config.php');
/* $config = new ConfigCotizacion();

$id = $_GET['id_cotizacion'];   
$config->SetIdCotizacion($id);
$data = $config->ObtainAll();
$all = $config->SelectDetalle();
$value = $all[0]; */

$config = new ConfigCotizacion();
$all = $config->ObtainAll();

$todoCliente = $config->SelectCliente();
$todoEmpleado = $config->SelectEmpleado();
$todoMaterial = $config->SelectMaterial();
$value = $all[0];

//*-----

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
    <style>
        .empresaCliente{
            display: flex;
            gap: 25px
        }
        .empresaCliente div{
            width: 250px;
        }
        #producto{
            justify-content: space-between;
        }
    </style>
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
                <label for="nombre">Fecha</label>
                <input 
                    type="text"
                    name="fecha_cotizacion"
                    id="inputs"
                    class="form-control"
                    value = "<?php echo $value['fecha_cotizacion']; ?>   <?php echo $value['hora_cotizacion']; ?>">
            </div>
            <div class="empresaCliente">
                <div class="" id="">
                    <label for="nombre_empleado">Cliente</label>
                    <input 
                        type="text"
                        name="nombre_cliente"
                        id="inputs"
                        class="form-control"
                        value = "<?php echo $value['nombre_cliente']; ?>">
                </div>
                <!-- //todo   seccion edicion del nombre -->
                <div class="" id="">
                    <label for="nit">Nit</label>
                    <input 
                        type="text"
                        name="nit"
                        id="nit"
                        class="form-control"
                        value = "<?php echo $value['nit']; ?>">
                </div>
                <div class="" id="">
                    <label for="nombre">celular</label>
                    <input 
                        type="text"
                        name="celular"
                        id="inputs"
                        class="form-control"
                        value = "<?php echo $value['celular']; ?>">
                </div>
            </div>
            <div class="form-label" id="div">
                <label for="nombre">Asesor</label>
                <input 
                    type="text"
                    name=nombre_empleado"
                    id="inputs"
                    class="form-control"
                    value = "<?php echo $value['nombre_empleado']; ?>">
            </div>
            <div class="empresaCliente" id="producto">
                <div class="form-label" id="">
                    <label for="nombre">Material a alquilar</label>
                    <input 
                        type="text"
                        name="nombre_material"
                        id="inputs"
                        class="form-control"
                        value = "<?php echo $value['nombre_material']; ?>">
                </div>
                <div class="form-label" id="">
                <label for="nombre">Precio por dia</label>
                <input 
                    type="text"
                    name="precio"
                    id="inputs"
                    class="form-control"
                    value = "<?php echo $value['precio']; ?>">
            </div>
            </div>
            <div class="form-label" id="div">
                <label for="nombre">Cantidad de dias de servicio</label>
                <input 
                    type="text"
                    name="cantidad_dias"
                    id="inputs"
                    class="form-control"
                    value = "<?php echo $value['cantidad_dias']; ?>">
            </div>
            <div class="form-label" id="div">
                <label for="nombre">Total a pagar</label>
                <input 
                    type="text"
                    name="total_a_pagar"
                    id="inputs"
                    class="form-control"
                    value = "<?php echo $value['total_a_pagar']; ?>">
            </div>

            <!-- //todo   Boton Editar -->
            <div class=" col-12 m-2">
                <a href="cotizacion.php" class="btn btn-primary">REGRESAR</a>
              </div>
        </form>

        
    </main>

    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>