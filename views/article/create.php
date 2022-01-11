<!DOCTYPE html>
<html lang="de">
<?php
include "../helper/head.php";
include "../../models/Database.php";
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
        <h2>Beitrag erstellen</h2>
    </div>

    <form class="form-horizontal" action="../../models/createPost.php" method="post">

        <div class="row">
            <div class="col-md-5">
                <div class="form-group required">
                    <label class="control-label">Titel *</label>
                    <input type="text" class="form-control" maxlength="45" value="" name="titel">
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <div class="form-group required">
                    <label class="control-label">Freigabedatum *</label>
                    <input type="date" class="form-control" value="" name="datum">
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <div class="form-group required">
                    <label class="control-label">Besitzer *</label>
                    <input type="text" class="form-control" value="<?php echo $_SESSION["username"] ?>" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group required">
                    <label class="control-label">Inhalt *</label>
                    <textarea class="form-control" name="inhalt" rows="10"></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success" name="user_id" value="<?php echo $_SESSION["id"] ?>" >Erstellen</button>
            <a class="btn btn-default" href="index.php">Abbruch</a>
        </div>
    </form>

</div> <!-- /container -->
</body>
</html>