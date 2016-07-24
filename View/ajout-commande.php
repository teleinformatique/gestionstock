<?php
mb_http_output('UTF-8');

?>

<div class="col-sm-8">
    <h1>Ajouter une commande</h1>
    <hr>
    <form class="form-horizontal" id="form-commande" action="" method="POST">

        <div class="radio">

            <label class="radio-inline">
                <input type="radio" name="type"  id="commande-fournisseur" value="2" >
                Fournisseur
            </label>

            <label class="radio-inline">
                <input type="radio" name="type" id="commande-client" value="1" checked>
                Client
            </label>
        </div>
        <hr>
        <div class="form-group">
            <label for="condition_reglement">Nom ou téléphone client</label>
            <input class="form-control" name="fournisseur_name" id="autocomplete-nom" type="text" autocomplete="off" />
            <input type="hidden" name="client" id="id_fournisseur" >
            <div id="select_client" class=" cacher">

            </div>
        </div>
        <div class="form-group ">
            <label for="datetimepicker">Date de livraison </label>
            <input class="form-control datetimepicker" type="datetime"  name="date_livraison" value="" >
        </div>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <div class="form-group commande-client">
            <label for="delai">Mode livraison</label>
            <select name="delai" id="delai" class="form-control">
                <option value="1">Immédiate</option>
                <option value="2">1 semaine</option>
                <option value="3">2 semaines</option>
                <option value="4">3 semaines</option>
            </select>

        </div>
        <div class="form-group">
            <label for="mode_reglement">Mode de règlement</label>
            <select name="mode_reglement" id="mode_reglement" class="form-control">
                <option selected="selected" value="4">Espéce</option>
                <option value="7">Chéque</option>
            </select>

        </div>
        <h3>Produits</h3>
        <hr>
        <div class="row produits">

            <div class="row ligne-prod">
            <div class="form-group col-sm-4">
                <label for="condition_reglement">Libelle</label>
                <select name="libelle_0" id="libelle" class="form-control">
                    <?php foreach($listeProd as $key => $value): ?>
                    <option value="<?php echo $value->id ?>"><?php echo $value->libelle ?></option>
                    <?php endforeach?>
                </select>
            </div>

            <div class="form-group col-sm-4 col-lg-offset-4">
                <label for="qte">Quantité</label>
                <input class="form-control" name="qte_0" id="qte_0" type="text"/>

            </div>
        </div>
        </div>
        <button class="btn btn-primary pull-right" id="add-row">Ajouter</button>


        <input type="hidden" value="ajoutCommande" name="action">
        <input type="hidden" value="1" name="numProd" id="numProd">
        <input class="btn btn-primary" type="submit" name="facture" value="Enregistrer" id="facture">
    </form>
        </div>

</div>
