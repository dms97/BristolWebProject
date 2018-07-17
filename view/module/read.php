<div id="module_alone">
	<div>
		<p>Module n°<?php echo htmlspecialchars($objet['module']['idModule']) . " " . htmlspecialchars($objet['module']['titleModule']); ?>
	</div>
	<div> <!-- exams linked -->
		<div> <!-- exam 1 -->
			<div>
				<p><?php echo htmlspecialchars($t['module']['exam1']['title']); ?></p> <!-- name -->
			</div>
			<div>
				<p>Number of students: <?php echo $objet['module']['exam1']['nb']; ?></p> <!-- number of students -->
			</div>
			<div>
				<p>Mean: <?php echo $objet['module']['exam1']['mean']; ?></p> <!-- average mark -->
			</div>
		</div>
		<div> <!-- exam 2 -->
			<div>
				<p><?php echo htmlspecialchars($t['module']['exam2']['title']); ?></p> <!-- name -->
			</div>
			<div>
				<p>Number of students: <?php echo $objet['module']['exam2']['nb']; ?></p> <!-- number of students -->
			</div>
			<div>
				<p>Mean: <?php echo $objet['module']['exam2']['mean']; ?></p> <!-- average mark -->
			</div>
		</div>
		<div> <!-- exam 3 -->
			<div>
				<p><?php echo htmlspecialchars($t['module']['exam3']['title']); ?></p> <!-- name -->
			</div>
			<div>
				<p>Number of students: <?php echo $objet['module']['exam3']['nb']; ?></p> <!-- number of students -->
			</div>
			<div>
				<p>Mean: <?php echo $objet['module']['exam3']['mean']; ?></p> <!-- average mark -->
			</div>
		</div>
	</div>
</div>