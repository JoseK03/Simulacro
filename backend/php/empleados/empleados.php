<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------


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
        <button type="button" class="btn boton" data-bs-toggle="modal" data-bs-target="#registrarEmpleados" data-bs-whatever="@mdo">Agregar Empleado</button>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>ELIMINAR</th>
                    <th>EDITAR</th>
                </tr>
            </thead>
            <tbody>
                <!-- //todo----llenado dinamico -->
                <?php
                    foreach ($all as $key => $value) {
                    
                ?>
                <tr class="table-active">
                    <td><?php echo $value['id_material']?></td>
                    <td><?php echo $value['nombre_material']?></td>
                    <td><?php echo $value['precio']?></td>
                    <td> <a href="eliminarMateriales.php?id_material=<?=$value['id_material']?>&req=delete" class="btn btn-danger">ELIMINAR</a></td>    
                    <td><a class="btn btn-warning" href="modificarMateriales.php?id_material=<?=$value['id_material']?>">EDITAR</a></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </main>

    <!-- modal registrar cliente -->



<div class="modal fade" id="registrarEmpleados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Empleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="agregarEmpleados.php" method="POST">
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Username</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Password</label>
                <input type="text" class="form-control" name="password">
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                <input type="submit" class="btn btn-warning" value="Registrar nuevo empleado" name="agregar"/>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>