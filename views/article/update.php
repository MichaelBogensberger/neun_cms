<!DOCTYPE html>
<html lang="de">
<?php
include "../helper/head.php";
?>

<body>

<?php
include "../helper/article_navbar.php";
include "../../models/Articles.php";

session_start();
$post_id = isset($_GET["post_id"]) ? $_GET["post_id"] : "";

if(!isset($_SESSION["id"])){
    header('Location: ../../index.php');
} elseif (!$post_id) {
    header('Location: ../article/index.php');
}

$data = Articles::get($post_id);
$users = Articles::getAllUsers();

?>

<div class="container">
    <div class="row">
        <h2>Beitrag bearbeiten</h2>
    </div>

    <form class="form-horizontal" action="../../models/updatePost.php" method="post">

        <div class="row">
            <div class="col-md-5">
                <div class="form-group required">
                    <label class="control-label">Titel *</label>
                    <input type="text" class="form-control" name="titel" maxlength="45" value="<?php echo $data["titel"] ?>">
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <div class="form-group required">
                    <label class="control-label">Freigabedatum *</label>
                    <input type="date" class="form-control" name="datum" value="<?php echo $data["datum"] ?>">
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <div class="form-group required">
                    <label class="control-label">Besitzer *</label>
                    <select class="form-control" name="user_id">
                        <option value="">-Besitzer auswählen-</option>
                        <option value="<?php echo $data["user_id"] ?>" selected><?php echo Articles::getUser($data["user_id"])["username"] ?></option>
                        <?php
                            foreach ($users as $user) {
                                if($user["id"] != $data["user_id"]){
                                    ?>
                                        <option value="<?php echo $user["id"] ?>"><?php echo $user["username"] ?></option>
                                    <?php
                                }
                            }

                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group required">
                    <label class="control-label">Inhalt *</label>
                    <input type="text" class="form-control" name="inhalt" rows="10" value="<?php echo $data["inhalt"] ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="post_id" value="<?php echo $post_id ?>" class="btn btn-primary">Aktualisieren</button>
            <a class="btn btn-default" href="index.php">Abbruch</a>
        </div>
    </form>

</div> <!-- /container -->
</body>
</html>