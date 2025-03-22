<?php
declare(strict_types=1); //para que php sea mas estricto con los tipos de datos
//include 'CLASSES/SiguientePeli.php'; //incluye el archivo de la clase SiguientePeli
session_start(); //inicia la sesion
?>

<main>
    <div class="container">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['success'];?>
            </div>
            <?php unset($_SESSION['success']); // Eliminar el mensaje de éxito después de mostrarlo ?>
        <?php endif; ?>
        <div class="row align-items-start">
            <div class="col-12 col-sm-3">
                <img src="<?=$posterUrl; //recordar que cada entrada del array asociativo $nextMovieData se convirtio en variable?>" alt="Poster de la pelicula" 
                style="object-fit: cover; width: 400px;" class="img-fluid pb-3">
            </div>
            <div class="col-12 col-sm-9 text-sm-start text-center">
                <small class="text-light"><?=$stringCuantoFalta; ?></small>
                <h2><?=$title; ?></h2>
                <p class="text-light"> <?=$overview; ?></p>
                
            </div>
        </div>
    </div>
    
    <p class="text-center">La <b>API</b> envio esto:</p>
    
    <pre style="font-size: 16px; overflow: scroll; height:250px">
        <?php var_dump($data);?>   
    </pre>
    <div class="container flex justify-content-center" id="detalles-personajes">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-light">Personajes</h2>
            </div>
        </div>
        <div class="row">
            <!-- Aqui se muestran los personajes. Sera un carrousel con imagenes que redirigen a la wiki del personaje.-->
            <button id="prev">Prev</button>
            <div id="character-container" class="col-12 text-center">
                <!-- Characters will be injected here by JavaScript -->
            </div>
            <button id="next">Next</button>
        </div>
    </div>
    
    <p class="text-center">A ver cual es la proxima peli de Marvel?</p>
</main>