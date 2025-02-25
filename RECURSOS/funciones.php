<?php
declare(strict_types=1); //para que php sea mas estricto con los tipos de datos

//Pegar los estilos y los scripts no es lo mas sano pero es un documento de referencia, nada mas que eso
$stringEjemplo = "Buenas!";
$stringConcatenador = " Como andas?";
?>
<!DOCTYPE html>
<html lang="es">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous"
/>
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
/>
<div class="container bg-dark text-light" display="flex">
    <div class="col-12">
       <div class="row-lg-6" style="text-align: center; padding: 1rem;">
        <img src="../PUBLIC/nerd-face.svg" alt="nerd face" class="img-fluid " width="50px" height="50px">
        <h1 class="text-center"> FUNCIONES EN PHP</h1>
       </div>
         <h2>Para strings</h2>
         <p>sea $stringEjemplo = "Buenas!" nuestro candidato a las funciones.</p>
            <p>strlen($stringEjemplo); //devuelve la longitud del string</p>
            <div class="row">
                    <p> Por ejemplo: strlen($stringEjemplo) =  <?php echo strlen($stringEjemplo); ?> </p>
            </div>
            <div class="row">
                <h6>Concatenacion</h6>
                <p>La concatenacion se hace con el punto (.). </br> sea <b>$stringConcatenador = " Como estas?"</b> nuestro string de ejemplo:</p>
                <p> $stringEjemplo .= $$stringConcatenador va a concatenar el string "Buenas!" con el string " Como estas?": </p>
                <p><?php echo $stringEjemplo .= $stringConcatenador; ?> </p>
            </div>
            
    </div>
</div>

<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous">
</script>

</html>

