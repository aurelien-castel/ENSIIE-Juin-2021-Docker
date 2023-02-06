<div class="container">
    <div class="row">
        <div id="card border-primary mb-3" class="text-center">
            <h2 class="title">Inscription utilisateur</h2>
            <form method="POST" action="index.php?page=createAccount">
                    <p>
                        <label for="login">Login*</label>
                        <input id="login" type="text" name="user_name" size="30" minlength="3" maxlength="128"  required value="<?php  if(isset($_POST['user_name'])) {echo($_POST['user_name']);}?>">
                    </p>
                    <p>
                        <label for="email">Email*</label>
                        <input id="email" type="text" name="user_email" size="30" pattern="[a-zA-Z0-9\-_.]+@[a-zA-Z0-9\-_.]+\.[a-zA-Z]+" required value="<?php  if(isset($_POST['user_email'])) {echo($_POST['user_email']);}?>">
                    </p>
                    <p>
                        <label for="mdp">Mot de passe*</label>
                        <input id="mdp"  type="password"  name="user_password" size="30" minlength="8" maxlength="72" required>
                    </p>
                    <p>
                        <input type="submit" value="Valider" name="valider" class="btn btn-success">
                        <input type="reset" value="Annuler" name="annuler" class="btn btn-primary">
                    </p>
            </form>
            <a href="/index.php" class="btn btn-warning" role="button">Annuler inscription</a>

        </div>
    </div>
</div>
