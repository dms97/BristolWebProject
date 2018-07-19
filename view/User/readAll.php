<script src="./css/js/formUser.js"></script>
<div class="account col-sm-offset-4 col-sm-4">
    <div>
        <form method="post" action="index.php?controller=user&action=update">
            <fieldset>
                <legend>My personal informations :</legend>
                <p>
                    <input type="text" name="id" disabled
                           value="<?php echo htmlspecialchars($objet->get('Id')); ?>" readonly/>
                </p>

                <p>
                    <input type="text" placeholder="First Name" name="first_name" disabled
                           value="<?php echo htmlspecialchars($objet->get('FirstName')); ?>" readonly/>
                </p>

                <p>
                    <input type="text" placeholder="Last Name" name="last_name" disabled
                           value="<?php echo htmlspecialchars($objet->get('LastName')); ?>" readonly/>
                </p>

                <p>
                    <input type="email" placeholder="E-Mail" name="email"
                           value="<?php echo htmlspecialchars($objet->get('Email')); ?>"/>
                </p>

                <p>
                    <input type="text" placeholder  ="Address" name="address"
                           value="<?php echo htmlspecialchars($objet->get('Address')); ?>"/>
                </p>

                <p>
                    <input type="tel" placeholder="Phone Number" name="phone"
                           value="<?php echo htmlspecialchars($objet->get('PhoneNumber')); ?>"/>
                </p>

                <p>
                    <input id="pwd" onchange="checkPassword()"  onblur="checkPassword()" type="password" placeholder="New Password" name="password"/>
                </p>

                <p>
                    <input id="cpwd" onchange="checkPassword()" onblur="checkPassword()" type="password" placeholder="Validation of new password" name="conf_password"/>
                </p>

                <p id="error_field"></p>

                <p>
                    <button id="button_save_form" onclick="checkPassword()" type="submit">Save</button>
                </p>
            </fieldset>
        </form>
    </div>
	<div>
		<p class="survey">Take time to answer our evaluation survey! Click <a href="index.php?controller=user&action=survey">HERE</a> !</p>
	</div>
</div>
