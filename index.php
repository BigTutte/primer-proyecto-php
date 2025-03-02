<?php declare(strict_types=1); //para que php sea mas estricto con los tipos de datos

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
<html lang="en">    
        <?php renderTemplate('head'); //para que el scope del render sea local?>  
        <body>
        <div class="container flex-col bg-dark">
        <?php
            renderTemplate('navbar');       
            renderTemplate('main', $nextMovieData); ?>
            <?php renderTemplate('footer'); ?>
        </body>
            <?php renderTemplate('styles'); ?>
            <?php renderTemplate('scripts'); ?>
        </div>
        </html>
