<?php 

    //Excepción propia lanzada cuando la contraseña no tiene los párametros deseados
    //los cuales son: Mínimo 5 y máximo 10 caracteres, formados por letras y números.
    //Esta excepción debe ser lanzada en el momento en que el usuario quiera registrarse

    class ContraseñaException extends Exception{


        public function errorMessage(){
            
            $errorMsg = 'Error en la línea '.$this->getLine().' en el archivo '. $this->getFile() .': <b>'.$this->getMessage().'</b> no es una contraseña válida';
            
            return $errorMsg;

        }

        
    }

?>