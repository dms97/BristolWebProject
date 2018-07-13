<?php

require_once File::build_path(array('model','Model.php'));

class ModelUtilisateur extends Model{
    
    protected static $object = 'utilisateurs';
    protected static $primary = 'login';
    
    private $login;
    private $nom;
    private $prenom;
    private $date_naissance;
    private $mail;
    private $adresse;
    private $num_tel;
    private $type; //1 si admin, 0 sinon
    private $mot_de_passe;
    private $nonce;
    
    public function get($nom_attribut){
        if (property_exists($this,$nom_attribut)){
            return $this->nom_attribut;
        }
        else {
            return false;
        }
    }
    
    public function set($nom_attribut){
        if (property_exists($this,$nom_attribut)){
            return $this->nom_attribut;
        }
        else {
            return false;
        }
    }
    
    public function __construct($data = array()) {
        if (!empty($data)) {
            $this->login = $data['login'];
            $this->nom = $data['nom'];
            $this->prenom = $data['prenom'];
            $this->date_naissance = $data['date_naissance'];
            $this->mail = $data['mail'];
            $this->adresse = $data['adresse'];
            $this->num_tel = $data['num_tel'];
            $this->type = $data['type'];
            $this->mot_de_passe = $data['mot_de_passe'];
            $this->nonce = $data['nonce'];
        }
    }
    
    public function attributs() {
        $data = array();
        foreach ($this as $cle => $valeur) {
            $data[$cle] = $valeur;
        }
        return $data;
    }
    
    public static function checkPassword($login,$mot_de_passe_chiffre) {
        $bdd = new Model();
        $sql = "SELECT COUNT(*) AS total FROM " . static::$object . " WHERE login = '$login' AND mot_de_passe = '$mot_de_passe_chiffre'";
        $result = $bdd::$pdo->query($sql);
        $donnee = $result->fetch();
        if ($donnee['total'] == 1) {
            return true;
        }
        else {
            return false;
        }
    }
	
	public static function checkNonce($login) {
		$bdd = new Model();
        $sql = "SELECT nonce FROM " . static::$object . " WHERE login = :tag_login ";
        $req_prep = $bdd::$pdo->prepare($sql);
        $values = array(
            'tag_login' => $login
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_ASSOC);
        $donnee = $req_prep->fetch();
        return $donnee['nonce'];
	}
	
	public static function majNonce($login) {
		$bdd = new Model();
		$sql = "UPDATE " . static::$object . " SET nonce = NULL WHERE login = :tag_login";
		$req_prep = $bdd::$pdo->prepare($sql);
        $values = array(
            'tag_login' => $login
        );
        $req_prep->execute($values);
	}
    
    public static function estAdmin($login) {
        $bdd = new Model();
        $sql = "SELECT type FROM " . static::$object . " WHERE login = :tag_login ";
        $req_prep = $bdd::$pdo->prepare($sql);
        $values = array(
            'tag_login' => $login
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_ASSOC);
        $donnee = $req_prep->fetch();
        return $donnee['type'];
    }
        
}

?>