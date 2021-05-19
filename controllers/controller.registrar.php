<?php 
    //Inicializamos la sesión e incluimos la clase Usuario, ademas de 
    //incluir la vista del propio login, las funciones gestoras de la BBDD y la excepción.
    
    require_once 'functions/funciones.php';
    require_once '../db/funcionesBD.php';
    require_once 'Exceptions/ContraseñaException.php';
    require_once '../models/Usuario.php';
    
    session_start();

    $errores='';
    $enviado='';
    $nombre= null;
    $password = null;
    $repit = null;

    if(isset($_POST['enviar'])){

        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $repit = $_POST['repit'];

        $errores = validaFormularioRegistrar($errores,$nombre,$password,$repit);

        if(!$errores){
        
            $enviado='true';
        
            $conexion = conexionBD(3306,'BDTienda','usuario','usuario');
            
            $registrarBD = booleanInsertadasDosValores($conexion,'usuarios','usuario','password',$nombre,password_hash($password,PASSWORD_DEFAULT));

            if($registrarBD){

                $usuario = new Usuario($nombre, $password);
                $_SESSION['usuario'] = $usuario;

                header('Location: controller.listado.php');

            }else{

                $errores = 'No se ha registrado el usuario con éxito.';

            }

        }

    }

    include '../views/view.registrar.php';

?>