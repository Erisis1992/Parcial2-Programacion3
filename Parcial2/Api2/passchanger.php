<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de contraseña</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
//Cambiar contraseña desde login

session_start();
include "./db.php";
$oldcon = $_POST['curPass'];
$nuevacon = $_POST["newPassConf"];
$hnuevacon=password_hash($nuevacon,PASSWORD_DEFAULT);
$email= $_SESSION['email'];
$email=(string)$email;
$sql = "SELECT Contrasena FROM `usuarios` where Email = '$email' ";
$quer=mysqli_query($conn,$sql);
$res=mysqli_fetch_assoc($quer)['Contrasena'];
if (password_verify($oldcon,$res)){
    $sql = "UPDATE `usuarios` SET Contrasena= '$hnuevacon' where Email = '$email' ";
    $quer=mysqli_query($conn,$sql);
    echo '<div class="card"><h3>Contraseña actualizada</h3>
         <a href="../login.html"><button style="padding: 10px 15px; font-size: 16px;">Volver a pagina principal</button></a>   
         </div>';
}
else{
    echo "Contraseña actual incorrecta";
}
?>
</body>
</html>
