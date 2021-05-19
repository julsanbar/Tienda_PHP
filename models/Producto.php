<?php 

    //En esta clase yace todo lo necesario para instanciar un producto
    //claro esta segun los parametros dados en el enunciado.

    class Producto{

        //Al ser el código del producto auto incrementable en la bd no es necesario 
        //gestionarlo para modificarlo.
        private $codigo;
        private $nombre;
        private $nombreCorto;
        private $precio;

        function __construct($codigo,$nombre,$nombreCorto,$precio){

            //Como el objetivo de esta clase no es más que dar forma a los productos ya creados en la bd
            //no es necesario gestionar si fueran null o no, pues la información de los productos no se 
            //añade en este caso en particular.
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->nombreCorto = $nombreCorto;
            $this->precio = $precio;

        }

        /**********************************************************/
        //  GETTERS AND SETTERS => (EXCEPTO CODIGO CON SOLO GET)
        /**********************************************************/

        public function getCodigo(){

            return $this->codigo; 

        }

        public function getNombre(){
            
            return $this->nombre;

        }

        public function getNombreCorto(){
            
            return $this->nombreCorto;

        }

        public function getPrecio(){
            
            return $this->precio;

        }
        
        public function setNombre($nombre){
            
            $this->nombre = $nombre;

        }

        public function setNombreCorto($nombreCorto){
            
            $this->nombreCorto = $nombreCorto;

        }

        public function setPrecio($precio){
            
            $this->precio = $precio;

        }

        //  TOSTRING GENERICO

        function __toString(){
            
            return $this->getCodigo().' '.$this->getNombre().' '.$this->getNombreCorto().' '.$this->getPrecio();

        }

    }

?>