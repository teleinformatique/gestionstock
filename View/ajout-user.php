<?php
mb_http_output('UTF-8');

?>

    <div class="col-sm-8">
        <h1>Ajouter un user</h1>
        <hr>
        <form action="" method="post" id="form-ajout-client" name="form-ajout-client">
            <label for="type">Profile</label>
            <select name="type" id="type" class="form-control">
                <option value="1">User</option>
                <option value="2">Admin</option>
            </select>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required="required">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required="required">
            </div>
            <div class="form-group">
                <label for="prenom">Telephone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" required="required">
            </div>
            <div class="form-group">
                <label for="prenom">Login</label>
                <input type="text" class="form-control" id="telephone" name="login" required="required">
            </div>
            <div class="form-group">
                <label for="prenom">Password</label>
                <input type="paswword" class="form-control" id="telephone" name="password" required="required">
            </div>
            <input type="hidden" name="action" value="ajoutUser">
            <button type="submit" class="btn btn-default">Enregistrer</button>
        </form>
    </div>
