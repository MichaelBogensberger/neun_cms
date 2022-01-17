<!DOCTYPE html>
<html lang="de">
<?php
include "../helper/head.php";
include "../../models/Articles.php";
?>

<body>

<?php
include "../helper/article_navbar.php";

session_start();
if(!isset($_SESSION["id"])){
    header('Location: ../../index.php');
}


$p_id = $_GET['p_id'];
$data = Articles::get($p_id);

?>

<div class="container">
    <h2>Beitrag anzeigen</h2>

    <p>
        <a class="btn btn-primary" href="update.php?post_id=<?php echo $data["id"]; ?>">Aktualisieren</a>
        <a class="btn btn-danger" href="delete.php?post_id=<?php echo $data["id"]; ?>">Löschen</a>
        <a class="btn btn-default" href="index.php">Zurück</a>
    </p>

    <table class="table table-striped table-bordered detail-view">
        <tbody>

        <tr>
            <th>Titel</th>
            <td><?php echo $data["titel"] ?></td>
        </tr>
        <tr>
            <th>Freigabedatum</th>
            <td><?php echo $data["datum"] ?></td>
        </tr>
        <tr>
            <th>Besitzer</th>
            <td><?php echo Articles::getUser($data["user_id"])["username"] ?></td>
        </tr>
        <tr>
            <th>Inhalt</th>
            <td><?php echo $data["inhalt"] ?>.</td>
        </tr>
        </tbody>
    </table>
</div> <!-- /container -->
</body>
</html>