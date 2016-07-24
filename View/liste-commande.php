<?php
mb_http_output('UTF-8');
?>
<div class="row col-md-12">
    <h1>Liste des commandes</h1>
    <hr>
    <table class="table table-striped ">
        <thead>
        <a href="<?php echo 'index.php?page=ajout-commande'?>" class="btn btn-primary btn-xs pull-right"><b>+</b> Ajouter commande</a>
        <tr>
            <th>ID</th>
            <th>Date de livraison</th>
            <th>Client</th>
            <th>Telephone</th>
        </tr>
        </thead>
        <?php
            foreach($response as $key => $value):
        ?>
        <tr>
            <td><?php echo $value->id ?></td>
            <td><?php echo $value->datedelivraison ?></td>
            <td><?php echo $value->nom ?></td>
            <td><?php echo $value->telephone ?></td>

        </tr>
        <?php  endforeach ?>
    </table>
</div>