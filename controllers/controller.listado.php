<?php 

    require '../db/funcionesBD.php';
    require 'functions/funciones.php';
    require '../models/Producto.php';
    require '../models/CestaCompra.php';
    require '../models/Usuario.php';

    session_start();

    $conexion = conexionBD(3306,'BDTienda','usuario','usuario');
    $productos = consultaGlobalASOC($conexion,'productos');

    $errores = '';
    $producSeleccionados = null;
    //Recogemos todos los productos seleccionados, y verificamos si existen o no.
    //Se busca por código, ya que al realizar un ArrayObject, no se puede tener todo un 
    //objeto en un value, pues nos retorna un string. Por lo que instanciamos el objeto
    //correspondiente, en el momento en que encontremos el código seleccionado
    if(isset($_POST['lista'])){

        if(!empty($_POST['producs'])){
            
            $producSeleccionados = $_POST['producs'];
                
        }else{
            
            $errores .= 'No ha seleccionado ningún producto.<br>';
        
        }
        
        if(!$errores){

            $cesta = new CestaCompra();

            foreach($productos as $prod){

                foreach($producSeleccionados as $codigo){

                    if(strcmp($prod['codigo'],$codigo) == 0){

                        if(isset($_SESSION['cesta'])){

                            $cesta = $_SESSION['cesta'];

                            $cesta->add(new Producto($prod['codigo'],$prod['nombre'],$prod['nombre_corto'],$prod['pvp']));

                        }else{
            
                            $cesta->add(new Producto($prod['codigo'],$prod['nombre'],$prod['nombre_corto'],$prod['pvp']));
            
                        }

                        
                    }

                }

            }

            $_SESSION['cesta'] = $cesta;

            header('Location: controller.cesta.php');    

        }


    }

    /***************************************************************************************************************/
    //Se hace mediante un botón de submit, porque el desarrollador no vio el enunciado hasta que era demasiado tarde.
    /***************************************************************************************************************/
    if(isset($_POST['borrar'])){

        header('Location: controller.logoff.php');

    }

    include_once '../views/view.listado.php';

?>