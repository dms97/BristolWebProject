<?php

class Model
{

    public static $pdo;

    public static function Init()
    {
        require_once File::build_path(array('config', 'Conf.php'));
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();
        try {
            // Connexion � la base de donn�es            
            // Le dernier argument sert � ce que toutes les chaines de caractères 
            // en entrée et sortie de MySql soit dans le codage UTF-8
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue, veuillez nous en excuser.';
            }
            die();
        }
    }

    public function __construct()
    {
        Model::Init();
    }

    public function save()
    {
        try {
            $data = $this->attributs();
            $table_name = static::$object;
            $arguments1 = "";
            $arguments2 = "";
            $values = array();
            foreach ($data as $cle => $valeur) {
                $arguments1 = $arguments1 . "$cle, ";
                $arguments2 = $arguments2 . ":tag_$cle, ";
                $values["tag_$cle"] = $valeur;
            }
            $trimmed1 = rtrim($arguments1, ", ");
            $trimmed2 = rtrim($arguments2, ", ");
            $bdd = new Model();
            $sql = "INSERT INTO $table_name ($trimmed1) VALUES ($trimmed2)";
            $req_prep = $bdd::$pdo->prepare($sql);
            $req_prep->execute($values);
        } catch (PDOException $ex) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue, veuillez nous en excuser.';
            }
            die();
        }
    }

    public static function selectAll()
    {
        try {
            $table_name = static::$object;
            $class_name = "Model" . ucfirst($table_name);
            $bdd = new Model();
            $rep = $bdd::$pdo->query("SELECT * FROM $table_name");
            $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            return $tab_voit = $rep->fetchAll();
        } catch (PDOException $ex) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue, veuillez nous en excuser.';
            }
            die();
        }
    }

    public static function select($primary)
    {
        try {
            $table_name = static::$object;
            $class_name = "Model" . ucfirst($table_name);
            $primary_key = static::$primary;
            $bdd = new Model();
            $sql = "SELECT * from $table_name WHERE $primary_key=:nom_tag";
            $req_prep = $bdd::$pdo->prepare($sql);
            $values = array(
                "nom_tag" => $primary
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $objet = $req_prep->fetchAll();
            if (empty($objet)) {
                return false;
            }
            return $objet[0];
        } catch (PDOException $ex) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue, veuillez nous en excuser.';
            }
            die();
        }
    }

    public static function update($data)
    {
        try {
            $table_name = static::$object;
            $primary_key = static::$primary;
            $bdd = new Model();
            $arguments = "";
            $values = array();
            foreach ($data as $cle => $valeur) {
                $arguments = $arguments . "$cle = :tag_$cle, ";
                $values["tag_$cle"] = $valeur;
            }
            $trimmed = rtrim($arguments, ", ");
            $sql = "UPDATE $table_name SET $trimmed WHERE $primary_key = :tag_$primary_key";
            $req_prep = $bdd::$pdo->prepare($sql);
            $req_prep->execute($values);
        } catch (PDOException $ex) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue, veuillez nous en excuser.';
            }
            die();
        }
    }

    public static function delete($primary)
    {
        try {
            $table_name = static::$object;
            $primary_key = static::$primary;
            $bdd = new Model();
            $sql = "DELETE FROM $table_name WHERE $primary_key=:tag_immat";
            $values = array(
                "tag_immat" => $primary
            );
            $req_prep = $bdd::$pdo->prepare($sql);
            $req_prep->execute($values);
        } catch (PDOException $ex) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue, veuillez nous en excuser.';
            }
            die();
        }
    }

}

?>