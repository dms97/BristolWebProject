<body class="container-fluid">
<header>
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" href="../controller/module.ctrl.php">StudentApp</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li <?php if ($activePage === 'module'){ echo 'class="active"';}?>><a href="../controller/module.ctrl.php">Modules</a></li>
                <li <?php if ($activePage === 'exam'){ echo 'class="active"';}?>><a href="../controller/exam.ctrl.php">Exams</a></li>
                <li <?php if ($activePage === 'students'){ echo 'class="active"';}?>><a href="../controller/students.ctrl.php">Students</a></li>
                <li <?php if ($activePage === 'administration'){ echo 'class="active"';}?>><a href="../controller/administration.ctrl.php">Administration</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="session_delete.ctrl.php"><span class="glyphicon glyphicon-user"></span> Sign out</a></li>
            </ul>
        </div>
    </nav>
</header>