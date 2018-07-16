<?php

require_once File::build_path(array('model', 'Model.php'));
require_once File::build_path(array('controller', 'ControllerAdminUser.php'));

class ControllerAdminMail
{

    protected static $object = 'adminMail';

    public static function readAll()
    {
        $barre = Session::retourButton();
        if (!empty($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $controller = 'admin';
            $view = 'listMessages';
            $pagetitle = 'Messages reçus- OmniBag';
            $objet = ModelMessage::selectAll();
            require File::build_path(array('view', 'view.php'));
        } else {
            ControllerAdminUser::error();
        }
    }

    public static function read()
    {
        $barre = Session::retourButton();
        if (!empty($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $controller = 'admin';
            $view = 'readMessage';
            $pagetitle = 'Message- OmniBag';
            $objet = ModelMessage::select($_GET['idMessage']);
            require File::build_path(array('view', 'view.php'));
        } else {
            ControllerAdminUser::error();
        }
    }

    public static function delete()
    {
        $barre = Session::retourButton();
        if (!empty($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $controller = 'admin';
            $view = 'deleteMail';
            $view2 = 'listMessages';
            $pagetitle = 'Liste Messages- OmniBag';
            try {
                ModelMessage::delete($_GET['idMessage']);
                $objet = ModelMessage::selectAll();
                require File::build_path(array('view', 'view.php'));
            } catch (Exception $ex) {
                ControllerAdminUser::error2();
            }
        } else {
            ControllerAdminUser::error();
        }
    }

}

?>