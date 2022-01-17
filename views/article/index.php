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


?>



<div class="container">
    <div class="row">
        <h2>Beiträge</h2>
    </div>
    <div class="row">
        <p>
            <a href="create.php" class="btn btn-success">Erstellen <span class="glyphicon glyphicon-plus"></span></a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Titel</th>
                <th>Inhalt</th>
                <th>Besitzer</th>
                <th>Freigabedatum</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <?php
            $data = Articles::getAll();
            foreach ($data as $beitrag) {
                ?>

            <tr>
                <td><?php  echo $beitrag["titel"]; ?></td>
                <td><?php  echo $beitrag["inhalt"]; ?>.</td>
                <td><?php  echo $beitrag["username"]; ?></td>
                <td><?php  echo $beitrag["datum"]; ?></td>
                <td><a class="btn btn-info" href="view.php?p_id=<?php echo $beitrag["post_id"]; ?>"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;<a
                            class="btn btn-primary" href="update.php?post_id=<?php echo $beitrag["post_id"]; ?>"><span
                            class="glyphicon glyphicon-pencil"></span></a>&nbsp;<a
                            class="btn btn-danger" href="delete.php?post_id=<?php echo $beitrag["post_id"]; ?>"><span
                            class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>


               



         <?php
              }
            ?>

            </tbody>
        </table>
    </div>
</div> <!-- /container -->
</body>
</html>