<?php

// test values
/*$id = 100;
$pwd = "infres";
$fname = "Bob";
$lname = "MCLANE";
$mail = "bob.mclane@yopmail.com";
$role = 3;
$phone = "0606060606";
$adress = "somewhere";*/

function addUser($id, $pwd, $fname, $lname, $mail, $role, $phone, $address) {
	try {
		$sql = 'INSERT INTO bristol.users VALUES (:id, :pwd, :fname, :lname, :mail, :role, :phone, :address)';
		$verif = Model::$pdo->prepare($sql);

		$values = array(
						'id' => strip_tags($id),
						'pwd' => strip_tags($pwd),
						'mail' => strip_tags($fname),
						'fname' => strip_tags($lname),
						'lname' => strip_tags($mail),
						'role' => strip_tags($role),
						'phone' => strip_tags($phone),
						'address' => strip_tags($address)
					);

		$verif->execute($values);
		echo 'User added.';
	} catch (PDOException $e) {
		echo 'An error has occurred :/';
		die();
	}
}

addUser(100, "infres", "Bob", "MCLANE", "bob.mclane@yomail.com", 3, "0606060606", "somewhere");

?>