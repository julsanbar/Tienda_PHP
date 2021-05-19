<?php 
    //Destruimos la sesión y nos vamos al login
    session_start();
    session_destroy();
    header('Location: ../index.php');

?>