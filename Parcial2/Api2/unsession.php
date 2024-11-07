<?php 
    session_unset(); // Esto elimina todas las variables de sesión
    session_destroy(); // Esto destruye la sesión
    header("Location: ../index.html");
?>