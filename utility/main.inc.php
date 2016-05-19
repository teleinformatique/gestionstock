<?php

/* 
 * Fichier contenant les variables globales de l'applicatioon
 */
//logo de l'application à mettre dans le dossier /img
define('LOGO', 'logogarant_mini.jpg');
//path des dossiers du systéme
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'].'gestionstock/');

//database access
define('BD_USER','root');
define('BD_PASSWORD','');
define('BD_NAME','stock');


//code d'erreur connexion
$errorLog = array(
                    -2 => 'Vérifier votre connexion',
                    -3 => 'Login ou mot de passe incorrect!',
                    -1 => 'Vous n\'avez pas accés a cette zone!',
                    -6 => 'Veuillez selectionner une zone!',
                 );

 //commande client
   function lireStatutCommande($status){
        $result = '';
                switch (intval($status)) {
                    case 0: $result = "<span class= 'label label-default'>En attente de validation...</span>";
                        break; 
                    case 1: $result = "<span class= 'label label-warning'>Validée</span>";
                        break;
                    case 2: $result =  "<span class= 'label label-info'>Envoi en cours</span>";
                        break;
                    case 3: $result =  "<span class= 'label label-success'>Délivrée</span>";
                        break;
                    case 4: $result =  "<span class= 'label label-success'></span>";
                        break;
                    case -1: $result =  "<span class= 'label  label-danger'>Annulée</span>";
                        break;
                        break;
                    case 9: $result =  "<span class= 'label  label-danger'>Refusée</span>";
                        break;
                    default : $result = 'Inconnue';
                }
                return $result;
       
   }
   
 //commande fournisseur
   function lireStatutCommandeFournisseur($status){
        $result = '';
                switch (intval($status)) {
                    case 0: $result = "<span class= 'label label-default'>En attente de validation...</span>";
                        break; 
                    case 1: $result = "<span class= 'label label-warning'>Validée</span>";
                        break;
                    case 2: $result =  "<span class= 'label label-info'>Approuvée</span>";
                        break;
                    case 3: $result =  "<span class= 'label label-success'>Envoie en cours</span>";
                        break;
                    case 5: $result =  "<span class= 'label label-success'>Délivrée</span>";
                        break;
                    
                    case 9: $result =  "<span class= 'label  label-danger'>Refusée</span>";
                        break;
                    default : $result = 'Inconnue';
                }
                return $result;
       
   }
   
   //méthode d'expédition bordereau de livraison
   $bordereau = array(
                    1=>"Enlèvement par le client",
                    2=>"Transporteur",
       );
   
   
   
   //lien pages
   $parent_link = "index.php?page=";
   define('GET_TIER_BY_REF', $parent_link."info_tiers&idTiers=");
   define('GET_FOURN_BY_REF', $parent_link."info_fournisseurs&idTiers=");
   
  