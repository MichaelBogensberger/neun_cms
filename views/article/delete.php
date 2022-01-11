<!DOCTYPE html>
<html lang="de">
<?php
include "../helper/head.php";
?>

<body>

<?php
include "../helper/article_navbar.php";

session_start();
if(!isset($_SESSION["id"])){
    header('Location: ../../index.php');
}


?>

<div class="container">
    <h2>Beitrag löschen</h2>

    <form class="form-horizontal" action="delete.php?id=29" method="post">
        <input type="hidden" name="id" value="29"/>
        <p class="alert alert-error">Wollen Sie den Beitrag wirklich löschen?</p>
        <div class="form-actions">
            <button type="submit" class="btn btn-danger">Löschen</button>
            <a class="btn btn-default" href="index.php">Abbruch</a>
        </div>
    </form>

</div> <!-- /container -->
</body>
</html>