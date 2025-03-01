<?php
declare(strict_types=1); //para que php sea mas estricto con los tipos de datos
require_once '../../funciones.php';
require_once '../../TEMP/styles.php';
require_once '../../TEMP/scripts.php';
?>

<!DOCTYPE html>
<html lang="en">
<div class="container bg-dark" display="flex-col">
    <head>
        <?php renderTemplate('head'); //para que el scope del render sea local?> 
    </head>
    <?php 
        renderTemplate('styles');
        renderTemplate('scripts'); 
    ?>
</div>
</html>






