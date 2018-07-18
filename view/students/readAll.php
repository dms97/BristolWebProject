<table id="students_table">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
		<th>Phone Number</th>
		<th>Address</th>
    </tr>
	<?php
		foreach ($objet as $t) {
			echo '<tr>'
				. '<td>' . htmlspecialchars($t->get("Id")) .'</td>'
				. '<td>' . htmlspecialchars($t->get("FirstName")) .'</td>'
				. '<td>' . htmlspecialchars($t->get("LastName")) .'</td>'
				. '<td>' . htmlspecialchars($t->get("Email")) .'</td>'
				. '<td>' . htmlspecialchars($t->get("PhoneNumber")) .'</td>'
				. '<td>' . htmlspecialchars($t->get("Address")) .'</td>'
				. '</tr>';
		}
	?>
    <!-- Example:
	<tr>
        <td>100</td>
        <td>Bob</td>
        <td>MCLANE</td>
        <td>bob.mclane@yopmail.com</td>
        <td>0606060606</td>
        <td>somewhere</td>
    </tr>
	--> 
</table>