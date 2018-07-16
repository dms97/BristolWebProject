<?php

require_once File::build_path(array('model', 'Model.php'));
require_once File::build_path(array('lib', 'Security.php'));

class ModelUser extends Model
{

    private $id;
    private $password;
    private $firstName;
    private $lastName;
    private $email;
    private $role;
    private $phoneNumber;
    private $address;

    // un getter
    public function get($nom_attribut)
    {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }


    public function set($nom_attribut, $valeur)
    {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    // un constructeur
    public function __construct($id = NULL, $password = NULL, $firstName = NULL, $lastName = NULL, $email = NULL, $role = NULL, $phoneNumber = NULL, $address = NULL)
    {
        if (!is_null($id) && !is_null($password) && !is_null($firstName) && !is_null($lastName) && !is_null($email) && !is_null($role) && !is_null($phoneNumber) && !is_null($address)) {
            $this->id = $id;
            $this->password = $password;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->role = $role;
            $this->phoneNumber = $phoneNumber;
            $this->address = $address;
        }
    }

    static public function getAllUser()
    {
        $sql = "SELECT * from users";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
        $tab_p = $req_prep->FetchAll();

        return $tab_p;
    }

    static public function getUserByLogin($log)
    {
        try {

            $sql = "SELECT * FROM users WHERE login=:nom_tag";
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "nom_tag" => $log,
            );

            $req_prep->execute($values);

            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
            $tab_p = $req_prep->FetchAll();

            if (empty($tab_p))
                return false;
            return $tab_p[0];
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href=""> Retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    static public function verifUser($log, $mdp)
    {
        try {

            $sql = "SELECT * FROM User WHERE login=:nom_tag AND mdp=:tag_mdp AND nonce IS NULL";
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "nom_tag" => $log,
                "tag_mdp" => Security::chiffrer($mdp)
            );

            $req_prep->execute($values);

            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
            $tab_p = $req_prep->FetchAll();

            if (!(empty($tab_p))) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href=""> Retour à la page d\' accueil </a>';
            }
            die();
        }
    }

    public function PseudoExist()
    {
        try {
            $sql = 'SELECT * FROM User WHERE login=:log';
            $verif = Model::$pdo->prepare($sql);

            $values = array(
                'log' => strip_tags($this->get('login')),
            );

            $verif->execute($values);
            $verif->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
            $tab_p = $verif->FetchAll();

            if (!(empty($tab_p)))
                return true;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public function mailExist()
    {
        try {
            $sql = 'SELECT * FROM User WHERE login=:log';
            $verif = Model::$pdo->prepare($sql);

            $values = array(
                'log' => $this->get('mail'),
            );

            $verif->execute($values);
            $verif->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
            $tab_p = $verif->FetchAll();

            if (!(empty($tab_p)))
                return true;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    static public function isAdmin($pseudo)
    {
        try {
            $sql = 'SELECT * From User WHERE login=:log';
            $verif = Model::$pdo->prepare($sql);
            $values = array(
                'log' => $pseudo,);
            $verif->execute($values);
            $verif->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
            $tab_p = $verif->FetchAll();

            if (!(empty($tab_p))) {
                if ($tab_p[0]->get('isAdmin') == 1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public function register()
    {
        try {

            $sql = 'INSERT INTO User
              VALUES(:login,:mdp,:mail,:nom,:prenom,:adresse,:dateN, :isAdmin, :nonce)';
            $verif = Model::$pdo->prepare($sql);

            $values = array(
                'login' => strip_tags($this->get('login')),
                'mdp' => strip_tags($this->get('mdp')),
                'mail' => strip_tags($this->get('mail')),
                'nom' => strip_tags($this->get('nom')),
                'prenom' => strip_tags($this->get('prenom')),
                'adresse' => strip_tags($this->get('adresse')),
                'dateN' => strip_tags($this->get('dateN')),
                'isAdmin' => strip_tags($this->get('isAdmin')),
                'nonce' => strip_tags($this->get('nonce'))
            );

            $verif->execute($values);
            //ancien JS
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href="index.php"> Retour à la page d\ accueil </a>';
            }
            die();
        }
    }

    public function validate()
    { //permet la validation d'un User
        try {
            $sql = 'UPDATE User SET nonce=:nonce WHERE login=:login';
            $ajouterUser = Model::$pdo->prepare($sql);

            $values = array( // On récupère toutes les valeurs pour insérer
                'login' => $this->get('login'),
                'nonce' => NULL //passe le nonce en null pour dire qu'il y a eu validatio,
            );

            $ajouterUser->execute($values);
            return true;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public function update()
    {
        Model::isConnected();
        try {
            $sql = 'UPDATE User SET mdp=:mdp, mail=:mail, nom=:nom, prenom=:prenom, adresse=:adresse, dateN=:dateN WHERE login=:login';
            $ajouterUser = Model::$pdo->prepare($sql);

            $values = array( // On récupère toutes les valeurs pour insérer
                'login' => $this->get('login'),
                'mdp' => strip_tags($this->get('mdp')),
                'mail' => strip_tags($this->get('mail')),
                'nom' => strip_tags($this->get('nom')),
                'prenom' => strip_tags($this->get('prenom')),
                'adresse' => strip_tags($this->get('adresse')),
                'dateN' => strip_tags($this->get('dateN'))
            );

            $ajouterUser->execute($values);
            return true;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
}

?>