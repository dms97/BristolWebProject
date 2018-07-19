<div id="survey">
	<div>
		<h1>Evaluation Survey</h1>
	</div>
	<form action="index.php?controller=user&action=survey" method="POST">
		<div>
			<p class="question"><span>Question 1:</span> Do you like using this web application ?</p>
			<p>
				<input type="radio" name="q1" value=1>Excellent 
				<input type="radio" name="q1" value=2>Good 
				<input type="radio" name="q1" value=3>Neutral 
				<input type="radio" name="q1" value=4>Difficult 
				<input type="radio" name="q1" value=5>Not Sure 
			</p>
			<p class="sug">Suggestions ?</p>
			<p>
				<TEXTAREA name="q1sug" cols=60 rows=6></TEXTAREA>
			</p>
		</div>
		<div>
			<p class="question"><span>Question 2:</span> Did you like the timetable organisation ?</p>
			<p>
				<input type="radio" name="q2" value=1>Excellent 
				<input type="radio" name="q2" value=2>Good 
				<input type="radio" name="q2" value=3>Neutral 
				<input type="radio" name="q2" value=4>Difficult 
				<input type="radio" name="q2" value=5>Not Sure 
			</p>
			<p class="sug">Suggestions ?</p>
			<p>
				<TEXTAREA name="q2sug" cols=60 rows=6></TEXTAREA>
			</p>
		</div>
		<div>
			<p class="question"><span>Question 3:</span> Do you like studying in our university ?</p>
			<p>
				<input type="radio" name="q3" value=1>Excellent 
				<input type="radio" name="q3" value=2>Good 
				<input type="radio" name="q3" value=3>Neutral 
				<input type="radio" name="q3" value=4>Difficult 
				<input type="radio" name="q3" value=5>Not Sure 
			</p>
			<p class="sug">Suggestions ?</p>
			<p>
				<TEXTAREA name="q3sug" cols=60 rows=6></TEXTAREA>
			</p>
		</div>
		<div>
			<p class="question"><span>Question 4:</span> Blabla question blabla ?</p>
			<p>
				<input type="radio" name="q4" value=1>Excellent 
				<input type="radio" name="q4" value=2>Good 
				<input type="radio" name="q4" value=3>Neutral 
				<input type="radio" name="q4" value=4>Difficult 
				<input type="radio" name="q4" value=5>Not Sure 
			</p>
			<p class="sug">Suggestions ?</p>
			<p>
				<TEXTAREA name="q4sug" cols=60 rows=6></TEXTAREA>
			</p>
		</div>
		<div>
			<p class="question"><span>Question 5:</span> Did you like answering this survey ?</p>
			<p>
				<input type="radio" name="q5" value=1>Excellent 
				<input type="radio" name="q5" value=2>Good 
				<input type="radio" name="q5" value=3>Neutral 
				<input type="radio" name="q5" value=4>Difficult 
				<input type="radio" name="q5" value=5>Not Sure 
			</p>
			<p class="sug">Suggestions ?</p>
			<p>
				<TEXTAREA name="q5sug" cols=60 rows=6></TEXTAREA>
			</p>
		</div>
		<div class="send">
			<input type=submit value="Send">
		</div>
	</form>
</div>