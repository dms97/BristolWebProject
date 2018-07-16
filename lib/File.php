<?php

class File{

    public static function build_path($path_array) {


        // __DIR__ est une constante "magique" de PHP qui contient le chemin du dossier courant
        $ROOT_FOLDER = __DIR__."/..";
        // DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
        $DS = DIRECTORY_SEPARATOR;

        // $ROOT_FOLDER (sans slash à la fin) vaut "/home/ann2/votre_login/public_html/TD4" à l'IUT
        return $ROOT_FOLDER. $DS . join($DS, $path_array);
    }

}

?>
