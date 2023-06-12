

<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------
require_once("config.php");
$config = new Config;
$data = $config->ObtainAll();


 
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
    <main>
        <!-- //TODO   boton agregar cliente -->
        <button type="button" class="btn boton" data-bs-toggle="modal" data-bs-target="#registrarCliente" data-bs-whatever="@mdo">Agregar Cliente</button>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CELULAR</th>
                    <th>NIT</th>
                    <th>EDITAR</th>
                </tr>
            </thead>
            <tbody>
                <!-- //todo----llenado dinamico -->
                <?php 
                    foreach ($data as $key => $value) {
                    
                 ?>
                <tr class="table-active">
                    <td><?php echo $value['id_cliente']?></td>
                    <td><?php echo $value['nombre_cliente']?></td>
                    <td><?php echo $value['celular']?></td>
                    <td><?php echo $value['nit']?></td>
                    <td> <a href="eliminarClientes.php?id_cliente=<?=$value['id_cliente']?>&req=delete" class="btn btn-danger">ELIMINAR</a></td>    
                    <td><a href="" class="btn btn-warning">Editar</a></td>
                </tr>   
                

                <?php } ?>

            </tbody>
        </table>
    </main>

    <!-- modal registrar cliente -->



<div class="modal fade" id="registrarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="agregarClientes.php" method="POST">
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Celular</label>
                <input type="text" class="form-control" name="celular">
             </div>
             <div class="mb-3">
                <label for="message-text" class="col-form-label">NIT</label>
                <input type="text" class="form-control" name="nit">
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                <input type="submit" class="btn btn-warning" value="Registrar nuevo cliente" name="agregar"/>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>