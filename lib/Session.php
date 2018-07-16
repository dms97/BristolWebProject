<?php

class Session
{

    static $adresse = "localhost/bristol/";
    static $tp = "webdev";

    public static function is_user($login)
    {
        return (!empty($_SESSION['login']) && ($_SESSION['login'] == $login));
    }

    public static function is_student()
    {
        return (!empty($_SESSION['user_type']) && $_SESSION['user_type'] == "student");
    }

    public static function is_teacher()
    {
        return (!empty($_SESSION['user_type']) && $_SESSION['user_type'] == "teacher");
    }

    public static function is_admin()
    {
        return (!empty($_SESSION['user_type']) && $_SESSION['user_type'] == "admin");
    }

}

?>