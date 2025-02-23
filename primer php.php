
<!DOCTYPE html>
<html lang="es">
<?php
//Este es un archivo de inicio a PHP. Para repasar, practicar y aprender.
//PHP es un lenguaje de programacion de backend, es decir, se ejecuta en el servidor.
//Veamos que podes mezclarlo junto con HTML, CSS y JS.
//Ademas, viste que la sintaxis es muy parecida a la de java. Nada del otro mundo por ahora.
    $name = "Miguel"; //No se pueden poner adelante numeros, caracteres especiales adelante, dolar al final ni en el medio.
    $practica = true;
    $edad = 22; //Tipado dinamico, debil y gradual, ej: var = int + char -> int
    $sumaEdad = $edad + 200; //suma es para numeros
    $concatenaNombre = $name . ' Cardozo'; //. es para concatenacion

    //var_dump($name); //Muestra el tipo de dato y el valor en la variable
    gettype($name); //Muestra el tipo de dato

    //constantes:
    define('php', 'chrome://branding/content/about-logo@2x.png');
    const hola = 'Hola mundo';
    $boolIf = $name == 'Miguel' && $edad <= 30;
    $boolIfTrue = 'Sos Miguel y tenes menos de 30 años';
    $boolIfFalse = 'No sos Miguel o tenes mas de 30 años';

    //ternarias:
    $ternaria = $edad == 22 ? 'Tenes 22 años' : 'No tenes 22 años';

    $outputDetalles = $edad + $sumaEdad;

    //arreglos:
    $arreglo = array('Miguel', 'Cardozo', 22);
    $arreglo2 = ['Miguel', 'Cardozo', 22]; //Otra forma de declarar arreglos
    //para agregar un elemento al arreglo:
    $arreglo[] = 'Programador'; //lo coloca al final
    $arreglo[1] = 'si o q'; //modifica el valor en la posicion 2
    //para eliminar un elemento del arreglo:
    unset($arreglo[3]); //elimina el elemento en la posicion 3.

    //diccionarios: arrays asociativos
    $diccionario = array(
                        'nombre' => 'Miguel', 
                        'apellido' => 'Cardozo', 
                        'edad' => 22
                    );
    $diccionario = [
                    'nombre' => 'Miguel', 
                    'apellido' => 'Cardozo', 
                    'edad' => 22
                ];
?>
<img src="<?=php?>">


<body>
<h1>
<?=
    'Tu nombre es ' 
    . $name 
    . ' y tenes mas o menos ' 
    . (string) $edad; 
?>
</h1>

<h2>
<?=
    $outputEvaluado = "Hola $concatenaNombre, Como estas?"; //Interpolacion de variables
    //Con \ ignora significado lexico de lo siguiente. Ej: \$name -> $name
    //Otro ejemplo seria \"Miguel\" -> "Miguel"
    echo "<br />";
    if ($boolIf) {
        echo $boolIfTrue;
    } else {
        echo $boolIfFalse;
    }
?>
<?php // otra manera de usar los if: ?>
<?php if ($practica) : ?>
    <h2 style="color: green;">Estas practicando</h2>
<?php elseif ($edad == 22) : ?>
    <h2 style="color: red;">Tenes 22 años</h2>
<?php else : ?>
    <h2 style="color: blue;">No estas practicando</h2>
<?php endif; ?>

</h2>

<?php
    //match: como el switch pero mas lindo
    $outputDetalles = match(true) { //para evaluar expresiones 
                                    //podemos usar true en la entrada del match
        $edad <= 22  => 'Tenes 22 años',
        $edad > 23   => 'Tenes mas de 23 años',
        $edad === 24 => 'Tenes 24 años',
        default      => 'No tenes 22, 23 ni 24 años'
    };
    echo $outputDetalles . "  " . $arreglo[1];
?>

<ul>
    <?php foreach($arreglo as $item) : ?>
        <li style="color: cian;"><?= $item ?></li>
    <?php endforeach; ?>
</ul>

<ul> 
<?php foreach ($arreglo as $key => $item) : //iteremos con el indice: ?>
    <li style="color: magenta;"><?="$key  $arreglo[$key]" ?></li>
<?php endforeach; ?>
</ul>

</body>

<style> 
    :root {
        color-scheme: light dark;
        font: 100%/1.5, sans-serif;
    }

    body {
        display: grid;
        place-content: center;
    }

    img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }
</style>

</html>