<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelUser extends Model
{

    protected static $object = 'users';
    protected static $primary = 'id';

    private $id;
    private $password;
    private $firstName;
    private $lastName;
    private $email;
    private $role;
    private $phoneNumber;
    private $address;

    public function get($nom_attribut)
    {
        if (property_exists($this, $nom_attribut)) {
            return $this->nom_attribut;
        } else {
            return false;
        }
    }

    public function set($nom_attribut)
    {
        if (property_exists($this, $nom_attribut)) {
            return $this->nom_attribut;
        } else {
            return false;
        }
    }

    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->id = $data['id'];
            $this->password = $data['password'];
            $this->firstName = $data['firstname'];
            $this->lastName = $data['lastname'];
            $this->email = $data['email'];
            $this->address = $data['adress'];
            $this->phoneNumber = $data['phonenumber'];
            $this->role = $data['Role'];
        }
    }

    public function attributs()
    {
        $data = array();
        foreach ($this as $cle => $valeur) {
            $data[$cle] = $valeur;
        }
        return $data;
    }

    public static function checkPassword($id, $mot_de_passe_chiffre)
    {
        $bdd = new Model();
        $sql = "SELECT COUNT(*) AS total FROM users WHERE id = '$id' AND mot_de_passe = '$mot_de_passe_chiffre'";
        $result = $bdd::$pdo->query($sql);
        $donnee = $result->fetch();
        if ($donnee['total'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function estAdmin($id)
    {
        $bdd = new Model();
        $sql = "SELECT Role FROM users WHERE id = :tag_id ";
        $req_prep = $bdd::$pdo->prepare($sql);
        $values = array(
            'tag_id' => $id
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_ASSOC);
        $donnee = $req_prep->fetch();
        return $donnee['Role'];
    }
	
	public static function selectStudents()
    {
        try {
            $table_name = static::$object;
            $class_name = "Model" . ucfirst($table_name);
            $primary_key = static::$primary;
            $bdd = new Model();
            $sql = "SELECT * from $table_name WHERE Role=3";
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

}

?>