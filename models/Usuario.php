<?php 

    //Esta clase sirve para poder controlar de forma
    //más precisa que usuario esta conectado, pues 
    //al guardar en la sesión tanto el nombre como la contraseña
    //ya podemos realizar una query rápida en un momento dado

    class Usuario{

        private $nombre;
        private $password;


        function __construct($nombre, $password){
            
            $this->nombre = $nombre;
            $this->password = $password;

        }

        public function getNombre(){
            
            return $this->nombre;

        }

        public function getPassword(){
            
            return $this->password;

        }

        public function setNombre($nombre){
            
            $this->nombre = $nombre;

        }

        public function setPassword($password){
            
            $this->password = $password;

        }

        function __toString(){
            
            return $this->nombre.' '.$this->password;

        }
        
    }

?>