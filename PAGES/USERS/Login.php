<?php
declare(strict_types=1); //para que php sea mas estricto con los tipos de datos
require_once __DIR__ . "/../../SRC/funciones.php"; //incluye el archivo funciones.php
?>

<!DOCTYPE html>
<html lang="en">    
        <?php renderTemplate('head'); //para que el scope del render sea local?>  
        <body>
            <div class="container flex-col bg-dark">
                <?php    
                    renderTemplate('Log');
                    renderTemplate('footer'); 
                ?>
                
            </div>
            
        </body>
            <?php renderTemplate('styles'); ?>
            <?php renderTemplate('scripts'); ?>
        </div>
</html>