<?php

    /**
     * En esta página residen todas aquellas funciones que otorgan funcionalidad a cada
     * una de nuestras páginas.
     */

    function validaPassword($errores,$password){
            
        //Función que válida si la contraseña esta entre 5 y 10 carácteres, y solo tiene números y letras
        if(strlen($password) >= 5 && strlen($password) <= 10){

            $letras = 0;
            $numeros = 0;

            for ($i=0; $i < strlen($password); $i++) { 
                
                if(ctype_digit($password[$i])){

                    $numeros++;

                }

                if(ctype_alpha($password[$i])){

                    $letras++;

                }

                if(!ctype_digit($password[$i]) && !ctype_alpha($password[$i])){

                    $errores .= 'La contraseña solo puede tener números y letras<br>';

                }

            }

            if($numeros == 0 || $letras == 0){

                $errores .= 'La contraseña debe de tener números y letras.<br>';

            }

        }else{

            $errores .= 'La contraseña debe estar comprendida entre los 5 y 10 caracteres.';

        }

        return $errores;

    }

    //Devuelve la lista de errores detectada, la cual sirve para controlar la insercción.
    function validaFormularioLogin($errores,$nombre,$password){
        
        //Verificamos si el nombre introducido por el usuario para el login no tiene
        //carácteres especiales, ni algún otro similar para evitar ataques XSS por ejemplo.
        if(!empty($nombre)){
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Por favor introduzca nombre.<br>';
        }
         
        //Verificamos si la contraseña introducido por el usuario para el login no tiene
        //carácteres especiales, ni algún otro similar para evitar ataques XSS por ejemplo.
        if(!empty($password)){
            $password = filter_var($password, FILTER_SANITIZE_STRING);

            $errores .= validaPassword($errores,$password);

        }else{
            $errores .= 'Por favor introduzca una contraseña.<br>';
        }

        return $errores;

    }

    //Devuelve la lista de errores detectada, la cual sirve para controlar la insercción.
    function validaFormularioRegistrar($errores,$nombre,$password,$repit){
    
        //Verificamos si el nombre introducido por el usuario para el login no tiene
        //carácteres especiales, ni algún otro similar para evitar ataques XSS por ejemplo.
        if(!empty($nombre)){
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Por favor introduzca nombre.<br>';
        }
            
        //Verificamos si la contraseña introducido por el usuario para el login no tiene
        //carácteres especiales, ni algún otro similar para evitar ataques XSS por ejemplo.
        if(!empty($password)){
            $password = filter_var($password, FILTER_SANITIZE_STRING);

            $errores .= validaPassword($errores,$password);

        }else{
            $errores .= 'Por favor introduzca una contraseña.<br>';
        }

        if(!empty($repit)){
            $repit = filter_var($repit, FILTER_SANITIZE_STRING);

            if(strcmp($password,$repit) != 0){
                $errores .= 'La repetición de la contraseña no concuerda con la contraseña establecida.<br>';
            }

        }else{
            $errores .= 'Por favor introduzca la repetición de la contraseña.<br>';
        }

        return $errores;

    }

    //Muestra tabla productos de la base de datos
    function muestraProductosBD($productos){

        foreach($productos as $producto){

            echo "<tr>";

            echo "<td>".$producto['codigo']."</td>";
            echo "<td>".$producto['nombre']."</td>";
            echo "<td>".$producto['nombre_corto']."</td>";
            echo "<td>".$producto['pvp']."</td>";
            echo "<td class=\"text-center\"><input  type=\"checkbox\" value=\"".$producto['codigo']."\" name=\"producs[]\"></td>";

            echo "</tr>";

        }

    }

    //Muestra tabla productos seleccionados
    function muestraProductosSesion($cesta){

        foreach($cesta->getCesta() as $producto){
            
            echo "<tr>";

            echo "<td>".$producto->getCodigo()."</td>";
            echo "<td>".$producto->getNombre()."</td>";
            echo "<td>".$producto->getNombreCorto()."</td>";
            echo "<td>".$producto->getPrecio()."</td>";

            echo "</tr>";

        }

    }

    //Calcula el precio total de la compra
    function precioTotal($cesta){

        $sum = 0;

        foreach($cesta->getCesta() as $producto){
            
            $sum += $producto->getPrecio();

        }

        echo "<tr>";

        echo "<td colspan=\"2\">Total</td>";
        echo "<td colspan=\"2\">".$sum."€</td>";

        echo "</tr>";

    }

    //Escritura de producto por producto, verificando antes si existe el archivo
    //en tal caso se elimina el mismo
    function escrituraSerializadoVALIDA($archivo,$cesta){

        if(file_exists($archivo)){

            unlink($archivo);

        }

        foreach($cesta->getCesta() as $producto){
            
            $objSerializado = serialize($producto);

            file_put_contents($archivo,"$objSerializado \n",FILE_APPEND);

        }


    }

?>