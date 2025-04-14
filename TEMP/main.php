<?php
declare(strict_types=1); //para que php sea mas estricto con los tipos de datos
//include 'CLASSES/SiguientePeli.php'; //incluye el archivo de la clase SiguientePeli

/*
LLAMO A DBPELIS PARA GUARDAR LA PELI, esto no puede quedar asi ya que en cada carga de pagina se va a intentar guardar.
Debemos modificar como se usa esto, y va a ser en base a la release date de la ultima peli agregada.
Por mientras, lo dejo asi para que funcione.
*/
require_once __DIR__ . '/../CLASSES/db.php'; //incluye el archivo de la clase db
use databases\dbPelis;

$dbPelis = dbPelis::openConnection();
$dbPelis->addPeli($title, $releaseDate);
//llama a la funcion findPeliByTitle y guarda el resultado en la variable $nextMovieData

//var_dump($dbPelis->findPeliByTitle($title)); quitar // pa probar. Funciona bien :D


?>

<main class="bg-dark text-light">
    <div class="container p-3">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['success'];?>
            </div>
            <?php unset($_SESSION['success']); // Eliminar el mensaje de éxito después de mostrarlo ?>
        <?php endif; ?>
        <div class="row align-items-start">
            <div class="col-12 col-sm-5">
                <a href="https://www.rottentomatoes.com/search?search=<?=$title; ?>"><img src="<?=$posterUrl; //recordar que cada entrada del array asociativo $nextMovieData se convirtio en variable?>" alt="Poster de la pelicula" 
                style=" width: 600px; border-radius: 5%;" class="img-fluid pb-3"></img></a>
            </div>
            <div class="col-12 col-sm-7 text-sm-start text-center">
                <small class="text-light"><?=$stringCuantoFalta; ?></small>
                <h1><?=$title; ?></h1>
                <p class="text-light"> <?=$overview; ?> <a href="https://www.rottentomatoes.com/search?search=<?=$title; ?>"><i class="fa-solid fa-up-right-from-square"></i></a></p>
                
            </div>
        </div>
    </div>
    
    <!-- Container for the image gallery -->
    <div class="container-heroes">
        <!-- Full-width images with number text -->
        <div class="pag-diapo p-3">
            <div class="row">
            <div class="col-12 col-sm-5 order-sm-1 order-2">
                <h2 class="card-title text-light text-center pt-3">HULK</h2>
                <p class="card-text text-light p-3">Following his accidental exposure to gamma rays while saving the life of Rick Jones during the detonation of an experimental bomb, Banner is physically transformed into the Hulk when subjected to emotional stress, at or against his will. This transformation often leads to destructive rampages and conflicts that complicate Banner's civilian life.
                <a href="https://en.wikipedia.org/wiki/Hulk" class="boton-wiki p-3"><i class="fa-solid fa-up-right-from-square"></i></a>
                </p>
                
            </div>
            <div class="col-12 col-sm-7 order-sm-2 order-1">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwallpaperaccess.com%2Ffull%2F113772.jpg&f=1&nofb=1&ipt=d49f7e2f3a8696924a81e3700aec000c40687c0ca258b6a894d8b94a7409e3e6&ipo=images" 
                class="card-img-top" style="width:100%; height: 500px; object-fit: cover; border-radius: 5%;" alt="...">
            </div>
            </div>
        </div>

        <div class="pag-diapo p-3">
            <div class="row">
            <div class="col-12 col-sm-7 order-sm-1 order-1">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ffreshcomics.s3.amazonaws.com%2Fissue_covers%2FMAY150178.jpg&f=1&nofb=1&ipt=882ca7e88122485cb68537ee60187f37195a0689d54e18ac094de6c7d70db4f0&ipo=images" 
                class="card-img-top" style="width:100%; height: 500px; object-fit: cover; border-radius: 5%;" alt="...">
            </div>
            <div class="col-12 col-sm-5 order-sm-2 order-2">
                <h5 class="card-title text-light text-center pt-3">Wonder Woman</h5>
                <p class="card-text text-light p-3">Wonder Woman's most enduring origin story dates from the Golden Age of Comic Books, which relays that she was sculpted from clay by her mother, Queen Hippolyta, and given a life as an Amazon along with superhuman powers as gifts from the Greek gods. Other retellings establish her as the biological daughter of Zeus and Hippolyta, making her a demigod.
                <a href="https://en.wikipedia.org/wiki/Wonder_Woman" class="boton-wiki p-3"><i class="fa-solid fa-up-right-from-square"></i></a>
                </p>
            </div>
            </div>
        </div>

        <div class="pag-diapo p-3">
            <div class="row">
            <div class="col-12 col-sm-5 order-sm-1 order-2">
                <h5 class="card-title text-light text-center pt-3">Captain America</h5>
                <p class="card-text text-light p-3">Captain America's civilian identity is Steven "Steve" Rogers, a frail man enhanced to the peak of human physical perfection by an experimental "super-soldier serum" after joining the United States Army to aid the country's efforts in World War II. Equipped with an American flag–inspired costume and a virtually indestructible shield, Captain America and his sidekick Bucky Barnes clashed frequently with the villainous Red Skull and other members of the Axis powers. In the war's final days, an accident left Captain America frozen in a state of suspended animation until he was revived in modern times. 
                <a href="https://en.wikipedia.org/wiki/Captain_America" class="boton-wiki p-3"><i class="fa-solid fa-up-right-from-square"></i></a>
                </p>
            </div>
            <div class="col-12 col-sm-7 order-sm-2 order-1">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwallpapercave.com%2Fwp%2Fwp7117162.jpg&f=1&nofb=1&ipt=adea0e7506685ec92a9d8a79e16f677d2ba4614977a99256837c25fbb44e379f&ipo=images" 
                class="card-img-top" style="width:100%; height: 500px; object-fit: cover; border-radius: 5%;" alt="...">
            </div>
            </div>
        </div>

        <div class="pag-diapo p-3">
            <div class="row">
            <div class="col-12 col-sm-7 order-sm-1 order-1">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.wallpapersafari.com%2F52%2F11%2Fd4nCRL.jpg&f=1&nofb=1&ipt=334b36158cb199321deb88a996b40478678fb05805abb895603c76e3e2445a97&ipo=images" 
                class="card-img-top" style="width:100%; height: 500px; object-fit: cover; border-radius: 5%;" alt="...">
            </div>
            <div class="col-12 col-sm-5 order-sm-2 order-2">
                <h5 class="card-title text-light text-center pt-3">Spiderman</h5>
                <p class="card-text text-light p-3">In his origin story, Peter gets his superhuman spider powers and abilities after being bitten by a radioactive spider. These powers include superhuman strength, speed, agility, reflexes, stamina, durability, coordination, and balance; clinging to surfaces and ceilings like a spider; and detecting danger with his precognition ability called "spider-sense".
                <a href="https://en.wikipedia.org/wiki/Spider-Man" class="boton-wiki p-3"><i class="fa-solid fa-up-right-from-square"></i></a>
                </p>
            </div>
            </div>
        </div>

        <div class="pag-diapo p-3">
            <div class="row">
            <div class="col-12 col-sm-5 order-sm-1 order-2">
                <h5 class="card-title text-light text-center pt-3">Iron Man</h5>
                <p class="card-text text-light p-3">Iron Man is the superhero persona of Anthony Edward "Tony" Stark, a businessman and engineer who runs the weapons manufacturing company Stark Industries. When Stark was captured in a war zone and sustained a severe heart wound, he built his Iron Man armor and escaped his captors. Iron Man's suits of armor grant him superhuman strength, flight, energy projection, and other abilities.
                <a href="https://en.wikipedia.org/wiki/Iron_Man" class="boton-wiki p-3"><i class="fa-solid fa-up-right-from-square"></i></a>
                </p>
            </div>
            <div class="col-12 col-sm-7 order-sm-2 order-1">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwallpapercave.com%2Fwp%2Fwp6340297.jpg&f=1&nofb=1&ipt=3738fd2cb0b9383e95587a6cb8363875f94acf94b89ef142701c3477464e29df&ipo=images" 
                class="card-img-top" style="width:100%; height: 500px; object-fit: cover; border-radius: 5%;" alt="...">
            </div>
            </div>
        </div>


        <div class="pag-diapo p-3">
            <div class="row">
            <div class="col-12 col-sm-7 order-sm-1 order-1">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimages.hdqwalls.com%2Fdownload%2Fblack-widow-2020-comic-poster-wd-2560x1440.jpg&f=1&nofb=1&ipt=7b6b425afa6b1b096862a5964f7bc613d9274ec9d96760c8591e321f0f8b7016&ipo=images" 
                class="card-img-top" style="width:100%; height: 500px; object-fit: cover; border-radius: 5%;" alt="...">
            </div>
            <div class="col-12 col-sm-5 order-sm-2 order-2">
                <h5 class="card-title text-light text-center pt-3">Black Widow</h5>
                <p class="card-text text-light p-3">Having extensive mastery in martial arts and armed with her Widow's Bite, Romanoff became one of S.H.I.E.L.D.'s most efficient agents, using the title given by her former organization as her codename, Black Widow. During one mission, she was sent undercover into Stark Industries as Natalie Rushman to watch Tony Stark due to the fear that he was dying. During this mission, Romanoff assisted Stark with defeating Ivan Vanko's terrorist plots against him.
                <a href="https://marvelcinematicuniverse.fandom.com/wiki/Black_Widow" class="boton-wiki p-3"><i class="fa-solid fa-up-right-from-square"></i></a>
                </p>
            </div>
            </div>
        </div>

        <!-- botones -->
        <a class="prev" onclick="plusSlides(-1)"><i class="fa-solid fa-circle-arrow-left"></i></a>
        <a class="next" onclick="plusSlides(1)"><i class="fa-solid fa-circle-arrow-right"></i></a>

        <!-- Image text -->

    <!-- Thumbnail images. Con PHP tengo que poder iterar para agregar cada una de ellas. Se guardan links en base de datos -->
        <div class="container flex flex-row flex-sm-col">
            <div class="column">
                <img class="demo cursor" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwallpaperaccess.com%2Ffull%2F113772.jpg&f=1&nofb=1&ipt=d49f7e2f3a8696924a81e3700aec000c40687c0ca258b6a894d8b94a7409e3e6&ipo=images" 
                style="width:100%; height: 200px; object-fit: cover;" onclick="currentSlide(1)" alt="...">
            </div>
            <div class="column">
                <img class="demo cursor" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ffreshcomics.s3.amazonaws.com%2Fissue_covers%2FMAY150178.jpg&f=1&nofb=1&ipt=882ca7e88122485cb68537ee60187f37195a0689d54e18ac094de6c7d70db4f0&ipo=images" 
                style="width:100%; height: 200px; object-fit: cover;" onclick="currentSlide(2)" alt="...">
            </div>
            <div class="column">
                <img class="demo cursor" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwallpapercave.com%2Fwp%2Fwp7117162.jpg&f=1&nofb=1&ipt=adea0e7506685ec92a9d8a79e16f677d2ba4614977a99256837c25fbb44e379f&ipo=images" 
                style="width:100%; height: 200px; object-fit: cover;" onclick="currentSlide(3)" alt="...">
            </div>
            <div class="column">
                <img class="demo cursor" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.wallpapersafari.com%2F52%2F11%2Fd4nCRL.jpg&f=1&nofb=1&ipt=334b36158cb199321deb88a996b40478678fb05805abb895603c76e3e2445a97&ipo=images" 
                style="width:100%; height: 200px; object-fit: cover;" onclick="currentSlide(4)" alt="...">
            </div>
            <div class="column">
                <img class="demo cursor" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwallpapercave.com%2Fwp%2Fwp6340297.jpg&f=1&nofb=1&ipt=3738fd2cb0b9383e95587a6cb8363875f94acf94b89ef142701c3477464e29df&ipo=images" 
                style="width:100%; height: 200px; object-fit: cover;" onclick="currentSlide(5)" alt="...">
            </div>
            <div class="column">
                <img class="demo cursor" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimages.hdqwalls.com%2Fdownload%2Fblack-widow-2020-comic-poster-wd-2560x1440.jpg&f=1&nofb=1&ipt=7b6b425afa6b1b096862a5964f7bc613d9274ec9d96760c8591e321f0f8b7016&ipo=images" 
                style="width:100%; height: 200px; object-fit: cover;" onclick="currentSlide(6)" alt="...">
            </div>
        </div>
    </div>
    
    <p class="text-center">La <b>API</b> envio esto:</p>
    
    <pre style="font-size: 16px; overflow: scroll; height:250px">
        <?php var_dump($data);?>   
    </pre>
</main>