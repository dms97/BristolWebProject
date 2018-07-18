<?php

require_once "../lib/File.php";
require_once "../model/Model.php";
require_once "../model/ModelUser.php";
require_once "../lib/Security.php";


// test values
/*$id = 100;
$pwd = "infres";
$fname = "Bob";
$lname = "MCLANE";
$mail = "bob.mclane@yopmail.com";
$role = 3;
$phone = "0606060606";
$adress = "somewhere";*/

ModelUser::addUser(100, Security::chiffrer("infres"), "Alan", "BOMBSKY", "alan.bombsky@yomail.com", 3, "0606060606", "somewhere");
ModelUser::addUser(200, Security::chiffrer("infres"), "Thierry", "HUCHE", "thierry.huche@yomail.com", 3, "0606060606", "somewhere");
ModelUser::addUser(300, Security::chiffrer("infres"), "Diego", "VEGA", "diego.vega@yomail.com", 3, "0606060606", "somewhere");
ModelUser::addUser(400, Security::chiffrer("infres"), "Bob", "MCLANE", "bob.mclane@yomail.com", 3, "0606060606", "somewhere");

?>