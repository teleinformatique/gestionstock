<?php
mb_http_output('UTF-8');
/* 
 * Template du formulaire de connexion.
 */

?>

    <div class="col-sm-6 col-md-4 col-md-offset-4">

        <form class="form-signin" role="form" method="Post" action="index.php?page=connexion">
            <h2 class="text-center login-title">Bienvenue dans votre espace Commercial</h2>
    <?php echo (isset($_GET['error'])) ? "<p class='bg-danger message_danger'>".$errorLog[$_GET['error']]."</p>" : ""; ?>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Login" required autofocus size="15" maxLength="40" name="login"  tabindex="1" />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required tabindex="2" />
            </div>
            <div class="form-group">
            <br><input type="submit" class="btn btn-lg btn-primary btn-block" value="&nbsp; Connexion &nbsp;" name="connexion" tabindex="3" />
            </div>
            <input type="hidden" class="form-control"  name="action" value="connexionUser" />
        </form>
    </div>
