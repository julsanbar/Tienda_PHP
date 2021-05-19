<!doctype html>
<html lang="es">
  <head>
    <title>Registro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Archivo CSS Personalizado -->
    <link rel="stylesheet" href="../views/resources/css/estilos.css">

    <!-- Icono -->
    <link rel="shortcut icon" href="../views/resources/imgs/favicon.ico" type="image/x-icon">

    <!-- FUENTE Nanum Gothic, Crimson Text, Noto Sans SC GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&family=Nanum+Gothic:wght@700&family=Noto+Sans+SC&display=swap" rel="stylesheet">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
      
    <div class="container-fluid">

        <?php if(!isset($_SESSION['usuario'])): ?>

            <div class="row">
                <div class="col-md-6 offset-md-3 p-5">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                        <h4 class="text-center">Nuevo cliente</h4>
                        
                        <br>

                        <label for="inputUsuario">Nombre de usuario</label>
                        <input type="text" id="inputUsuario"  placeholder="José Manuel" name="nombre"  value="<?php if(!$enviado && isset($nombre)) echo $nombre; ?>">

                        <br>

                        <label for="inputPassword" class="mt-4">Contraseña</label>
                        <input type="password" id="inputPassword" placeholder="scoTT2206" name="password">
                
                        <br>

                        <label for="inputRepit" class="mt-4">Repetición Contraseña</label>
                        <input type="password" id="inputRepit" placeholder="scoTT2206" name="repit">

                        <hr>

                        <button type="submit" class="btn btn-primary" name="enviar">Crear</button>
                        <button type="reset" class="btn btn-danger ml-4">Limpiar</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-3 mb-2">
                
            <?php  if(!empty($errores)): ?>
                <div class = "error"> <?php echo $errores; ?> </div>
            <?php  endif;  ?>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-3">

                    <a class="btn btn-warning" href="../index.php" role="button">Volver al login</a>

                </div>
                
            </div>

        <?php else: ?>
            <div class="row">
                <div class="col-md-6 offset-md-3 p-5">


                    <h1 class="text-center p-4 noSesion rounded">¡YA HA INICIADO SESIÓN!</h1>

                    <a class="btn btn-outline-danger" href="controller.listado.php" role="button">Volver a la lista de productos</a>

                </div>

            </div>

        <?php endif; ?>

    </div>

  </body>
</html>