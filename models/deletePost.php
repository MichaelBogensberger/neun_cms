<?php

include 'Articles.php';

$post_id = isset($_POST["post_id"]) ? $_POST["post_id"] : "";

if($post_id){

    Articles::delete($post_id);
    echo "dasdadas";
    
}

header('Location: ../views/article/index.php');

?>