<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Utils {

    /**
     * Cette methode permet de générateur un nombre de chiffre aléatoire.
     * @param type $nbreCar le nombre de caractére à générer
     * @return string
     */
    public static function random($nbreCar) {
        $string = "";
        $chaine = "0123456789";
        //microtime: Retourne le timestamp UNIX actuel avec les microsecondes - (PHP 4, PHP 5)
        //srand: Initialise le générateur de nombres aléatoires - (PHP 4, PHP 5)
        //rand: Génère une valeur aléatoire - (PHP 4, PHP 5)
        //strlen: Calcule la taille d'une chaîne - (PHP 4, PHP 5)
        srand((double) microtime() * 1000000);

        for ($i = 0; $i < $nbreCar; $i++) {
            $string .= $chaine[rand() % strlen($chaine)];
        }

        return $string;
    }

    /**
     * 
     * @param type $tab
     * @return type
     */
    public static function SumTable($tab) {
        $taille = count($tab);
        $somme = 0;
        for ($i = 0; $i < $taille; $i++) {
            $somme += $tab[$i];
        }
        return $somme;
    }

    public static  function array_to_obj($array, &$obj) {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $obj->$key = new stdClass();
                self::array_to_obj($value, $obj->$key);
            } else {
                $obj->$key = $value;
            }
        }
        return $obj;
    }

    public static function arrayToObject($array) {
        $object = new stdClass();
        return self::array_to_obj($array, $object);
    }
    /**
     * Permet de formater le montant de façon lisible
     * @param type $montant
     * @author aly
     */
    public static function formaterArgent($montant){
        return number_format($montant, 0, ',', ' ');
    }
    
    /**
     * Permet de formater la présentation de l'état de la facture 
     * en utilisant les class bootstrap pour label (info, success, warning, danger)
     * @param type $etat
     * @author aly
     */
    public static function formaterEtatFactureBootstrap($etatFacture){
        $successOrNotBootstrapt = $etatFacture==2?"success":"warning";
        $successOrNotBootstrapt = $etatFacture==3?"danger":$successOrNotBootstrapt;
        $successOrNotBootstrapt = $etatFacture==0?"default":$successOrNotBootstrapt;
        
        return "<span class=\"label label-".$successOrNotBootstrapt."\">" . lireStatutFacture($etatFacture) . "</span>" ;
    }
    /**
     * Permet de formater la présentation de l'état d'une commande
     * en utilisant les class bootstrap pour label (info, success, warning, danger)
     * @param type $etat
     * @author aly
     */
    public static function formaterEtatCommandeBootstrap($etatCommande){
        return  lireStatutCommande($etatCommande) ;
    }
    
    public static function formaterEtatLivraisonBootstrap($etatCommande){
        
        
        $etat = "";
        
        switch (intval($etatCommande)) {
            
            
            case 0:

                $etat = "<span class='label label-default'>En attente de validation...</span>";
                break;
            case 1:

                $etat = "<span class='label label-success'>Validé</span>";
                break;

            default:
                $etat = "<span class='label label-default'>Inconnu</span>";
                break;
        }
        
        return $etat;
    }
    
   
    /**
     * Permet de retrouver le libellé du secteur d'activité à partir de son code
     * TODO: créer un webservice qui le renvoie 
     * @param type $idSecteur
     */
    public static function getLibelleSecteurActivite($idSecteur){
        switch ($idSecteur){
            case '1': return "Commerce";
            case '2': return "BTP";
            case '3': return "Hotelerie";
            case '4': return "Agriculture";
            case '5': return "Elevage";
            case '6': return "Pêche";
            case '7': return "Artisanat";
            default: return "non défini";
            

        }
    }
    
    /**
     * Permet de comparer la date limite de paiement d'une facture avec 
     * date d'aujourd'hui
     * @param Date $date
     */
    public static function compareDate($date){
        
        $dateToDay = strtotime("now");
        $date = strtotime($date);
      
        if(intval($date) < $dateToDay){
            
            return 1;
        }
        
        return -1;
        
    }
    
    public static function conditionReglement($reglement){
        
        switch (intval($reglement)) {
            case 1:

                return "A réception";
                break;
            case 2:

                return "30 jours";
                break;
            case 3:

                return "30 jours fin de mois";
                break;
            case 4:

                return "60 jours";
                break;
            case 5:

                return "60 jours fin de mois";
                break;
            case 6:

                return "A commande";
                break;
            case 7:

                return "A livraison";
                break;
            case 8:

                return "50/50";
                break;

            default:
                return "Aucune";
                break;
        }
    }
    
    public static function modeReglement($mode){
        
        switch (intval($mode)) {
            case 4:

                return "Chéque";
                break;
            case 7:

                return "Espéce";
                break;

            default:
                return "Aucun";
                break;
        }
    }
    
    public static  function origine($origine){
        
        switch (intval($origine)) {
            case 1:
                
                return "Internet";
                break;
            case 2:
                
                return "Internet";
                break;
            case 3:
                
                return "Internet";
                break;
            case 4:
                
                return "Internet";
                break;
            case 5:
                
                return "Internet";
                break;
            case 6:
                
                return "Internet";
                break;
            case 7:
                
                return "Internet";
                break;
            case 8:
                
                return "Internet";
                break;
            case 9:
                
                return "Internet";
                break;
            case 10:
                
                return "Internet";
                break;
            case 11:
                
                return "Internet";
                break;

            default:
                return "Aucune";
                break;
        }
    }
    
    /**
     * Cette permet de renvoyer le message de confirmation d'une facture sur 
     * les actions validée et paiement.
     * @param int $code code du message de confirmation
     * @return string
     */
    public static function messageConfirm($code){
        
        $message = "";
        $messageSuccess = "<h4 class='bg-success message_danger'><span class='glyphicon glyphicon-ok'></span> ";
        $messageFailed = "<h4 class='bg-danger message_danger'><span class='glyphicon glyphicon-warning-sign'></span> ";
        switch (intval($code)) {
            case 1:

                $messageSuccess .= "Paiement enregistré avec succès</h4>";
                $message = $messageSuccess;
                break;
            case -1:
                $messageFailed .= "Erreur lors de l'enregistrement du paiement.</h4>";
                $message = $messageFailed;
                break;
            case 2:
                $messageSuccess .= "Facture validée avec succès</h4>";
                $message = $messageSuccess;
                break;
            case -2:
                $messageFailed .= "Le code est incorrect.</h4>";
                $message = $messageFailed;
                break;
            case 3:
                $messageSuccess .= "Commande validée avec succès</h4>";
                $message = $messageSuccess;
                break;
            case -3:
                $messageFailed .= "Le code est incorrect.</h4>";
                $message = $messageFailed;
                break;
            case 4:
                $messageSuccess .= "Facture créée avec succès</h4>";
                $message = $messageSuccess;
                break;
            case -4:
                $messageFailed .= "Erreur lors de la création de la facture.</h4>";
                $message = $messageFailed;
                break;
            case 5:
                $messageSuccess .= "Bon de livraison crée avec succès</h4>";
                $message = $messageSuccess;
                break;
            case -5:
                $messageFailed .= "Erreur lors de la création du bon de livraison.</h4>";
                $message = $messageFailed;
                break;
            case 6:
                $messageSuccess .= "Bon de livraison validé avec succés</h4>";
                $message = $messageSuccess;
                break;
            case -6:
                $messageFailed .= "Le code est incorrect.</h4>";
                $message = $messageFailed;
                break;
            case 7:
                $messageSuccess .= "Commande acceptée avec succés</h4>";
                $message = $messageSuccess;
                break;
            case -7:
                $messageFailed .= "Erreur lors de l'acceptation de la commande.</h4>";
                $message = $messageFailed;
                break;
            case 8:
                $messageSuccess .= "Commande refusée avec succés</h4>";
                $message = $messageSuccess;
                break;
            case -8:
                $messageFailed .= "Erreur .</h4>";
                $message = $messageFailed;
                break;
            case 9:
                $messageSuccess .= "Mise à jour de la Commande  avec succés</h4>";
                $message = $messageSuccess;
                break;
            case -9:
                $messageFailed .= "Erreur .</h4>";
                $message = $messageFailed;
                break;
            case 10:
                $messageSuccess .= "Dossier de garanti crée avec succés</h4>";
                $message = $messageSuccess;
                break;
            case -10:
                $messageFailed .= "Erreur .</h4>";
                $message = $messageFailed;
                break;
            case 12:
                $messageFailed .= "Reçu d'adhesion crée avec succés.</h4>";
                $message = $messageFailed;
                break;
            case 13:
                $messageSuccess .= "Projet crée avec succés.</h4>";
                $message = $messageSuccess;
                break;
            case 14:
                $messageSuccess .= "Client enregistré avec succès.</h4>";
                $message = $messageSuccess;
                break;
            case 15:
                $messageSuccess .= "Modifications enregistrées avec succès.</h4>";
                $message = $messageSuccess;
                break;

            default:
                $message = "Erreur ";
                break;
        }
        
        return $message;
    }
    
     public static function get_liste_zone_ccg(){
        
        $url = LINK_WS_ZONE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
        
        //$authentification = array('login'=>'formulaire de connexion','password'=>'');
        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        //$parameters = array('authentication'=>$authentication,'validator'=>$validator);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getAllZoneCCG");
        //print_r($result);die;
        
        
        
        return $result;
    }
    /**
     * TODO à implementer
     */
    public static function createArrayFromPOST() {
        
    }
    
    /**
     * Cette fonction permet d'encoder un fichier.
     */
    public static function encoderFichier($img) {
        
        if(intval($img['error']) === 0 ){
            $ex = pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION);
            $current = file_get_contents($img['tmp_name']);
            $content = base64_encode($current);
            $file = array(
                            'filename' => $img['name'],
                            'mimetype' => $ex,
                            'content' => $content,
                            'length' => $img['size'],
                          );
            
           return $file;
        }
 else {
            return -1;
 }
        
        
    }
    public static function encoderFichierPDF($pdf,$nom) {
        
        if(intval($pdf['error']) === 0 ){
            $ex = pathinfo($_FILES["$nom"]['name'],PATHINFO_EXTENSION);
            $current = file_get_contents($pdf['tmp_name']);
            $content = base64_encode($current);
            $file = array(
                            'filename' => $pdf['name'],
                            'mimetype' => $ex,
                            'content' => $content,
                            'length' => $pdf['size'],
                          );
            
           return $file;
        }
 else {
            return -1;
 }
        
        
    }
    public static function encoderFichierPDFBis($pdf,$name) {
        
        if(intval($pdf['error']) === 0 ){
            $ex = pathinfo($pdf['name'],PATHINFO_EXTENSION);
            $current = file_get_contents($pdf['tmp_name']);
            $content = base64_encode($current);
            $file = array(
                            'filename' => $name,
                            'mimetype' => $ex,
                            'content' => $content,
                            'length' => $pdf['size'],
                          );
            
           return $file;
        }
 else {
            return -1;
 }
        
        
    }
    /**
     * Cette permet de retourner le lien d'une image
     * @param type $filename
     * @return string
     */
    public static function getLinkImage($filename, $idTiers) {
        
        $server = ROOT_SERVER."/viewimageccg.php?modulepart=societe&entity=1";
        $img = "&file=".$idTiers."/logos/".$filename;
        //return $server.$img;
        return $server.$img;
        
    }
    
    
    public static function titrePage($action) {
        $zone = $_SESSION['zone'];
        $message = "";
        switch ($action) {
            case "own-invoice-customer":
                
                $message =  "Liste des factures client de la zone: ".$zone;

                break;
            case "own-ionvoice-supplier":
                
                $message =  "Liste des factures fournisseurs de la zone: ".$zone;

                break;
            case "own-order-customer":
                
                $message =  "Liste des commandes client de la zone: ".$zone;

                break;
            case "own-order-supplier":
                
                $message =  "Liste des commandes fournisseurs de la zone: ".$zone;

                break;

            default:
                $message =  "Gestion des ".$action." de la zone: ".$zone;
                break;
        }
        
        return $message;
    }
    
    /**
     * Recupérer les valeurs reçus depuis un formulaire.
     * @param type $data
     * @return type
     */
    public static function GETPOST($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    
    public static function lireEtatProjet($etat) {
        $etat = intval($etat);
        $message = "";
        switch ($etat) {
            case 0:

                $message = "<span class='label label-danger'>Non</span>";
                break;
            case 1:

               $message = "<span class='label label-success'>Oui</span>";
                break;

            default:
                $message = "<span class='label label-default'>Inconnu</span>";
                break;
        }
        
        return $message;
    }
    
    

}
