<?php
//No estoy seguro de si este es el path correcto para la funcion de logout
session_start(); // Inicia la sesión
if (isset($_SESSION['user'])) { // Verifica si el usuario está logueado
    session_destroy(); // Destruye la sesión
    header("Location: /"); // Redirige a la página de inicio
    exit();
} else {
    header("Location: /PAGES/USERS/Login.php"); // Redirige a la página de inicio de sesión
    exit();
}
?>