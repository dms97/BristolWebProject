<div class="administration">
	<div>
		<h1>Administration Panel</h1>
	<div>
	<div>
		<form method="post" action="index.php?controller=administration.ctrl&action=created">
			<fieldset>
			   <p>
					<?php if(isset($_POST['login'])){echo htmlspecialchars($_POST['login']);} ?>
			   </p>
			   <p>
					First Name : 
					<input type="text" placeholder="First Name" name="nom" value="<?php if(isset($_POST['firstname'])){echo htmlspecialchars($_POST['firstname']);} ?>" required/>
			   </p>
			   <p>
					Last Name : 
					<input type="text" placeholder="Last Name" name="prenom" value="<?php if(isset($_POST['lastname'])){echo htmlspecialchars($_POST['lastname']);} ?>" required/>
			   </p>
			   <p>
					Birth Date : 
					<input type="date" name="birthdate" value="<?php if(isset($_POST['date_naissance'])){echo htmlspecialchars($_POST['birthdate']);} ?>" required/>
			   </p>
			   <p>
					Email :
					<input type="email" placeholder="mail@uwe.ac.uk" name="mail" value="<?php if(isset($_POST['mail'])){echo htmlspecialchars($_POST['mail']);} ?>" required/>
			   </p>
			   <p>
					Address : 
					<input type="text" placeholder="Address" name="adresse" value="<?php if(isset($_POST['address'])){echo htmlspecialchars($_POST['address']);} ?>" required/>
			   </p>
			   <p>
					Phone Number : 
					<input type="tel" placeholder="phone number" name="num_phone" value="<?php if(isset($_POST['num_phone'])){echo htmlspecialchars($_POST['num_phone']);} ?>" required/>
			   </p>
			   <p>
					New Password
					<input type="password" pattern="^\S{6,}$" placeholder="passw0rd" name="password" required/>
			   </p>
			   <p>
					Verify New password
					<input type="password" pattern="^\S{6,}$" placeholder="passw0rd" name="conf_password" required/>
			   </p>
			   <p>
					<input type="submit" value="Apply Edits" />
			   </p>
		   </fieldset>
		</form>
	</div>


</div>