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

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                        <h4 class="text-center">Productos disponibles</h4>

                        <hr>

                        <table class="table table-dark table-striped table-hover table-bordered ">
                            <thead>
                                <tr>
                                <!--
                                    COMO SE INDICA EN EL ENUNCIADO, EN LA CESTA DE COMPRA SOLO SE
                                    ALMACENAN UN ARRAY DE OBJETOS PRODUCTOS SIN CONTEMPLAR LAS CANTIDADES.

                                    SI SE QUIERE ALMACENAR MÁS OBJETOS EN LA CESTA COMPRA, SE TENDRÁ QUE 
                                    REDIRECCIONAR A ESTA PÁGINA DE NUEVO.
                                -->
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Nombre Corto</th>
                                    <th>Precio</th>
                                    <th>Seleccion</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php muestraProductosBD($productos);?>

                            </tbody>
                        </table>


                        <hr>

                        <button type="submit" class="btn btn-primary" name="lista">Aceptar</button>
                        <button type="submit" class="btn btn-danger ml-4" name="borrar">Cerrar Sesión</button>
                    </form>
                
                <?php else: ?>

                    <h1 class="text-center p-4 noSesion rounded">¡NO HA INICIADO SESIÓN!</h1>
                    
                    <a class="btn btn-outline-danger" href="../index.php" role="button">Volver al login</a>

                <?php endif; ?>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3 p-5">

        <?php  if(!empty($errores)): ?>
            <div class = "error"> <?php echo $errores; ?> </div>
        <?php  endif;  ?>

            </div>
        </div>

    </div>

  </body>
</html>