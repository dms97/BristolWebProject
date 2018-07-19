<table id="students_table">
    <tr>
        <th>ID</th>
        <th>Title</th>

    </tr>
    <?php
    foreach ($objet as $t) {
        echo '<tr>'
            . '<td class="ID">' . htmlspecialchars($t['Id']) . '</td>'
            . '<td>' . htmlspecialchars($t['Title']) . '</td>'
            . '</tr>';
    }
    ?>
</table>
<div class="container">
    <a class="btn btn-primary" href="index.php?controller=module&action=addModule">Create new module</a>
</div>
