<table id="module_table">
    <tr>
        <th>Module</th>
        <th colspan="3">Assessment and Exam Components</th>
        <th>Mean</th>
        <th>Grade</th>
    </tr>
    <?php
	$tmp = "";
    $i = 0;
    $j=0;
    $cpt = 0;
   // var_dump($objet2);
    foreach ($objet as $t) {
        if ($tmp != htmlspecialchars($t->get("ModuleId"))) {
			$tmp = htmlspecialchars($t->get("ModuleId"));
			if ($i != 0) {
                if ($cpt == 2){
                    echo '<td>  </td>';
                }
                elseif ($cpt == 1){
                    echo '<td>  </td>';
                    echo '<td>  </td>';
                }
                echo '<td>' . htmlspecialchars($objet2[$j]['mean']) . '</td>';
                echo '<td>' . htmlspecialchars($objet2[$j]['grade']) . '</td>';
                echo '</tr>';
                $j = $j+1;
                $cpt = 0;
			}
			echo '<tr>' . '<td><a href="' . "http://" . $adresse . $tp . "/index.php?controller=module&action=read&id=" . htmlspecialchars($t->get("ModuleId")) . '">' . htmlspecialchars($t->get("Title")) . '</a></td>';
		}
		echo '<td>' . htmlspecialchars($t->get("ExamType")) . " : " . htmlspecialchars($t->get("Marks")) . ' (' . htmlspecialchars($t->get("Ratio")) . '%) </td>';
        $tmp = htmlspecialchars($t->get("ModuleId"));
        $i = $i+1;
        $cpt = $cpt +1;
    }
    if ($cpt == 2){
        echo '<td>  </td>';
    }
    elseif ($cpt == 1){
        echo '<td>  </td>';
        echo '<td>  </td>';
    }
    echo '<td>' . htmlspecialchars($objet2[$j]['mean']) . '</td>';
    echo '<td>' . htmlspecialchars($objet2[$j]['grade']) . '</td>';
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