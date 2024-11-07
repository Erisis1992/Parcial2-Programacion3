<?php
//Cambiar contraseña con correo
session_start();
include "db.php";
$con = $_POST['contra'];
$nuevacon = $_POST["contra2"];
if ($con==$nuevacon){
    $hnuevacon = password_hash($nuevacon,PASSWORD_DEFAULT);
    $email= $_SESSION['email'];
    $sql = "UPDATE `usuarios` SET Contrasena= '$hnuevacon' where Email = '$email' ";
    $quer=mysqli_query($conn,$sql);
    echo '<div class="card"><h3>Contraseña actualizada</h3>
            <a href="../login.html"><button style="padding: 10px 15px; font-size: 16px;">Volver a pagina principal</button></a>   
        </div>';
    // Limpiar la sesión si deseas
    session_unset(); // Esto elimina todas las variables de sesión
    session_destroy(); // Esto destruye la sesión
}
?>

