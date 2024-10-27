<?php
include "utils.php";
include "config.php";
$dbConn = connect($db);
if ($_SERVER['REQUEST_METHOD']=='GET'){
    if (isset($_GET['id'])){
        $sql = $dbConn->prepare("SELECT * FROM usuarios where id=:id");
        $sql->bindValue(':id', $_GET['id']);
        $sql->execute();
        header("HTTP/1.1 200 OK");
        echo json_encode( $sql->fetch(PDO::FETCH_ASSOC) );
        exit();
    }
    else{
        $sql = $dbConn->prepare("SELECT * FROM usuarios");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode( $sql->fetchAll());
        exit();
    }
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $input = $_POST;
    $sql = "INSERT INTO usuarios(Nombre, Email, Contraseña, Fecha Creación)
            VALUES(:Nombre,:Email,:Contraseña,NOW())";
    $statement=$dbConn->prepare($sql);
    bindAllValues($statement,$input);
    $statement->execute();
    $postId = $dbCon->lastInsertId();
    if($postId){
        $input['id'] = $postId;
        header("HTTP/1.1 200 OK");
        echo json_encode($input);
        exit();
    }
}
if ($_SERVER['REQUEST_METHOD']=='DELETE'){
    $id=$_GET['id'];
    $statement=$dbConn->prepare("DELETE FROM usuarios where id=:id");
    $statement->bindValue(':id', $id);
    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}
if ($_SERVER['REQUEST_METHOD']=='PUT'){
    $input=$_GET;
    $postId = $input['id'];
    $fields = getParams($input);
    $sql= "UPDATE usuarios
           SET $fields
           WHERE id='$postId'";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement,$input);
    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}
else{
    header("HTTP/1.1 400 Bad Request");
}
}
?>