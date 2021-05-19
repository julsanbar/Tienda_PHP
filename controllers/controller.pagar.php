<?php 

    require '../models/Producto.php';
    require '../models/CestaCompra.php';
    require '../models/Usuario.php';
    require '../db/funcionesBD.php';
    require 'functions/funciones.php';

    session_start();
    //Verificamos que el usuario ha establecido conexión para evitar errores de inicialización
    if(isset($_SESSION['usuario'])){

        $cesta = $_SESSION['cesta'];

    }
    //Borramos la cesta de compra que teniamos hasta ahora para comenzar una nueva
    if(isset($_POST['nueva'])){

        unset($_SESSION['cesta']);
        header('Location: controller.listado.php');

    }
    //El desarrollador no pudo ver el enunciado antes y lo dejo con un button submit en lugar de un button a
    if(isset($_POST['borrar'])){

        header('Location: controller.logoff.php');

    }

    include_once '../views/view.pagar.php';

?>