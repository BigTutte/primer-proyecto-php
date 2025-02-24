<?php
declare(strict_types=1); //para que php sea mas estricto con los tipos de datos
//include 'CLASSES/SiguientePeli.php'; //incluye el archivo de la clase SiguientePeli
?>

<main style="background-color:rgb(39, 37, 46); padding: 1rem;">
    <h6 class="text-center text-light font-sm">
        <?= 
        $stringCuantoFalta;
        ?>
    </h6>
    <div class="card mb-3 shadow" style="background-color:rgb(59, 56, 68); color: #ffffff;">
    <img src="<?=$posterUrl; ?>" alt="Poster de la pelicula" class="card-img-top"
        style="object-fit: cover; height: 300px;">
    <div class="card-body text-center">
        
        <h5 class="card-title"><?=$title; ?></h5>
        <p class="card-text">
            <?=$overview; ?>
        </p>
        <p class="card-text">
            <small class="text-body-secondary">
                Fecha de estreno: <?=$releaseDate; ?>
            </small>
        </p>
    </div>
    </div>
        
    </div>    
    <pre style="font-size: 10px; overflow: scroll; height:250px">
        <?php var_dump($data);?>   
    </pre>
    
    <hgroup>
        
        <h4></h4>
        
    <p>A ver cual es la proxima peli de Marvel?</p>
</main>