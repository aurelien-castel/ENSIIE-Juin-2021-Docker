<h2 class="title">Identification utilisateur</h2>̀̀̂
<form method="POST" action="index.php?action=loginUser">
        <p>
            <label for="login">Login*</label>
            <input id="user_name" type="text" name="user_name" size="30" minlength="4" maxlength="128" data-toggle="tooltip" title="test pour tester" required>
        </p>

        <p>
            <label for="mdp">Mot de passe*</label>
            <input id="user_password"  type="password"  name="user_password" size="30" minlength="8" maxlength="72" data-toggle="tooltip" title="12346578 pour tester" required>
        </p>

        <p>
            <input type="submit" value="Valider" name="valider" class="btn btn-success">
            <input type="reset" value="Annuler" name="annuler" class="btn btn-primary"> 
        </p>
        
</form>

<a href="/index.php?page=createAccountPage" class="btn btn-warning" role="button">S'inscrire</a>