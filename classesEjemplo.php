<?php
    //aca practico las clases en php, es muy parecido a java en cuanto a conceptos de OOP
    declare(strict_types=1); //para que php sea mas estricto con los tipos de datos
    class SuperHeroe { //muy parecido a java o c++
        //PERO, como estamos en PHP 8 podemos usar las promociones de propiedades

        public function __construct
            (
            public string $nombre,
            private array $poderes, 
            public $planeta
            )
        {
            //no es necesario hacer nada
        }

        public function atacar(){
            return "$this->nombre esta atacando";
        }
        
        public function descripcion(){
            //primero creamos una cadena de texto con elementos del array de poderes:
            $powers = implode(", ", $this->poderes);
            return "$this->nombre es de $this->planeta, tiene los siguientes poderes: $powers";
        }

        //setters
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setPoderes($poderes){
            $this->poderes = $poderes;
        }

        public function setPlaneta($planeta){
            $this->planeta = $planeta;
        }

        //getters
        public function getNombre(){
            return $this->nombre;
        }

        public function getPoderes(){
            return $this->poderes;
        }

        public function getPlaneta(){
            return $this->planeta;
        }

    public static function random() {   //ejemplo de funcion estatica, que como en otros OOP se puede llamar sin instanciar la clase
            $nombres = ['Superman', 'Batman', 'Spiderman', 'Ironman', 'Hulk'];
            $poderes =  
                [
                        ['Volar', 'Rayos X', 'Super Fuerza', 'Super Velocidad', 'Invisibilidad'], 
                        ['Inteligencia', 'Dinero', 'Tecnologia', 'Armadura', 'Artes Marciales'], 
                        ['Telarañas', 'Sentido Aracnido', 'Super Fuerza', 'Agilidad', 'Reflejos'], 
                        ['Armadura', 'Inteligencia', 'Dinero', 'Tecnologia', 'Artes Marciales'], 
                        ['Super Fuerza', 'Resistencia', 'Regeneracion', 'Golpear', 'Gritar']
                ];
            $planetas = ['Krypton', 'Tierra', 'Asgard', 'Marte', 'Venus'];
            return new self($nombres[array_rand($nombres)], $poderes[array_rand($poderes)], $planetas[array_rand($planetas)]); //devuelve el objeto con valores aleatorios
            //array_rand($array) devuelve un indice aleatorio de un array
        }
    };

    $superman = SuperHeroe::random();
    echo $superman->descripcion();
?>