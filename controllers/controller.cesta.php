<?php 

    require '../models/Producto.php';
    require '../models/CestaCompra.php';
    require '../models/Usuario.php';
    require '../db/funcionesBD.php';
    require 'functions/funciones.php';

    session_start();
    //Vemos si el usuario esta conectado o no para evitar errores de inicialización
    if(isset($_SESSION['usuario'])){

        $cesta = $_SESSION['cesta'];

    }
    //Vaciamos la cesta
    if(isset($_POST['vaciar'])){

        unset($_SESSION['cesta']);
        header('Location: controller.listado.php');

    }

    /***************************************************************************************************************/
    //Se hace mediante un botón de submit, porque el desarrollador no vio el enunciado hasta que era demasiado tarde.
    /***************************************************************************************************************/
    if(isset($_POST['borrar'])){

        header('Location: controller.logoff.php');

    }
    //Guardamos la cesta de compra en un txt
    if(isset($_POST['guardar'])){

        escrituraSerializadoVALIDA('copiaCesta.txt',$cesta);

    }

    include_once '../views/view.cesta.php';

?>