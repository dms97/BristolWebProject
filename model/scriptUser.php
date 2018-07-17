<?php

require_once "../lib/File.php";
require_once "ModelUser.php";
require_once "Model.php";

// test values
/*$id = 100;
$pwd = "infres";
$fname = "Bob";
$lname = "MCLANE";
$mail = "bob.mclane@yopmail.com";
$role = 3;
$phone = "0606060606";
$adress = "somewhere";*/


ModelUser::addUser(100, "infres", "Bob", "MCLANE", "bob.mclane@yomail.com", 3, "0606060606", "somewhere");

?>