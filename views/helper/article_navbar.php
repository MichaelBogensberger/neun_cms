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
            <a class="navbar-brand" href="../../index.php">Awesome CMS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">Benutzer</a></li>
            </ul>

            <form class="navbar-form navbar-right" action="../../models/logout.php">
               <button type="submit" class="btn btn-warning">Abmelden</button>
            </form>
        </div>
    </div>
</nav>

<br><br>