<div class="account">
    <div>
        <form method="post" action="index.php?controller=user&action=update">
            <fieldset>
                <legend>Mes infomations personnelles :</legend>
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
                    <input type="password" pattern="^\S{6,}$" placeholder="New Password" name="password"/>
                </p>

                <p>
                    <input type="password" pattern="^\S{6,}$" placeholder="Validation of new password" name="conf_password"/>
                </p>

                <p>
                    <button type="submit">Save</button>
                </p>
            </fieldset>
        </form>
    </div>