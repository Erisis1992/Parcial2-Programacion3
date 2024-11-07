<?php
session_start();
header("Content-Type: application/json");
include "db.php";
$method = $_SERVER['REQUEST_METHOD'];
$pass = password_hash($_POST['contrasena'],PASSWORD_DEFAULT);
$data= json_encode(['nombre'=>$_POST['nombre'],'email'=>filter_var($_POST['email'],FILTER_SANITIZE_EMAIL),'contrasena'=>$pass]);
$input = json_decode($data,true);
echo file_get_contents('php://input');
switch($method){
    case 'GET':
        handleGet($pdo);
        break;
    case 'POST':
        handlePOST($pdo, $input);
        include "./mailer.php";
        break;
    case 'PUT':
        handlePut($pdo, $input);
        break;
    case 'DELETE':
        handleDelete($pdo, $input);
        break;
    default:
    echo json_encode(['message' => 'Invalid request method']);
    break;

}
function handleGet($pdo){
    $sql = "SELECT Nombre,Email,Contrasena FROM usuarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}
function handlePost($pdo,$input){
    $sql = "INSERT INTO usuarios (Nombre,Email,Contrasena,ID_Estado,Fecha_Creacion)
            VALUES(:Nombre,:Email,:Contrasena,2,NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['Nombre'=>$input['nombre'],'Email'=>$input['email'],'Contrasena'=>$input['contrasena']]);
    echo json_encode(['message'=>'Usuario creado con exito']);
    header("Location: ../index.html");
}
function handlePut($pdo,$input){
    $sql="UPDATE users SET Nombre = :Nombre, Email = :Email, Contrasena = :Contrasena WHERE Email=:Email";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(['Nombre'=>$input['nombre'],'Email'=>$input['email'],'Contrasena'=>$input['contrasena']]);
    echo json_encode(['message'=>'Usuario actualizado con exito']);
}
function handleDelete($pdo,$input){
    $sql="DELETE FROM usuarios WHERE Email = :Email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['Email'=>$input['email']]);
    echo json_encode(['message'=>'Usuario eliminado con exito']);
}
?>