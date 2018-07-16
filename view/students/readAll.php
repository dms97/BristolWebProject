<div class="listStudents"> <!-- show a lit of all the students of the database, no edit options -->
    <div>
        <h1>List of the UWE Students</h1>
    </div>
    <div>
        <?php
        foreach ($objet as $t) {
            echo '<div class="student">'
                . '<div>'
                . '<h3>Username: ' . htmlspecialchars($t['username']) . '</h3>'
                . '<div>'
                . '<div>'
                . '<div>'
                . '<p>First Name:' . htmlspecialchars($t['fname']) . '</p>'
                . '</div>'
                . '<div>'
                . '<p>Last Name: ' . htmlspecialchars($t['lname']) . '</p>'
                . '</div>'
                . '</div>'
                . '<p>Date of Birth: ' . htmlspecialchars($t['birthdate']) . '</p>'
                . '</div>'
                . '</div>';
        }
        ?>
    </div>
</div>