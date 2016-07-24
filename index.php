<?php
session_name("gestionstock");
session_start();
ob_start();
//Controlleur frontal de lapplication.
include $_SERVER['DOCUMENT_ROOT'].'/gestionstock/utility/main.inc.php';
//include_once DOCUMENT_ROOT.'Model/BDAcess.php';
include_once DOCUMENT_ROOT.'Controller/ProduitController.php';
include_once DOCUMENT_ROOT.'Controller/ClientController.php';
include_once DOCUMENT_ROOT.'Controller/CommandeController.php';
include_once DOCUMENT_ROOT.'Controller/UserController.php';
//BDAcess::connexion(BD_NAME, BD_USER,BD_PASSWORD);



//template en-tête de l'application.
include_once DOCUMENT_ROOT.'View/include/layout.head.tpl.php';


if (isset($_GET['page'])) {
    $page = $_GET['page'];





    switch ($page) {
        case "connexion":
            if(isset($_POST['action'])){
                $user = new UserController();
                $error = $user->connexion($_POST['login'], $_POST['password']);
               if($error != null){
                   $_SESSION['profile']=$error->profile;
                   $_SESSION['id']=$error->id;
                   header("Location:index.php?page=liste-client&type=1");
               }else{
                   header("Location:index.php?page=connexion");
               }
            }
            include_once DOCUMENT_ROOT.'View/connexion.php';
            break;

        case "deconnexion":
            session_destroy();
            header("Location:index.php?page=connexion");
            break;
        case "ajout-produit":
            include_once DOCUMENT_ROOT."View/include/session_test.php";
            if(isset($_POST['action'])){
                $produitController = new ProduitController();
                $response = $produitController->ajoutAction($_POST);
                header('Location:'.$response);
            }
            include_once DOCUMENT_ROOT.'View/ajout-produit.php';
            break;

        case "liste-produit":
            include_once DOCUMENT_ROOT."View/include/session_test.php";
            $produitController = new ProduitController();
            $response = $produitController->listeAction();
            include_once DOCUMENT_ROOT.'View/liste-produit.php';
            break;

        case "remove-produit":
            include_once DOCUMENT_ROOT."View/include/session_test.php";
            $produitController = new ProduitController();
            $response = $produitController->removeAction($_GET['id']);
            include_once DOCUMENT_ROOT.'View/liste-produit.php';
            header('Location:'.$response);
            break;

        case "modify-produit":
            include_once DOCUMENT_ROOT."View/include/session_test.php";
            $produitController = new ProduitController();
            if(isset($_POST['action'])){
                $response = $produitController->$_POST['action']($_POST);
                header('Location:'.$response);
            }
            $response = $produitController->getAction($_GET['id']);
            include_once DOCUMENT_ROOT.'View/modify-produit.php';
            break;

        case "ajout-client":
            include_once DOCUMENT_ROOT."View/include/session_test.php";
            $client = new ClientController();
            if(isset($_POST['action'])){
                $response = $client->ajoutAction($_POST);
                header('Location:'.$response);
            }
            include_once DOCUMENT_ROOT.'View/ajout-client.php';
            break;
        case "liste-client":
            include_once DOCUMENT_ROOT."View/include/session_test.php";
            $clientController = new ClientController();
            $response = $clientController->listeAction($_GET['type']);
            include_once DOCUMENT_ROOT.'View/liste-client.php';
            break;

        case "remove-client":
            include_once DOCUMENT_ROOT."View/include/session_test.php";
            $clientController = new ClientController();
            $response = $clientController->removeAction($_GET);
            include_once DOCUMENT_ROOT.'View/liste-client.php';
            header('Location:'.$response);
            break;

        case "modify-client":
            include_once DOCUMENT_ROOT."View/include/session_test.php";
            $produitController = new ClientController();
            if(isset($_POST['action'])){
                $response = $produitController->$_POST['action']($_POST);
                header('Location:'.$response);
            }
            $response = $produitController->getAction($_GET['id']);
            include_once DOCUMENT_ROOT.'View/modify-client.php';
            break;

        case "ajout-commande":
            include_once DOCUMENT_ROOT."View/include/session_test.php";
            $commande = new CommandeController();
            if(isset($_POST['action'])){
                $response = $commande->ajoutAction($_POST);
                header('Location:'.$response);
            }
            $produit = new ProduitController();
            $listeProd = $produit->listeAction();
            include_once DOCUMENT_ROOT.'View/ajout-commande.php';
            break;

        case "liste-commande":
            include_once DOCUMENT_ROOT."View/include/session_test.php";
            $commande = new CommandeController();
            $response = $commande->listeAction();
            include_once DOCUMENT_ROOT.'View/liste-commande.php';
            break;

        //user
        case "ajout-user":
            include_once DOCUMENT_ROOT."View/include/session_admin.php";
            $user = new UserController();
            if(isset($_POST['action'])){
                $response = $user->ajoutAction($_POST);
                header('Location:'.$response);
            }
            include_once DOCUMENT_ROOT.'View/ajout-user.php';
            break;
        case "liste-user":
            include_once DOCUMENT_ROOT."View/include/session_admin.php";
            $user = new UserController();
            $response = $user->listeAction($_GET['type']);
            include_once DOCUMENT_ROOT.'View/liste-user.php';
            break;

        case "remove-user":
            include_once DOCUMENT_ROOT."View/include/session_admin.php";
            $user = new UserController();
            $response = $user->removeAction($_GET);
            include_once DOCUMENT_ROOT.'View/liste-user.php';
            header('Location:'.$response);
            break;

        case "modify-user":
            include_once DOCUMENT_ROOT."View/include/session_admin.php";
            $user = new UserController();
            if(isset($_POST['action'])){
                $response = $user->$_POST['action']($_POST);
                header('Location:'.$response);
            }
            $response = $user->getAction($_GET['id']);
            include_once DOCUMENT_ROOT.'View/modify-user.php';
            break;
        //user
        default:
            include_once DOCUMENT_ROOT.'View/error/error404.tpl.php';
            break;
    }
}
else {

    include_once DOCUMENT_ROOT.'View/connexion.php';
}

//template pied de page de l'application
include_once DOCUMENT_ROOT.'View/include/layout.foot.tpl.php';
ob_end_flush();
          
            
        
 
   