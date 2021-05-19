<!doctype html>
<html lang="es">
  <head>
    <!-- VERIFICAMOS SI EL USUARIO HA INICIADO SESIÓN Y EN TAL CASO CAMBIAMOS EL title -->
    <?php if(isset($_SESSION['usuario'])): ?>

        <title><?php echo $_SESSION['usuario']->getNombre(); ?></title>

    <?php else: ?>

        <title>Anónimo</title>

    <?php endif; ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Archivo CSS Personalizado -->
    <link rel="stylesheet" href="../views/resources/css/estilos.css">

    <!-- FUENTE Nanum Gothic, Crimson Text, Noto Sans SC GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&family=Nanum+Gothic:wght@700&family=Noto+Sans+SC&display=swap" rel="stylesheet">

    <!-- Icono -->
    <link rel="shortcut icon" href="../views/resources/imgs/favicon.ico" type="image/x-icon">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
      
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-6 offset-md-3 p-5">

                <?php if(isset($_SESSION['usuario'])): ?>

                    <h4 class="text-center">Cesta de compra</h4>

                    <hr>

                    <table class="table table-dark table-striped table-hover table-bordered ">
                        <thead>
                            <tr>

                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Nombre Corto</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php muestraProductosSesion($cesta);?>

                        </tbody>
                        <tfoot>

                            <?php precioTotal($cesta); ?>

                        </tfoot>
                    </table>

                    <hr>

                    <table class="offset-md-1">
                        <td>
                            <a class="btn btn-success" href="controller.pagar.php" role="button">Pagar</a>
                        </td>

                        <td class="pl-3 pr-3">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                                <button type="submit" class="btn btn-warning mt-2 mb-2" name="vaciar">Vaciar Cesta</button>

                            </form>
                        </td>

                        <td>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                                <button type="submit" class="btn btn-danger" name="borrar">Cerrar Sesión</button>

                            </form>                        
                        </td>
                        
                        <td class="pl-3">

                            <!--
                                El desarrollador se quedo sin colores de bootstrap por lo que tuvo que elegir uno
                                medianamente visible.
                            --> 

                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                                <button type="submit" class="btn btn-secondary" name="guardar">Guardar Cesta</button>

                            </form>

                        </td>
                    </table>

                    <div class="row">
                        <div class="col-md-10 offset-md-1 mt-5 pb-3">

                            <h4 class="text-center">¿Te has quedado con ganas de más?</h4>
                        
                            <br>

                            <a href="controller.listado.php" class="offset-md-5 btn btn-primary btn-lg" role="button">¡Seguir comprando!</a>

                        </div>
                    </div>

                <?php else: ?>
                    <!-- MENSAJE AL NO TENER LA SESION INICIADA-->
                    <h1 class="text-center p-4 noSesion rounded">¡NO HA INICIADO SESIÓN!</h1>
                    
                    <a class="btn btn-outline-danger" href="../index.php" role="button">Volver al login</a>

                <?php endif; ?>

            </div>
        </div>

    </div>

  </body>
</html>