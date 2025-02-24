<?php

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
        require_once "TEMP/$template.php";  //dentro de una funcion, por lo que el scope no es global
                                            //y no se puede acceder a variables globales/
    }

?>