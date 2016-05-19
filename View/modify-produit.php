<?php
mb_http_output('UTF-8');
/* 
 * Template du formulaire de connexion.
 */
?>

    <div class="col-sm-8">
        <h1>Modification du produit <?php echo $response->libelle ?></h1>
        <hr>
        <form action="" method="post" id="form-ajout-produit" name="form-ajout-produit">
            <div class="form-group">
                <label for="libelle">Libelle</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="<?php echo $response->libelle ?>">
            </div>
            <div class="form-group">
                <label for="qte">Quantité stock</label>
                <input type="text" class="form-control" id="qte" name="qte" value="<?php echo $response->qtestock ?>">
            </div>
            <div class="form-group">
                <label for="desciption">Description</label>
                <textarea class="form-control" rows="3" id="desciption" name="description">
                    <?php echo $response->description ?>
                </textarea>
            </div>
            <input type="hidden" name="action" value="modifyProduit">
            <input type="hidden" name="id" value="<?php echo $response->id ?>">
            <button type="submit" class="btn btn-default">Enregistrer</button>
        </form>
    </div>
