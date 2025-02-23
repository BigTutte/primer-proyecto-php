<?php 
declare(strict_types=1);        //para que php sea mas estricto con los tipos de datos 
//require 'funciones.php';      //incluye el archivo de funciones. SE PEGA UNA UNICA VEZ

//include 'funciones.php';      //incluye el archivo de funciones. SI NO EXISTE NO TIRA ERROR
                                //INCLUDE_ONCE EXISTE Y FUNCIONA IGUAL QUE REQUIRE_ONCE
                                
require_once 'funciones.php';               //incluye el archivo de funciones UNA UNICA VEZ,
require_once 'CLASSES/SiguientePeli.php';   //si ya fue incluido no lo vuelve a incluir
                                            //SI NO EXISTE TIRA ERROR
const API_URL = "https://whenisthenextmcufilm.com/api";
$nextMovie = SiguientePeli::fetchAndCreateMovie(API_URL); //crea un objeto de la clase SiguientePeli
$nextMovieData = $nextMovie->getData(); //obtiene los datos del objeto
$stringCuantoFalta = $nextMovie->getCuantoFaltaMsj($days_until)
?>
<DOCTYPE html>
<html lang="en"> 
<?php 

    
/*
    //nueva sesion de cURL
    $ch = curl_init(API_URL);
    //no queremos mostrar el resultado
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //ejecutamos la peticion
    $response = curl_exec($ch);
    //cerramos la sesion de cURL
    $data = json_decode($response, true); //decodificamos el JSON y lo transforma 
                                          //en un array asociativo
    curl_close($ch);
    
*/
    $ejemploGlobal; //variable global, a modo de ejemplo del scope    
    //OJO CON PASAJE DE PARAMETROS, ir al declare strict types de arriba.
    $data = getData(API_URL);
?>

<?php renderTemplate('head', $nextMovieData); //para que el scope del render sea local?> 

<?php renderTemplate('main', $nextMovieData, $stringCuantoFalta); ?>


<?php renderTemplate('styles'); ?>

<?php renderTemplate('scripts'); ?>
</html>