<?php
declare(strict_types=1); //para que php sea mas estricto con los tipos de datos

use databases\dbUsers;

session_start();
require_once "_DIR_ . '/../../CLASSES/db.php'"; //incluye el archivo funciones.php

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
        /* 
        Aquí deberías verificar las credenciales del usuario en la base de datos
        Si las credenciales son correctas, inicia sesión y redirige al usuario
        Debemos llamar a la base de datos y que nos devuelva true o false en caso de no encontrar al usuario con ese 
        nombre y contra
        */
        $dbUsers = dbUsers::openConnection("users", $username, $password);
        $boolUser = $dbUsers->dbFindUser($username, $password); //llama a la funcion dbUser y guarda el resultado en la variable $dtUser
        if ($boolUser === false) {
            $_SESSION['error'] = "Usuario o contraseña incorrectos.";
            header("Location: /PAGES/USERS/Login.php"); // Redirige a la página de inicio de sesión
            exit();
        }
        $_SESSION['user'] = $username; // Guardar el nombre de usuario en la sesión
        header("Location: /index.php"); // Cambia esto a la ruta de tu página de éxito
        exit();
    }
}
?>

<!DOCTYPE html>
<div class="container justify-content-center flex-col p-4">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-12">
            <div class="card text-dark pt-4 bg-gradient" style="border-radius: 5%;">
                <img src="../../PUBLIC/Mickey_Mouse.svg" class="img-fluid pb-3" alt="logo de mickey" style="width: 100px;">
                <div class="card-body p-4 text-dark  justify-content-center">
                    <h2 class="card-title text-dark text-center">Iniciar sesión</h2>
                    <?php
                        if (isset($_SESSION['error'])) {
                            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                            unset($_SESSION['error']);
                        }
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="username" class="form-label text-dark">Nombre de Usuario</label>
                            <input type="text" class="form-control" name="username" placeholder="Juanito123" required>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="form-label text-dark">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                        </div>
                        <div class="form-group d-flex justify-content-center pt-3">
                            <button type="submit" class="btn btn-primary rounded" style="width:auto;">Iniciar Sesión</button>
                        </div>
                    </form>         
                </div>
            </div>
        </div>
    </div>
</div>