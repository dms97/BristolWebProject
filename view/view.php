<!DOCTYPE html>
<?php
    $adresse = "localhost/"; // name of the serveur
    $tp = "BristolWebProject"; // name of the website
?>
<html lang="en">
<head>
    <?php if(isset($pagetitle)) echo "<title>$pagetitle</title>"; else echo "<title>StudentApp</title>" ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/view.css">

    <link rel="stylesheet" href="<?php
    echo $stylesheet; // stylesheet of the page (added by the controller)
    ?>">

</head>
<body class="container-fluid">
    <header>
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand">StudentApp</span>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li <?php if (isset(static::$object) && static::$object === 'accueil') echo 'class="active"'; ?>><a href="index.php?controller=accueil">Home</a></li>
                <?php if(isset($_SESSION['login'])) { ?>
                    <?php if($_SESSION['Role'] === 'student') {?><li <?php if (isset(static::$object) && static::$object === 'note') echo 'class="active"' ?>><a href="index.php?controller=note">Modules</a></li><?php } ?>
                    <?php if($_SESSION['Role'] === 'prof' || $_SESSION['Role'] === 'admin') {?><li <?php if (isset(static::$object) && static::$object === 'exam') echo 'class="active"' ?>><a href="index.php?controller=exam&action=readAll">Exams</a></li><?php } ?>
                    <li <?php if (isset(static::$object) && static::$object === 'students') echo 'class="active"' ?>><a href="index.php?controller=student">Students</a></li>
                    <li <?php if (isset(static::$object) && static::$object === 'User') echo 'class="active"' ?>><a href="index.php?controller=user">Administration</a></li>
                <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['login'])) { ?>
                        <li><a href="index.php?controller=user&action=logout"><span class="glyphicon glyphicon-user"></span> Sign out</a></li>
                    <?php  } else { ?>
                        <li><a href="index.php?controller=user&action=login"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <?php
            if(isset($message)) {
                echo $message;
            }

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
    </main>

    <footer id="footer">
        Created by Damien Mariotto, Alexis Jolin, Lucas Lana and Timothé Martin
    </footer>
</body>


</html>