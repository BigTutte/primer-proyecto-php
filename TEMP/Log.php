<?php
declare(strict_types=1); //para que php sea mas estricto con los tipos de datos
session_start();
require_once __DIR__ . "/../../SRC/funciones.php"; //incluye el archivo funciones.php

//VERIFICAR SI EL USUARIO YA ESTA LOGUEADO
if (isset($_SESSION['user'])) {
    header("Location: /index.php"); // Cambia esto a la ruta de tu página de éxito
    exit();
}
// Verifica si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_REQUEST['username']; //USA NAME NO ID
    $password = $_REQUEST['password'];
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Por favor complete todos los campos.";
    }
    else {
        // Aquí deberías verificar las credenciales del usuario en la base de datos
        // Si las credenciales son correctas, inicia sesión y redirige al usuario
        $_SESSION['user'] = $username; // Guardar el nombre de usuario en la sesión
        header("Location: /index.php"); // Cambia esto a la ruta de tu página de éxito
        exit();
    }
}
?>

<div class="container d-flex justify-content-center flex-col p-1 p-sm-5">
    <div class="row"> 
        <div class="p-3 col-12 col-sm-6 text-center text-light flex flex-col justify-content-center align-items-center">
            <h2 class="text-light">tipica imagen abstracta aca <small class="text-muted">Pero yo le pongo un gif de mickey porque jaja</small></h2>
            
            <img 
                src="https://c.tenor.com/vgbvXol4B5QAAAAC/tenor.gif" 
                class="img-fluid" style="border-radius: 10%;" alt="tipica imagen abstracta"
            >
        </div>
        <div class="col-12 col-sm-6">
            <div class="card text-dark p-3 bg-gradient" style="border-radius: 5%;">
                <div class="card-body p-4 text-dark  justify-content-center">
                    <h2 class="card-title text-dark text-center">Ingrese los datos de registro</h2>
                    <?php
                        if (isset($_SESSION['error'])) {
                            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                            unset($_SESSION['error']);
                        }
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="username" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" name="username" placeholder="Ejemplo: Juanito123" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label text-dark">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="hola123@mail.com" required>
                            <small id="emailHelp" class="form-text text-muted">Lo usaremos para identificarte.</small>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="form-label text-dark">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="form-label text-dark">Repetir Password</label>
                            <input type="password" class="form-control" name="passwordRepeat" id="passwordRepeat" placeholder="password" required>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary rounded" style="width:auto;">Registro</button>
                        </div>
                    </form>         
                </div>
            </div>
        </div>
    </div>
</div>