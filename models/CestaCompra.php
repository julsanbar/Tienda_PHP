<?php 

    //En esta clase se va gestionar únicamente un array de objetos productos
    //por lo que tendremos los métodos add y show además de los habituales en un clase.

    class CestaCompra{

        //No es necesario realizar un remove ya que no se contempla en el ejercicio.
        private $cesta;

        function __construct(){
            //AL SER UN ARRAY DE OBJETOS ES NECESARIO INICIALIZAR EL ARRAYOBJECT VACIO
            $this->cesta = new ArrayObject();

        }
        
        //Añade producto
        public function add($producto){
            
            $this->cesta->append($producto);

        }

        //Muestra Array
        public function show(){
            
            foreach($this->cesta as $elemento){
                
                echo $elemento."<br>";

            }

        }

        public function getCesta(){
            
            return $this->cesta;

        }

        public function setCesta($cesta){
        
            $this->cesta = $cesta;

        }

        function __toString(){
            
            return $this->cesta;

        }

    }

?>