<?php
mb_http_output('UTF-8');
/* 
 * Template du formulaire de connexion.
 */
?>

    <div class="col-sm-8">
        <h1>Ajout un nouveau produit</h1>
        <hr>
        <form action="" method="post" id="form-ajout-produit" name="form-ajout-produit">
            <div class="form-group">
                <label for="exampleInputEmail1">Libelle</label>
                <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Nom du produit">
            </div>
            <div class="form-group">
                <label for="desciption">Description</label>
                <textarea class="form-control" rows="3" id="desciption" name="description"></textarea>
            </div>
            <input type="hidden" name="action" value="ajoutProduit">
            <button type="submit" class="btn btn-default">Enregistrer</button>
        </form>
    </div>
