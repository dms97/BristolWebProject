<?php

class File
{

    public static function build_path($path_array)
    {
        // $path_array = array('controller','nom_fichier.php') ;
        $DS = DIRECTORY_SEPARATOR;

        // $ROOT_FOLDER (sans slash à la fin) vaut "/home/ann2/votre_login/public_html/TD4" à l'IUT
        return $ROOT_FOLDER. $DS . join($DS, $path_array);
    }

}

?>
