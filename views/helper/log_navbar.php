<?php

function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

$path = pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME);

?>



<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/php32-angabe/index.php">Awesome CMS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">


            <form class="navbar-form navbar-right form-inline" action="models/login.php" method="POST">
            <div class="form-group mx-sm-3 mb-2">
                    <label for="bname" class="sr-only">Benutzername</label>
                    <input type="text" class="form-control" id="bname" placeholder="Benutzername" name="username">
                </div>
            <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Password</label>
                    <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-warning mb-2">einloggen</button>
            </form>



           
        </div>
        <!--/.navbar-collapse -->
    </div>
</nav>


<br><br>