<?php
mb_http_output('UTF-8');
/* 
 * Template du formulaire de connexion.
 */
?>

    <div class="col-sm-8">
        <h1>Modifier le client <?php echo $response->prenom ?> <?php echo $response->nom ?></h1>
        <hr>
        <form action="" method="post" id="form-modify-client" name="form-modify-client">
            <label for="type">Type du client</label>
            <select name="type" id="type" class="form-control">
                <option value="1">Client simple</option>
                <option value="2">Fournisseur</option>
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
                <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $response->telephone ?>" >
            </div>
            <input type="hidden" name="action" value="modifyClient">
            <input type="hidden" name="id" value="<?php echo $response->id ?>">
            <button type="submit" class="btn btn-default">Enregistrer</button>
        </form>
    </div>
