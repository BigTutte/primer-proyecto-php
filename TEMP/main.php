<?php
declare(strict_types=1); //para que php sea mas estricto con los tipos de datos
//include 'CLASSES/SiguientePeli.php'; //incluye el archivo de la clase SiguientePeli
?>

<main style="background-color:rgb(39, 37, 46); padding: 1rem;">
    <h6 class="text-center text-light font-sm">
        <?= 
        $stringCuantoFalta; //mensaje de cuanto falta para el estreno, que se procesa en la funcion padre que llama al renderer de esta template
        ?>
    </h6>
    <div class="card mb-3 shadow" style="background-color:rgb(59, 56, 68); color: #ffffff;">
    <img src="<?=$posterUrl; //recordar que cada entrada del array asociativo $nextMovieData se convirtio en variable?>" alt="Poster de la pelicula" class="card-img-top"
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
    <pre style="font-size: 16px; overflow: scroll; height:250px">
        <?php var_dump($data);?>   
    </pre>
    <div class="container flex jsutify-content-center">
    <div class="row">
        <div class="container col-12 col-md-6 text-right flex-col">
            <img src="../PUBLIC/Marvel_Logo.svg" alt="nerd face" class="img-fluid" width="100px" height="100px">
            <h1 class="text-md-end text-center">Te gustaria suscribirte para recibir novedades?</h1>
            
        </div>
        <div class="col-md-6 col-12">
            <div class="row p-3 mb-3">
                <form>
                    <div class="row p3">
                            <input class="form-control" type="text" placeholder="Username" aria-label="default input example">
                            <input class="form-control" type="email" placeholder="Email" aria-label="default input example">
                            <input class="form-control" type="input" placeholder="telefono" aria-label="default input example">
                            <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    </div>
    
    <p class="text-center">A ver cual es la proxima peli de Marvel?</p>
</main>