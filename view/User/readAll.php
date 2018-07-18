<!-- Page de profil de l'utilisateur courant -->

<div class="account">
    <div>
        <form method="post" action="index.php?controller=user&action=update">
            <fieldset>
                <legend>Mes infomations personnelles :</legend>
                <p>
                    <input type="text" name="Username" id="username_id"
                           value="<?php echo htmlspecialchars($objet->get('Id')); ?>" readonly/>
                </p>

                <p>
                    <input type="text" placeholder="First Name" name="fname" id="fname_id"
                           value="<?php echo htmlspecialchars($objet->get('FirstName')); ?>" readonly/>
                </p>

                <p>
                    <input type="text" placeholder="Last Name" name="lname" id="lname_id"
                           value="<?php echo htmlspecialchars($objet->get('LastName')); ?>" readonly/>
                </p>

                <p>
                    <input type="email" placeholder="E-Mail" name="mail" id="mail_id"
                           value="<?php echo htmlspecialchars($objet->get('Email')); ?>"/>
                </p>

                <p>
                    <input type="text" placeholder  ="Address" name="address" id="address_id"
                           value="<?php echo htmlspecialchars($objet->get('Address')); ?>"/>
                </p>

                <p>
                    <input type="tel" placeholder="Phone Number" name="num_tel" id="tel_id"
                           value="<?php echo htmlspecialchars($objet->get('PhoneNumber')); ?>"/>
                </p>

                <p>
                    <input type="password" pattern="^\S{6,}$" placeholder="New Password" name="password" id="pwd_id"/>
                </p>

                <p>
                    <input type="password" pattern="^\S{6,}$" placeholder="Validation of new password" name="conf_pwd"
                           id="conf_pwd_id"/>
                </p>

                <p>
                    <button type="submit">Save</button>
                </p>
            </fieldset>
        </form>
    </div>