<?php

/* 
 * template du menu 
 */
?>
<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Gestion stock</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <?php if(isset($_SESSION['profile'])): ?>
        <ul class="nav navbar-nav">
            <?php if(@$_SESSION['profile'] == 2): ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Utilisateurs <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo 'index.php?page=ajout-user'?>">Ajouter</a></li>
                    <li><a href="<?php echo 'index.php?page=liste-user'?>">Liste</a></li>
                </ul>
            </li>
            <?php endif ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produits <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo 'index.php?page=ajout-produit'?>">Ajouter</a></li>
                    <li><a href="<?php echo 'index.php?page=liste-produit'?>">Liste</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Commandes <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo 'index.php?page=ajout-commande'?>">Ajouter</a></li>
                    <li><a href="<?php echo 'index.php?page=liste-commande'?>">Liste</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Client <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo 'index.php?page=ajout-client'?>">Ajouter</a></li>
                    <li><a href="<?php echo 'index.php?page=liste-client&type=1'?>">Liste clients</a></li>
                    <li><a href="<?php echo 'index.php?page=liste-client&type=2'?>">Liste fournisseurs</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon compte <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo 'index.php?page=deconnexion'?>">Deconnexion</a></li>
                </ul>
            </li>
        </ul>
        <?php endif ?>
    </div><!-- /.navbar-collapse -->
</nav>
