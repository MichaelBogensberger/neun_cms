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
    <div class="row">
        <h2>Beitrag bearbeiten</h2>
    </div>

    <form class="form-horizontal" action="update.php?id=3" method="post">

        <div class="row">
            <div class="col-md-5">
                <div class="form-group required">
                    <label class="control-label">Titel *</label>
                    <input type="text" class="form-control" name="title" maxlength="45" value="Titel 1">
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <div class="form-group required">
                    <label class="control-label">Freigabedatum *</label>
                    <input type="date" class="form-control" name="releasedate" value="2017-02-05">
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <div class="form-group required">
                    <label class="control-label">Besitzer *</label>
                    <select class="form-control" name="owner">
                        <option value="">-Besitzer auswählen-</option>
                        <option value="1" selected>User 1</option>
                        <option value="2">User 2</option>
                        <option value="3">User 3</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group required">
                    <label class="control-label">Inhalt *</label>
                    <textarea class="form-control" name="content" rows="10">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Aktualisieren</button>
            <a class="btn btn-default" href="index.php">Abbruch</a>
        </div>
    </form>

</div> <!-- /container -->
</body>
</html>