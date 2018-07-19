<table id="module_table">
    <tr>
        <th>Module</th>
        <th colspan="3">Assessment and Exam Components</th>
        <th>Mean</th>
        <th>Grade</th>
        <th>Resit</th>
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
                if (htmlspecialchars($objet2[$j]['mean']) < 40) {
                    echo '<td> Failed - Sign in Resit ';
                    ?><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="studentapp@uwe.com">
                        <input type="hidden" name="item_name" value="NewExam">
                        <input type="hidden" name="item_number" value="MEM32507725">
                        <input type="hidden" name="amount" value="9">
                        <input type="hidden" name="tax" value="1">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="currency_code" value="USD">
                        <!-- Enable override of buyers's address stored with PayPal . -->
                        <input type="hidden" name="address_override" value="1">
                        <!-- Set variables that override the address stored with PayPal. -->
                        <input type="hidden" name="first_name" value="John">
                        <input type="hidden" name="last_name" value="Doe">
                        <input type="hidden" name="address1" value="345 Lark Ave">
                        <input type="hidden" name="city" value="San Jose">
                        <input type="hidden" name="state" value="CA">
                        <input type="hidden" name="zip" value="95121">
                        <input type="hidden" name="country" value="US">
                        <input type="image" name="submit"
                               src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                               alt="PayPal - The safer, easier way to pay online">
                    </form></td> <?php
                }
                else {
                    echo '<td> Success </td>';
                }
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
    if (htmlspecialchars($objet2[$j]['mean']) < 40) {
        ?><td><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="studentapp@uwe.com">
            <input type="hidden" name="item_name" value="NewExam">
            <input type="hidden" name="item_number" value="MEM32507725">
            <input type="hidden" name="amount" value="9">
            <input type="hidden" name="tax" value="1">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="currency_code" value="USD">
            <!-- Enable override of buyers's address stored with PayPal . -->
            <input type="hidden" name="address_override" value="1">
            <!-- Set variables that override the address stored with PayPal. -->
            <input type="hidden" name="first_name" value="John">
            <input type="hidden" name="last_name" value="Doe">
            <input type="hidden" name="address1" value="345 Lark Ave">
            <input type="hidden" name="city" value="San Jose">
            <input type="hidden" name="state" value="CA">
            <input type="hidden" name="zip" value="95121">
            <input type="hidden" name="country" value="US">
            <input type="image" name="submit"
                   src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                   alt="PayPal - The safer, easier way to pay online">
        </form> </td> <?php
    }
    else {
        echo '<td> Success </td>';
    }
    echo '</tr>';
    
	?>
</table>
<?php

$t=0;
$dataPoints = array();
while ($t < count($objet2)){
   $dataPoints[$t]=array("label"=>$objet2[$t]['id'] , "y"=> $objet2[$t]['mean']);
    $t = $t+1;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Your means by module"
	},
	axisY: {
		title: "Marks",
		includeZero: false
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 270px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                              


