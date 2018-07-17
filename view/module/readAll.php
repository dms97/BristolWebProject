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
        if ($tmp != $t['module']) {
			$tmp = $t['module'];
			if ($i != 0) {
				echo '</tr>';
			}
			echo '<tr>' . '<td><a href="' . "http://" . $adresse . $tp . "/index.php?controller=module&action=read&id=" . htmlspecialchars($t['module']) . '">' . htmlspecialchars($t['module']) . '</a></td>';
		}
		echo '<td>' . htmlspecialchars($t['examtype']) . " : " . htmlspecialchars($t['mark']) . ' (' . htmlspecialchars($t['ratio']) . '%)</td>';
		$tmp = $t['module'];
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