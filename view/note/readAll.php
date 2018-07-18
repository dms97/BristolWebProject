<table id="module_table">
    <tr>
        <th>Module</th>
        <th colspan="3">Assessment ans Exam Components</th>
        <th>Mean</th>
        <th>Grade</th>
    </tr>
    <?php
	$tmp = "";
	$i = 0;
    foreach ($objet as $t) {
        if ($tmp != htmlspecialchars($t->get("ModuleId"))) {
			$tmp = htmlspecialchars($t->get("ModuleId"));
			if ($i != 0) {
				echo '</tr>';
			}
			echo '<tr>' . '<td><a href="' . "http://" . $adresse . $tp . "/index.php?controller=module&action=read&id=" . htmlspecialchars($t->get("ModuleId")) . '">' . htmlspecialchars($t->get("Title")) . '</a></td>';
		}
		echo '<td>' . htmlspecialchars($t->get("ExamType")) . " : " . htmlspecialchars($t->get("Marks")) . ' (' . htmlspecialchars($t->get("Ratio")) . '%)</td>';
		$tmp = htmlspecialchars($t->get("ModuleId"));
    }
	echo '</tr>';
	?>
	
    <!-- Example:
	<tr>
        <td>WP</td>
        <td>Assignment</td>
        <td>Assignment</td>
        <td>Assignment</td>
        <td>0</td>
        <td>A++</td>
    </tr>
	-->
</table>