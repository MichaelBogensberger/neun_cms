<?php

include 'Articles.php';

$titel = isset($_POST["titel"]) ? $_POST["titel"] : "";
$datum = isset($_POST["datum"]) ? $_POST["datum"] : "";
$inhalt = isset($_POST["inhalt"]) ? $_POST["inhalt"] : "";
$user_id = isset($_POST["user_id"]) ? $_POST["user_id"] : "";



if($titel && $datum && $inhalt && $user_id){

    $c = new Articles();
    $c->create($titel, $inhalt, $datum, $user_id);
    

}

header('Location: ../views/article/index.php');


?>