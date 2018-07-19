<?php

require_once File::build_path(array('config', 'Conf.php'));
require_once File::build_path(array('controller', 'ControllerAccueil.php'));


class Model {

    public static $pdo;

    public static function Init(){
        $hostname = Conf::getHostName();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

        try{
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }

    }
    public static function isConnected(){
        if(!isset($_SESSION['login'])){
            $pagetitle="Home page";
            $view = "readAll";
            $controller = 'User';
            $stylesheet = 'css/home.css';
            $message = "<div class='alert alert-warning'>Vous n'êtes pas connecté</div>";
            require File::build_path(array("view","view.php"));
        }
    }

    public static function isAdmin(){
        if($_SESSION['Role']!='admin'){
            $pagetitle="Access denied";
            $message = "<div class='alert alert-warning'>You don't have right</div>";
            require File::build_path(array("view","view.php"));
        }
    }

    public static function isProf(){
        if($_SESSION['Role']!='prof'){
            $pagetitle="Access denied";
            $message = "<div class='alert alert-warning'>You don't have right</div>";
            require File::build_path(array("view","view.php"));
        }
    }

}
Model::Init()



?>