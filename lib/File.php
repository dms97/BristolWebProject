<?php

class File {
    
    public static function build_path($path_array) {
        // $path_array = array('controller','nom_fichier.php') ;
        $DS = DIRECTORY_SEPARATOR;
        $ROOT_FOLDER = __DIR__ . "/..";
        return $ROOT_FOLDER. $DS . join($DS, $path_array);
    }
}

?>