<!-- Formulaire de connection d'utilisateur -->
<div class="connect">
    <form method="post" action="index.php?controller=administration&action=connected">
        <fieldset>
            <legend>Connection :</legend>
            <p>
                <input type="text" placeholder="Username" name="username" id="username_id"
                       value="<?php if (isset($_POST['login'])) {
                           echo $_POST['login'];
                       } ?>" required/>
            </p>
            <p>
                <input type="password" placeholder="Password" name="password" id="pwd_id" required/>
            </p>
            <p>
                <input type="submit" value="Log On"/>
            </p>
        </fieldset>
    </form>
</div>