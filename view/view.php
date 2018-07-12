<!DOCTYPE html>
<?php
    $adresse = "localhost/bristol/";
    $tp = "webdev";
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link rel="icon" type="image/png" href="./images/Omnibag_icon.png">
        <title><?php echo $pagetitle; //$pagetitle specifie dans controller ?></title>
    </head>
	<body>
	
            <div>
                <div class="banner"> <!-- Bannière -->
                    <div>
                        <img src="./images/Omnibag_logo.png" alt="logo_OmniBag" />
                    </div>
                </div>
                <div class="head_buttons">
                    <div> <!-- Boutons de connexion/compte/deconnection -->
                        <div><a href="<?php echo "http://" . $adresse . $tp . "/index.php?controller=utilisateur&action=" . $barre['act']; ?>"><?php echo $barre['nomact']; ?></a></div>    
                            <?php
                                echo $barre['act2'];
                            ?>
                    </div>
                </div>
            </div>
		
            <nav> <!-- Barre de navigation -->
                    <div>
                            <div>
                                    <a href="<?php echo "http://" . $adresse . $tp . "/index.php"; ?>">MODULES</a>
                            </div>
                    </div>
                    <div>
                            <div>
                                    <a href="<?php echo "http://" . $adresse . $tp . "/index.php?controller=produit&action=readAll"; ?>">EXAMS</a> <!-- modify this -->
                            </div>                            
                    </div>
                    <div>
                            <div>
                                    <a href="<?php echo "http://" . $adresse . $tp . "/index.php?controller=accueil&action=contact"; ?>">STUDENTS</a> <!-- modify this -->
                            </div>                    
                    </div>
					<div>
                            <div>
                                    <a href="<?php echo "http://" . $adresse . $tp . "/index.php?controller=accueil&action=contact"; ?>">ADMINISTRATION</a> <!-- modify this -->
                            </div>                    
                    </div>
            </nav>

            <div class="vues">
            <?php
                    // static::$object = nom du modele voulu (utilisateur, commande, ...)
                    // $view = vue souhaitee (specifie dans le controller)
                    $filepath = File::build_path(array("view", static::$object, "$view.php"));
                    require $filepath;
            ?>
            <?php
                    if (isset($view2)) { //si il faut appeller une autre vue
                        $filepath2 = File::build_path(array("view", static::$object, "$view2.php"));
                        require $filepath2;
                    }
            ?>
            </div>

            <footer> <!-- pied de page -->
                <div>
                    <div>
                        <div>
                            <p>UWE BRISTOL</p>
                        </div>
                        <div>
                            <a href="<?php echo "http://" . $adresse . $tp . "/index.php?controller=produit&action=read&id=1"; ?>">Item 1</a> <!-- modify this -->
                            <a href="<?php echo "http://" . $adresse . $tp . "/index.php?controller=produit&action=read&id=2"; ?>">Item 2</a> <!-- modify this -->
                            <a href="<?php echo "http://" . $adresse . $tp . "/index.php?controller=produit&action=readAllExt"; ?>">Item 3</a> <!-- modify this -->
                        </div>
                    </div>
                    <div>
                        <div>
                            <p>FOLLOW US</p>
                        </div>
                        <div>
                            <div>
                                <a href="https://fr-fr.facebook.com/"><img src="./images/facebook.png" alt="Facebook"></a>
                                <a href="https://twitter.com/?lang=fr"><img src="./images/twitter.png" alt="Twitter"></a>
                                <a href="https://plus.google.com/explore"><img src="./images/google_plus.png" alt="Google+"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p>Dat Team, all rights reserved</p>
                </div>
            </footer>
		
        </body>
        
</html>
