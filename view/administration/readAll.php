<!-- Page de profil de l'utilisateur courant -->

<div class="account">
    <div>
        <form method="post" action="index.php?controller=administration&action=update">
            <fieldset>
               <legend>Mes infomations personnelles :</legend>
               <p>
                    <input type="text" placeholder="Identifiant" name="username" id="username_id" value="<?php echo htmlspecialchars($objet['username']); ?>"readonly/>
               </p>

               <p>
                    <input type="text" placeholder="First Name" name="fname" id="fname_id" value="<?php echo htmlspecialchars($objet['fname']); ?>"readonly/>
               </p>

               <p>
                    <input type="text" placeholder="First Name" name="lname" id="lname_id" value="<?php echo htmlspecialchars($objet['lname']); ?>"readonly/>
               </p>

               <p>
                    <input type="date" placeholder="Birth Date" name="birthdate" id="date_id" value="<?php echo htmlspecialchars($objet['birthdate']); ?>"/>
               </p>

               <p>
                    <input type="email" placeholder="E-Mail" name="mail" id="mail_id" value="<?php echo htmlspecialchars($objet['mail']); ?>"/>
               </p>

               <p>
                    <input type="text" placeholder="Address" name="address" id="address_id" value="<?php echo htmlspecialchars($objet['address']); ?>"/>
               </p>

               <p>
                    <input type="tel" placeholder="Phone Number" name="num_tel" id="tel_id" value="<?php echo htmlspecialchars($objet['num_tel']); ?>"/>
               </p>

               <p>
                    <input type="password" pattern="^\S{6,}$" placeholder="New Password" name="password" id="pwd_id"/>
               </p>

               <p>
                    <input type="password" pattern="^\S{6,}$" placeholder="Validation of new password" name="conf_pwd" id="conf_pwd_id"/>
               </p>

               <p>
                    <input type="submit" value="Edit Information" />
               </p>
           </fieldset>
        </form>
    </div>