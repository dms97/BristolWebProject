<?php
    require_once __DIR__ . "/lib/File.php";
    require_once File::build_path(array('lib','Session.php'));
    require_once File::build_path(array('lib','Security.php'));
    require_once File::build_path(array('lib','Mail.php'));
    session_start();
    require File::build_path(array('controller','routeur.php'));
?>
