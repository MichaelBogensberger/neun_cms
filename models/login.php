<?php

include 'Database.php';

$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

$db = Database::connect();


if($username && $password){


    $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(isset($data[0]["id"])){
        session_start();
        $_SESSION["id"] = $data[0]["id"];
        $_SESSION["username"] = $data[0]["username"];
        header('Location: ../index.php');
    } else {
        header('Location: ../index.php');
    }
}

?>





