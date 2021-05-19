<?php 
    //Inicializamos la sesión e incluimos la clase Usuario, ademas de 
    //incluir la vista del propio login, las funciones gestoras de la BBDD y la excepción.
    
    require_once 'controllers/functions/funciones.php';
    require_once 'db/funcionesBD.php';
    require_once 'controllers/Exceptions/ContraseñaException.php';
    require_once 'models/Usuario.php';
    
    session_start();

    $errores='';
    $enviado='';
    $nombre= null;
    $password = null;

    if(isset($_POST['enviar'])){

        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        
        $errores = validaFormularioLogin($errores,$nombre,$password);

        //Una vez validado que no hay errores en el formulario, se prodece a
        //establecer la conexion a la BD, consultar por el nombre de usuario la password
        //y crear un objeto usuario que perdurará en la sesión usuario
        if(!$errores){
        
            $enviado='true';
        
            $conexion = conexionBD(3306,'BDTienda','usuario','usuario');
            
            $passwordBD = consultaUnParametroASOCPassword($conexion,'usuarios','usuario',$nombre);

            if(sizeof($passwordBD) !== 0){

                foreach($passwordBD as $item){

                    if(password_verify($password,$item['password'])){

                        $usuario = new Usuario($nombre, $password);
                        $_SESSION['usuario'] = $usuario;

                        header('Location: controllers/controller.listado.php');
        
                    }

                }

                $errores = 'La contraseña es errónea.';

            }else{

                $errores = 'No existe el usuario indicado.';

            }

        }

    }

    include 'views/view.login.php';

?>