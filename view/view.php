<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/topBar.css">

	<link rel="stylesheet" href="<?php
									echo $stylesheet; // stylesheet of the page (added by the controller)
								 ?>">

</head>	
<body class="container-fluid">
	<header>
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<a class="navbar-brand" href="../controller/module.ctrl.php">StudentApp</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="../controller/module.ctrl.php">Modules</a></li>
					<li><a href="../controller/exam.ctrl.php">Exams</a></li>
					<li><a href="../controller/students.ctrl.php">Students</a></li>
					<li><a href="../controller/administration.ctrl.php">Administration</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="session_delete.ctrl.php"><span class="glyphicon glyphicon-user"></span> Sign out</a></li>
				</ul>
			</div>
		</nav>
	</header>

	
	<?php
		// static::$object = nom du modele voulu (utilisateur, commande, ...)
		// $view = vue souhaitee (specifie dans le controller)
		$filepath = File::build_path(array("view", static::$object, "$view.php"));
		require $filepath;
	?>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</html>