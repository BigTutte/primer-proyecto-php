<?php
const API_URL = "https://whenisthenextmcufilm.com/api";



    function getData(String $url) : array //que es lo que devuelve. Se puede especificar como no
    { //en php para metodos se usa snake case normalmente
        global $ejemploGlobal; //variable global en funcion. NO SE PUEDEN USAR SINO SE DECLARAN
        //Si solo quisiera hacer GET de una API: 
        $result = file_get_contents($url);
        $data = json_decode($result, true);
        
        //var_dump($data);
        //curl nos permite operar a mas profundidad con GET, POST, ETC.
        return $data;
    }


    function renderTemplate(string $template, array $data = [])
    {
        extract($data); //extrae las variables de un array asociativo y las convierte en variables
                        //con el nombre de la clave y el valor de la variable, Ej 
                        //['nombre' => 'Juan'] se convierte en $nombre = 'Juan'

        /*
        Lo que hacemos ahora, es a partir del directorio relativo de la plantilla
        que queremos renderizar, la incluimos en el archivo actual.
        */
        require_once __DIR__ . "/../TEMP/{$template}.php";

    }

    function nuevaPelicula(): array {
        $nextMovie = SiguientePeli::fetchAndCreateMovie(API_URL); //crea un objeto de la clase SiguientePeli
        $nextMovieData = $nextMovie->getData(); //obtiene los datos del objeto
        $stringCuantoFalta = $nextMovie->getCuantoFaltaMsj();
        $arrayCuantoFalta = ['stringCuantoFalta' => $stringCuantoFalta];
        $nextMovieData = array_merge($nextMovieData, $arrayCuantoFalta);
        return $nextMovieData; //devuelve los datos de la pelicula
    }

?>