<?php
session_start();
?>

<nav class="navbar navbar-sm navbar-expand-sm navbar-dark text-light p-2">
    <div class="container-fluid">
        <a class="navbar-brand font-sm" href="/">
            <img src="/PUBLIC/Marvel_Logo.svg" 
            alt="Logo de Marvel" class="img-fluid" style="width: 100px;">
        </a>
        <button class="navbar-toggler bg-dark pt-3" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
            aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon bg-dark " className=""></span>
        </button>
        
        <div class="collapse navbar-collapse text-light " id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Start</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PAGES/ABOUT/About.php">About</a>
                </li>
                
                <?php
                if (isset($_SESSION['user'])) { // Verifica si el usuario está logueado
                    echo '<li class="nav-item">
                            <a class="nav-link" href="/SRC/Logout.php">Log Out</a> 
                          </li>'; //Capaz intento borrar de user al usuario, y redirigir a index
                }
                else { //el usuario no esta logueado
                    echo '<li class="nav-item">
                            <a class="nav-link" href="/PAGES/USERS/Login.php">Log In</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/PAGES/USERS/Registro.php">Register</a>
                          </li>';
                }
                ?>
            </ul>
        </div>
        
    </div>
</nav>