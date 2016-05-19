<?php
mb_http_output('UTF-8');
?>
<div class="row col-md-12">
    <h1>Liste des produits</h1>
    <hr>
    <table class="table table-striped ">
        <thead>
        <a href="<?php echo 'index.php?page=ajout-produit'?>" class="btn btn-primary btn-xs pull-right"><b>+</b> Ajouter produit</a>
        <tr>
            <th>ID</th>
            <th>Libelle</th>
            <th>Description</th>
            <th>Quantité stock</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <?php
            foreach($response as $key => $value):
        ?>
        <tr>
            <td><?php echo $value->id ?></td>
            <td><?php echo $value->libelle ?></td>
            <td><?php echo $value->description ?></td>
            <td><?php echo $value->qtestock ?></td>
            <td class="text-center">
                <a class='btn btn-info btn-xs' href="<?php echo 'index.php?page=modify-produit&id='.$value->id ?>" >
                    <span class="glyphicon glyphicon-edit"></span>
                    Modifier
                </a>
                <a href="<?php echo 'index.php?page=remove-produit&id='.$value->id ?>" data-id="<?php echo $value->id ?>" class="btn btn-danger btn-xs btn-remove-prod">
                    <span class="glyphicon glyphicon-remove"></span>
                    Supprimer
                </a>
            </td>
        </tr>
        <?php  endforeach ?>
    </table>
</div>