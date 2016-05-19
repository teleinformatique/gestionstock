<?php
mb_http_output('UTF-8');

?>

    <div class="col-sm-8">
        <h1>Ajouter un client</h1>
        <hr>
        <form action="" method="post" id="form-ajout-client" name="form-ajout-client">
            <label for="type">Profile</label>
            <select name="type" id="type" class="form-control">
                <option value="1">User</option>
                <option value="2">Admin</option>
            </select>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $response->nom ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $response->prenom ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Telephone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $response->telephone ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Login</label>
                <input type="text" class="form-control" id="telephone" name="login" value="<?php echo $response->login ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Password</label>
                <input type="paswword" class="form-control" id="telephone" name="password" value="<?php echo $response->password ?>">
            </div>
            <input type="hidden" name="action" value="modifyUser">
            <input type="hidden" name="id" value="<?php echo $response->id ?>">
            <button type="submit" class="btn btn-default">Enregistrer</button>
        </form>
    </div>
