<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------

 require_once('config.php');
 $config = new ConfigCotizacion();
 $all = $config->ObtainAll();
 $todoCliente = $config->SelectCliente();
 $todoEmpleado = $config->SelectEmpleado();
 $todoMaterial = $config->SelectMaterial();

//? Boton detalle cotizacion----------

 
 

 
 
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
                <li class="nav-item">
                    <a class="nav-link fs-3" href="../empleados/empleados.php" id="link">Empleados</a>
                </li>
                
                
            </ul>
        </nav>
    </header>
    <main>
        <!-- //TODO   boton agregar cotizacion -->
        <button type="button" class="btn boton" data-bs-toggle="modal" data-bs-target="#registrarCotizacion" data-bs-whatever="@mdo">Agregar Cotizacion</button>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FECHA</th>
                    <th>CLIENTE</th>
                    <th>MATERIAL</th>
                    <th>DETALLE</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <!-- //todo----llenado dinamico -->
               <!--  <?php 
                    foreach ($all as $key => $value) {
                    
                 ?> -->
                <tr class="table-active">
                    <td><?php echo $value['id_cotizacion']?></td>
                    <td><?php echo $value['fecha_cotizacion']?></td>
                    <td><?php echo $value['nombre_cliente']?></td>
                    <td><?php echo $value['nombre_material']?></td>
                    <td><a href="cotizacion.php?id_cliente=<?=$value['id_cliente']?>&req=delete" class="btn btn-danger">ELIMINAR</a></td>    
                    <td><a href="detalleCotizacion.php?id_cotizacion=<?=$value['id_cotizacion']?>" class="btn btn-warning">DETALLE COTIZACION</a></td>
                </tr>   
                <?php } ?>



            </tbody>
        </table>
    </main>
        <!-- MODAL DETALLE COTIZACION --
    <!-- modal registrar cliente -->
    <div class="modal fade" id="registrarCotizacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Cotizacion</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="agregarCotizacion.php" method="POST">
                <div class="mb-3">
                    <label for="fecha" class="col-form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha_cotizacion" id="fecha">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Hora</label>
                    <input type="time" class="form-control" name="hora_cotizacion">
                </div>
                <div class="mb-3">
                    <label for="id_cliente" class="col-form-label">Cliente</label>
                    <select name="id_cliente" id="id_cliente">
                        <?php foreach ($todoCliente as $key => $value) { ?>
                            <option value="<?php echo $value ['id_cliente'] ?>" ><?php echo $value['nombre_cliente'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_empleado" class="col-form-label">Asesor</label>
                    <select name="id_empleado" id="id_empleado">
                        <?php foreach ($todoEmpleado as $key => $value) { ?>
                            <option value="<?php echo $value['id_empleado'] ?>"><?php echo $value['nombre_empleado'] ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_material" class="col-form-label">Material</label>
                    <select name="id_material" id="id_material">
                        <?php foreach ($todoMaterial as $key => $value) { ?>
                        <option value="<?php echo $value['id_material'] ?>"><?php echo $value['nombre_material']?></option> 
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="col-form-label">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad_material" id="cantidad">
                </div>
                <div class="mb-3"> 
                    <label for="dias_servicio" class="col-form-label">Dias a tomar el servicio</label>
                    <input type="number" class="form-control" name="dias_servicio" id="dias_servicio">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                    <input type="submit" class="btn btn-warning" value="Generar Cotización" name="agregar"/>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>