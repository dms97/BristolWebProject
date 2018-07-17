<!DOCTYPE html>
<?php
    $adresse = "localhost/"; // name of the serveur
    $tp = "BristolWebProject"; // name of the website
?>
<html lang="en">
<head>
    <title>Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/topBar.css">

    <link rel="stylesheet" href="<?php
    echo $stylesheet; // stylesheet of the page (added by the controller)
    ?>">

</head>
<body class="container-fluid">
<header>
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php?controller=accueil">StudentApp</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li <?php if (isset($object) && static::$object === 'accueil') echo 'class="active"'; ?>><a href="index.php?controller=accueil">Home</a></li>
                <li <?php if (isset($object) && static::$object === 'module') echo 'class="active"' ?>><a href="index.php?controller=module">Modules</a></li>
                <li <?php if (isset($object) && static::$object === 'exam') echo 'class="active"' ?>><a href="index.php?controller=exam">Exams</a></li>
                <li <?php if (isset($object) && static::$object === 'student') echo 'class="active"' ?>><a href="index.php?controller=student">Students</a></li>
                <li <?php if (isset($object) && static::$object === 'user') echo 'class="active"' ?>><a href="index.php?controller=user">Administration</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?controller=user&action=login"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
            </ul>
        </div>
    </nav>
</header>
<?php
if(isset($message)) {
    echo $message;
}
?>

<?php

// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
if (isset($view)) {
    $filepath = File::build_path(array("view", static::$object, "$view.php"));
    require $filepath;
} else {
    $file = File::build_path(array("view", "home.php"));
    require_once $file;
}
?>

</body>


</html>