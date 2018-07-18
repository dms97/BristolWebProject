<!-- Formulaire de connection d'utilisateur -->
<div class="connect">
    <form method="post" action="index.php?controller=user&action=verifUser">
        <fieldset>
            <h1>Connection :</h1>
            <p>
                <input type="text" placeholder="login" name="login" id="login_id"
                       value="<?php if (isset($_POST['login'])) {
                           echo $_POST['login'];
                       } ?>" required/>
            </p>
            <p>
                <input type="password" placeholder="password" name="password" id="pwd_id" required/>
            </p>
            <p>
                <input id="validation" type="submit" value="Log On"/>
            </p>
        </fieldset>
    </form>
</div>