<?php
include "./db.php";
$mail = $_POST['email'];
$pass=$_POST['contrasena'];
$mail=(string)$mail;
$sql="SELECT Contrasena FROM usuarios where Email = '$mail'";
$Quer=mysqli_query($conn,$sql);
if (!mysqli_query($conn, $sql)) {
    print_r(mysqli_error($conn));
}
$res=mysqli_fetch_assoc($Quer)['Contrasena'];
if(password_verify($pass,$res)){
    $sql="SELECT ID_Estado FROM usuarios where Email = '$mail'";
    $Quer=mysqli_query($conn,$sql);
    $res=mysqli_fetch_assoc($Quer)['ID_Estado'];
    if($res==1){
        $sql="SELECT ID_Usuario FROM usuarios where Email = '$mail'";
        $Quer=mysqli_query($conn,$sql);
        $res=mysqli_fetch_assoc($Quer)['ID_Usuario'];
        $sql2="INSERT INTO `ultima sesión`(ID_Usuario,Fecha_Sesion) VALUES ($res,NOW())";
        $Quer=mysqli_query($conn,$sql2);
        session_start();
        $_SESSION['userLogin'] = "Loggedin";
        $_SESSION['email'] = $mail;
        header("Location: ../loginhome.php");
    }
    else{
        echo"Tu cuenta no está activada";
    }
}
else{
    echo password_verify($pass,$res);
    echo "Contraseña incorrecta";
}
?>