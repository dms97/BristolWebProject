<table id="module_table">
    <tr>
        <th>Module</th>
        <th colspan="3">Assessment ans Exam Components</th>
        <th>Mean</th>
        <th>Grade</th>
    </tr>
	<?php
		foreach ($objet in $t) {
			echo '<tr>'
				. '<td>' . htmlspecialchars($t['module']['titleModule']) .'</td>'
				. '<td>' . htmlspecialchars($t['module']['exam1']['title']) . " : " . htmlspecialchars($t['module']['exam1']['coef']) .'</td>'
				. '<td>' . htmlspecialchars($t['module']['exam2']['title']) . " : " . htmlspecialchars($t['module']['exam2']['coef']) .'</td>'
				. '<td>' . htmlspecialchars($t['module']['exam3']['title']) . " : " . htmlspecialchars($t['module']['exam3']['coef']) .'</td>'
				. '<td>' . htmlspecialchars($t['module']['mark']) . '</td>'
				. '<td>' . htmlspecialchars($t['module']['grade']) . '</td>'
				. '</tr>';
		}
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