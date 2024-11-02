<?php
$host="localhost";
$user="Guest";
$password="";
$dbname="parcial2prog3";
try{
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
}catch(PDOException $e){
    die("Conexión fallida: " . $e->getMessage());
}
?>