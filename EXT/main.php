<main style="background-color:rgb(39, 37, 46); padding: 1rem;">
    <div class="card mb-3 shadow" style="background-color:rgb(59, 56, 68); color: #ffffff;">
    <img src="<?=$data["poster_url"]; ?>" alt="Poster de la pelicula" class="card-img-top"
        style="object-fit: cover; height: 300px;">
    <div class="card-body text-center">
        <h6> <?= $hastaCuandoString ?></h6>
        <h5 class="card-title"><?=$data["title"]; ?></h5>
        <p class="card-text">
            <?=$data["overview"]; ?>
        </p>
        <p class="card-text">
            <small class="text-body-secondary">
                Fecha de estreno: <?=$data["release_date"]; ?>
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