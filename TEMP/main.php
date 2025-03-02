<?php
declare(strict_types=1); //para que php sea mas estricto con los tipos de datos
//include 'CLASSES/SiguientePeli.php'; //incluye el archivo de la clase SiguientePeli
?>

<main style="background-color:rgb(39, 37, 46);">
    <?php 
    /*
    * FIXME : no se porque $_POST no se llena
    */
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $dataUsername = [
            'username' => $username,
            'email' => $email,
            'tel' => $tel
        ];
        /*
        echo "<p>".$_POST['username']."</p>";
        echo "<p>".$_POST['email']."</p>";
        echo "<p>".$_POST['tel']."</p>";
        */
    }
    $_POST = null;
    ?>

    
    <div class="container">
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
    <div class="container flex jsutify-content-center">
    <div class="row">
        <div class="container col-12 col-md-6 text-right flex-col">
            <img src="../PUBLIC/Marvel_Logo.svg" alt="nerd face" class="img-fluid" width="100px" height="100px">
            <h1 class="text-md-end text-center">Te gustaria suscribirte para recibir novedades?</h1>
            
        </div>
        <div class="col-md-6 col-12">
            <div class="row p-3 mb-3">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="row p3">
                            <input class="form-control" id="username" type="text" placeholder="Username" aria-label="default input example">
                            <input class="form-control" id="email" type="email" autocomplete="email" placeholder="Email" aria-label="default input example">
                            <input class="form-control" id="tel" type="input" placeholder="telefono" aria-label="default input example">
                            <input class="btn btn-primary" type="submit" value="Enviar">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    </div>
    
    <p class="text-center">A ver cual es la proxima peli de Marvel?</p>
</main>