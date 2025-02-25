<?php declare(strict_types=1); //para que php sea mas estricto con los tipos de datos  ?>        
<?php 

//require 'funciones.php';      //incluye el archivo de funciones. SE PEGA UNA UNICA VEZ

//include 'funciones.php';      //incluye el archivo de funciones. SI NO EXISTE NO TIRA ERROR
                                //INCLUDE_ONCE EXISTE Y FUNCIONA IGUAL QUE REQUIRE_ONCE
                                
require_once 'funciones.php';               //incluye el archivo de funciones UNA UNICA VEZ,
require_once 'CLASSES/SiguientePeli.php';   //si ya fue incluido no lo vuelve a incluir
                                            //SI NO EXISTE TIRA ERROR
const API_URL = "https://whenisthenextmcufilm.com/api";
$nextMovie = SiguientePeli::fetchAndCreateMovie(API_URL); //crea un objeto de la clase SiguientePeli
$nextMovieData = $nextMovie->getData(); //obtiene los datos del objeto
$stringCuantoFalta = $nextMovie->getCuantoFaltaMsj();
$arrayCuantoFalta = ['stringCuantoFalta' => $stringCuantoFalta];
$nextMovieData = array_merge($nextMovieData, $arrayCuantoFalta);
?>

<!DOCTYPE html>
<html lang="en" > 
        <div class="container bg-dark text-light" display="flex">
                <div class="col-12">
                    <?php 
                        $ejemploGlobal; //variable global, a modo de ejemplo del scope    
                        //OJO CON PASAJE DE PARAMETROS, ir al declare strict types de arriba.
                        // $data = getData(API_URL);
                    ?>

                    <head>
                        <?php renderTemplate('head'); //para que el scope del render sea local?> 
                    </head>
                    <body style="overflow:scroll;">
                        <?php renderTemplate('main', $nextMovieData); ?>
                    </body>
                    <footer>
                        <?php renderTemplate('footer'); ?>
                    </footer>
                    <?php renderTemplate('styles'); ?>
                    <?php renderTemplate('scripts'); ?>
                </div>
        </div>
</html>