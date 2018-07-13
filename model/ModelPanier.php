<?php

class ModelPanier {
    
    public static function creationPanier(){
        if (!isset($_SESSION['panierOB'])){
            $_SESSION['panierOB']=array();
            $_SESSION['panierOB']['idProduit'] = array();
            $_SESSION['panierOB']['nomProduit'] = array();
            $_SESSION['panierOB']['qteProduit'] = array();
            $_SESSION['panierOB']['prixProduit'] = array();
            $_SESSION['panierOB']['verrou'] = false;
        }
        return true; // permet de vérifier existance du panierOB (dans autres fonctions)
    }
    
    public static function estVerrouille(){
        if (isset($_SESSION['panierOB']) && $_SESSION['panierOB']['verrou']) {
            return true;
        }
        else {
            return false;
        }
    }
    
    public static function ajouterArticle($idProduit,$nomProduit,$qteProduit,$prixProduit){
        if (ModelPanier::creationPanier() && !ModelPanier::estVerrouille()){ //Si le panierOB existe
            $positionProduit = array_search($idProduit,  $_SESSION['panierOB']['idProduit']); // cherche position nouveau produit, renvoie false si pas trouvé
            if ($positionProduit !== false){ //Si le produit existe déjà on ajoute seulement la quantité
                $_SESSION['panierOB']['qteProduit'][$positionProduit] += $qteProduit ;
            }
            else { //Sinon on ajoute le produit
                array_push( $_SESSION['panierOB']['idProduit'],$idProduit);
                array_push( $_SESSION['panierOB']['nomProduit'],$nomProduit);
                array_push( $_SESSION['panierOB']['qteProduit'],$qteProduit);
                array_push( $_SESSION['panierOB']['prixProduit'],$prixProduit);
            }
        }
        else {
            return false;
        }
    }
    
    public static function supprimerArticle($idProduit){
        if (ModelPanier::creationPanier() && !ModelPanier::estVerrouille()){ //Si le panierOB existe
            //On passe par un panierOB temporaire
            $tmp=array();
            $tmp['idProduit'] = array();
            $tmp['nomProduit'] = array();
            $tmp['qteProduit'] = array();
            $tmp['prixProduit'] = array();
            $tmp['verrou'] = $_SESSION['panierOB']['verrou'];
            for($i = 0; $i < count($_SESSION['panierOB']['idProduit']); $i++){
                if ($_SESSION['panierOB']['idProduit'][$i] != $idProduit){
                    array_push( $tmp['idProduit'],$_SESSION['panierOB']['idProduit'][$i]);
                    array_push( $tmp['nomProduit'],$_SESSION['panierOB']['nomProduit'][$i]);
                    array_push( $tmp['qteProduit'],$_SESSION['panierOB']['qteProduit'][$i]);
                    array_push( $tmp['prixProduit'],$_SESSION['panierOB']['prixProduit'][$i]);
                }
            }
            $_SESSION['panierOB'] = $tmp; //On remplace le panierOB en session par notre panierOB temporaire à jour
            unset($tmp); //On efface notre panierOB temporaire
        }
        else {
            return false;
        }
    }

    public static function modifierQTeArticle($idProduit,$qteProduit){
        if (ModelPanier::creationPanier() && !ModelPanier::estVerrouille()){ //Si le panierOB existe
            if ($qteProduit > 0){ //Si la quantité est positive on modifie, sinon on supprime l'article
                //Recharche du produit dans le panierOB
                $positionProduit = array_search($idProduit, $_SESSION['panierOB']['idProduit']);
                if ($positionProduit !== false){
                    $_SESSION['panierOB']['qteProduit'][$positionProduit] = $qteProduit ;
                }
            }
            else {
                ModelPanier::supprimerArticle($idProduit);
            }
        }
        else {
            return false;
        }
    }
    
    public static function MontantGlobal(){
        $total = 0;
        for($i = 0; $i < count($_SESSION['panierOB']['idProduit']); $i++){
            $total += $_SESSION['panierOB']['qteProduit'][$i] * $_SESSION['panierOB']['prixProduit'][$i];
        }
        return $total;
    }
    
    public static function compterArticles(){
        if (isset($_SESSION['panierOB'])) {
            $result = 0;
            for($i = 0; $i < count($_SESSION['panierOB']['idProduit']); $i++){
                $result += $_SESSION['panierOB']['qteProduit'][$i];
            }
            return $result;
            //return count($_SESSION['panierOB']['idProduit']);
        }
        else {
            return 0;
        }
    }
    
    public static function supprimerPanier(){
        unset($_SESSION['panierOB']);
    }
    
    public static function exportPanier() {
        $tmp=array();
        $tmp['idProduit'] = array();
        $tmp['nomProduit'] = array();
        $tmp['qteProduit'] = array();
        $tmp['prixProduit'] = array();
        $tmp['verrou'] = $_SESSION['panierOB']['verrou'];
        for($i = 0; $i < count($_SESSION['panierOB']['idProduit']); $i++){
            array_push( $tmp['idProduit'],$_SESSION['panierOB']['idProduit'][$i]);
            array_push( $tmp['nomProduit'],$_SESSION['panierOB']['nomProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panierOB']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panierOB']['prixProduit'][$i]);
        }
        return $tmp;
    }

}

?>