<?php

require_once File::build_path(array('model','ModelNote.php'));

class ControllerNote {
	
	protected static $object = 'note';

        public static function Lettre($Range) {
            if ($Range < 40 ) {
                return "F";
            }
            elseif ($Range >= 40 && $Range < 50)
            {
                return "D";
            }
            elseif ($Range >= 50 && $Range < 60)
            {
                return "C";
            }
            elseif ($Range >= 60 && $Range < 70)
            {
                return "B";
            }
            elseif ($Range >= 70 && $Range < 80)
            {
                return "A";
            }
            elseif ($Range >= 80 && $Range < 90)
            {
                return "A+";
            }
            elseif ($Range >= 90)   {
                return "A++";
            }
        }

        public static function Rangers($array){   
            $cpt = 0;
            $array2 = array();
            $cpt2 = 0;
            $tmp;
            while ($cpt < count($array)) {
                if ($array[$cpt] == $array[$cpt+3] && $array[$cpt+3] == $array[$cpt+6]) {
                    $tmp = $array[$cpt+1] * $array[$cpt+2] + $array[$cpt+4] * $array[$cpt+5] + $array[$cpt+7] * $array[$cpt+8];  
                    $array2[$cpt2] = $array[$cpt];
                    $array2[$cpt2+1] = $tmp/100;
                    $array2[$cpt2+2] = Lettre($tmp/100);
                    $cpt = $cpt + 9;
                    $cpt2 = $cpt2 +3;
                }
                elseif ($array[$cpt] == $array[$cpt+3] && $array[$cpt+3] != $array[$cpt+6]){
                    $tmp = $array[$cpt+1] * $array[$cpt+2] + $array[$cpt+4] * $array[$cpt+5];  
                    $array2[$cpt2] = $array[$cpt];
                    $array2[$cpt2+1] = $tmp/100;
                    $array2[$cpt2+2] = Lettre($tmp/100);
                    $cpt = $cpt + 6;
                    $cpt2 = $cpt2 +3;
                }
                elseif ($array[$cpt] != $array[$cpt+3]){
                    $tmp = $array[$cpt+1] * $array[$cpt+2];  
                    $array2[$cpt2] = $array[$cpt];
                    $array2[$cpt2+1] = $tmp/100;
                    $array2[$cpt2+2] = Lettre($tmp/100);
                    $cpt = $cpt + 3;
                    $cpt2 = $cpt2 +3;
                }
            }
            return $array2;
        }

        public static function readAll()
        {
            if (isset($_SESSION['login'])) {
                $objet = ModelNote::getRange($_SESSION['login']);
                $controller = "note";
                $view = "readAll";
                $pagetitle = "Notes par module";
                require File::build_path(array('view', 'view.php'));
            } else {
                ControllerUser::error();
            }
        }
}

?>