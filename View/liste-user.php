<?php
mb_http_output('UTF-8');
?>
<div class="row col-md-12">
    <h1>Liste des clients</h1>
    <hr>
    <table class="table table-striped ">
        <thead>
        <a href="<?php echo 'index.php?page=ajout-user'?>" class="btn btn-primary btn-xs pull-right"><b>+</b> Ajouter client</a>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>login</th>
            <th>profile</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <?php
            foreach($response as $key => $value):
        ?>
        <tr>
            <td><?php echo $value->id ?></td>
            <td><?php echo $value->nom ?></td>
            <td><?php echo $value->prenom ?></td>
            <td><?php echo $value->telephone ?></td>
            <td><?php echo $value->login ?></td>
            <td><?php echo ($value->profile == 1)?"User":"Admin" ?></td>
            <td class="text-center">
                <a class='btn btn-info btn-xs' href="<?php echo 'index.php?page=modify-user&id='.$value->id ?>" >
                    <span class="glyphicon glyphicon-edit"></span>
                    Modifier
                </a>
                <a href="<?php echo 'index.php?page=remove-user&id='.$value->id?>" data-id="<?php echo $value->id ?>" class="btn btn-danger btn-xs btn-remove-prod">
                    <span class="glyphicon glyphicon-remove"></span>
                    Supprimer
                </a>
            </td>
        </tr>
        <?php  endforeach ?>
    </table>
</div>