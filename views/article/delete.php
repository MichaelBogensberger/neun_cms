<!DOCTYPE html>
<html lang="de">
<?php
include "../helper/head.php";
?>

<body>

<?php
include "../helper/article_navbar.php";

session_start();
$post_id = isset($_GET["post_id"]) ? $_GET["post_id"] : "";

if(!isset($_SESSION["id"])){
    header('Location: ../../index.php');
} elseif (!$post_id) {
    header('Location: ../article/index.php');
}


?>

<div class="container">
    <h2>Beitrag löschen</h2>

    <form class="form-horizontal" action="../../models/deletePost.php" method="post">
        <input type="hidden" name="post_id" value="<?php echo $post_id ?>"/>
        <p class="alert alert-error">Wollen Sie den Beitrag wirklich löschen?</p>
        <div class="form-actions">
            <button type="submit" class="btn btn-danger">Löschen</button>
            <a class="btn btn-default" href="index.php">Abbruch</a>
        </div>
    </form>

</div> <!-- /container -->
</body>
</html>