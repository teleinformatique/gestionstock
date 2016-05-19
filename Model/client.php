<?php

/*
 * Sensirtel 2014.
 * @author KSR
 */

/**
 * Classe contenant les appels des webservices dolibarr
 *
 */



        
include_once 'utility/main.inc.php'; //fichier contenat les constantes utilisées
include_once 'lib/nusoap.php';
class client {
    
    //authentification
        private $authentication ;
        private $zone;


        public function __construct($login,$password, $zone) {
          
            $this->authentication = array(
            'dolibarrkey'=>KEY,
            'sourceapplication'=>APPLICATION,
            'login'=>$login,
            'password'=>$password,
            'entity'=>'') ;
            
        $this->zone = $zone;
        }
        
        public function getteurZone(){
            return $this->zone;
        }


        /**
     * Cette méthode permet de récupérer un tiers.
     * Elle reçoit comme paramétre l'identifiant du tiers.
     * @param type $id     id du tiers
     * @return type        if ok array(); if not ok -1
     */
    public  function get_tiers_by_id($id){
        

        $url = LINK_WS_GET_THIRPARTY;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'id'=>$id);
        $result = $client->call("getThirdParty",$parameters);
        
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            $_SESSION['tiers'] = $result['thirdparty']['ref'];
            return $result;
        }
        

         else {
              
            return $notError;

        }


    }
    
    public  function get_all_tiers_by_zone(){
        

        $url = LINK_WS_ZONE;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'zone'=>$this->getteurZone());
        $result = $client->call("getAllThiers",$parameters);
        //print_r($result);die;
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result['tiers'];
        }
        

         else {
              
            return $notError;

        }


    }
    public  function get_all_fournisseurs_by_zone(){
        

        $url = LINK_WS_ZONE;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'zone'=>$this->getteurZone());
        $result = $client->call("getAllFourn",$parameters);
        //print_r($result);die;
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result['tiers'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    public  function get_object_linked_order($id){
        

        $url = LINK_WS_GET_OBJECT_LINK_COMMANDE;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'id'=>$id);
        $result = $client->call("getElementelement",$parameters);
        
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            return $result;
        }
        

         else {
              
            return $notError;

        }


    }
    
    public  function creat_credit($credit){
        

        $url = LINK_WS_CREAT_CREDIT;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'creditccgcredit'=>$credit);
        $result = $client->call("createCreditccgcredit",$parameters);
        
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result;
        }
        

         else {
              
            return $notError;

        }


    }
    /**
     * Cette methode permet de céer le bordoreau d'expedition et le bon de livraison
     * @param type $bon_livraison
     * @return type
     */
    public  function creat_bond_livraison($bon_livraison){
        

        $url = LINK_WS_CREAT_BOND_LIVRAISON;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'expedition'=>$bon_livraison);
        $result = $client->call("createExpedition",$parameters);
        //print"<pre>";print_r($result);print"<pre>";die;
        //print_r($client);die;
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result;
        }
        

         else {
              
            return $notError;

        }


    }
    public  function get_expedition($id){
        

        $url = LINK_WS_CREAT_BOND_LIVRAISON;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'id'=>$id);
        $result = $client->call("getExpedition",$parameters);
        //print"<pre>";print_r($result);print"<pre>";die;
        //print_r($client);die;
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result['expedition'];
        }
        

         else {
              
            return $notError;

        }


    }
    /**
     * Cettte permet de recupérer un bon de livraison via son id ou ref.
     * @param type $id identifiant du bon de livraison
     * @param type $ref référence du bon de livraiso
     * @return type
     */
    public  function get_bond_livraison($id,$ref=''){
        

        $url = LINK_WS_GET_BOND_LIVRAISON;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'id'=>$id,'ref'=> $ref);
        $result = $client->call("getLivraison",$parameters);
        //print"<pre>";print_r($result);print"<pre>";die;
        //print_r($client);die;
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result['livraison'];
        }
        

         else {
              
            return $notError;

        }


    }
    public  function get_liste_bonds_fournisseur($idUser){
        

        $url = LINK_WS_GET_BOND_LIVRAISON;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

         //récupération de l'id du user
        //$user = $this->getIdUser($login);

        $parameters = array('authentication'=> $this->authentication,'id'=> $idUser);
        $result = $client->call("getLivraisonForSupplier",$parameters);
        //print"<pre>";print_r($result);print"<pre>";die;
        //print_r($client);die;
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result['livraisons'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    public  function get_liste_bonds_fournisseur_zone($id_zone){
        

        $url = LINK_WS_GET_BOND_LIVRAISON;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

         //récupération de l'id du user
        //$user = $this->getIdUser($login);

        $parameters = array('authentication'=> $this->authentication,'zone'=> $id_zone);
        $result = $client->call("getLivraisonForSupplierZone",$parameters);
        //print"<pre>";print_r($result);print"<pre>";die;
        //print_r($client);die;
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result['livraisons'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    /**
     * Cette méthode permet d'enregistrer un paiement.
     * @param array $paiement
     * @return int identifiant du paiement crée  id < 0 if ok, id <0 if not ok
     */
    public  function creat_paiement($paiement,$idTiers){
        

        $url = LINK_WS_CREAT_PAIEMENT;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'paiement'=>$paiement,'idTiers'=>$idTiers);
        $result = $client->call("createPaiement",$parameters);
      
        //print_r($result);die;
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result['id'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    
    /**
     * Cette méthode permet d'enregistrer un paiement d'une facture fournisseur.
     * @param array $paiement
     * @return int identifiant du paiement crée  id < 0 if ok, id <0 if not ok
     */
    public  function creat_paiement_fournisseur($paiement,$idTiers){
        

        $url = LINK_WS_CREAT_PAIEMENT_FOURNISSEUR;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'paiement'=>$paiement,'idTiers'=>$idTiers);
        $result = $client->call("createPaiementSupplier",$parameters);
      
        //print_r($result);die;
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result['id'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    public  function creat_commande($commande,$type){
        

        $url = LINK_WS_GET_COMMANDES;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'order'=>$commande,'type'=>$type);
        $result = $client->call("createOrder",$parameters);
       // print_r($client);die;
//        print_r($result);die;
        
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result['id'];
        }
        

         else {
              
            return $notError;

        }


    }
    public  function get_paiements ($idFacture){
        

        $url = LINK_WS_CREAT_PAIEMENT;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'id'=>$idFacture);
        $result = $client->call("getPaiement",$parameters);
    
       
       
        
        
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result['paiements'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    
    public  function get_paiements_fournisseur ($idFacture){
        

        $url = LINK_WS_CREAT_PAIEMENT_FOURNISSEUR;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'id'=>$idFacture);
        $result = $client->call("getPaiementSupplier",$parameters);
    
       
        //print_r($client);
        
        
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            
            return $result['paiements'];
        }
        

         else {
              
            return $notError;

        }


    }
   
    public  function creat_demande($demande){
        

        $url = LINK_WS_CREAT_DEMANDE;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

      

        $parameters = array('authentication'=> $this->authentication,'demandeccgdemande'=>$demande);
        $result = $client->call("createDemandeccgdemande",$parameters);
        
       
        $notError = $this->verify_result($result);
        
        if($notError > -1){
           
           
            return $result;
        }
        

         else {
              
            return $notError;

        }


    }
    
    /**
     * Cette permet de vérifier si l'utilisateur existe.
     * @param type $login
     * @param type $passeword
     * @return type
     */
    public  function connecter_user(){
        

        $url = LINK_WS_ZONE;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

       

        $parameters = array('authentication'=>$this->authentication,'zone'=>  $this->zone);
        $result = $client->call("connexionCommercial",$parameters);
        //print_r($result);die;
        $notError = $this->verify_result($result);
       // print_r($notError);die;
        
              
            return $notError;



    }
    
    /**
     * Permet de recupérer la liste des zones 
     * @return type
     */
    public  function getZone(){
        

        $url = LINK_WS_ZONE;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

       

        $parameters = array('authentication'=>$this->authentication,'id'=>  $this->zone);
        $result = $client->call("getZoneccg",$parameters);
        //print_r($result);die;
        $notError = $this->verify_result($result);
       // print_r($notError);die;
        if($notError > -1){
           
            return $result['zoneccg'];
        }
        

         else {
              
            return $notError;

        }

    }
    
    public  function inscrire_tiers($societe, $extratfield, $photo){
        
        //echo "Revenez plus tard svp. :o) !!!!!!!!!!!!!!!!!!!";die;
        $url = LINK_WS_SOCIETE;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

       

        $parameters = array('authentication'=>$this->authentication,'societe'=>$societe,'extrafield'=>$extratfield,'photo'=>$photo);
        $result = $client->call("createSociete",$parameters);
        //print_r($result);die;
        $notError = $this->verify_result($result);
       // print_r($notError);die;
        if($notError > -1){
           
            return $result['ref'];
        }
        

         else {
              
            return $notError;

        }

    }
    
    
    public  function update_tiers($societe, $extratfield, $photo = ''){
        
        //echo "Revenez plus tard svp. :o) !!!!!!!!!!!!!!!!!!!";die;
        $url = LINK_WS_SOCIETE;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

       

        $parameters = array('authentication'=>$this->authentication,'societe'=>$societe,'extrafield'=>$extratfield,'photo'=>$photo);
        $result = $client->call("updateSociete",$parameters);
        //print_r($client);die;
        $notError = $this->verify_result($result);
       // print_r($notError);die;
        if($notError > -1){
           
            return $result['ref'];
        }
        

         else {
              
            return $notError;

        }

    }
    /**
     * Permet de creer un projet d'investisement
     * @param array $projet
     * @param file $documents
     * @return type
     */
    public  function createProjet($projet, $documents){
        
        //echo "Revenez plus tard svp. :o) !!!!!!!!!!!!!!!!!!!";die;
        $url = LINK_WS_PROJET;
        $client = new nusoap_client($url); 
        
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

       

        $parameters = array('authentication'=>$this->authentication,'projetccg'=>$projet,'document'=>$documents);
        $result = $client->call("createProjetccg",$parameters);
        //Sprint_r($result);die;
       
        $notError = $this->verify_result($result);
      // print_r($result);die;
        if($notError > -1){
           
            return $result['id'];
        }
        

         else {
              
            return $notError;

        }

    }
    
    
    public  function updateProjet($projet, $documents){
        
        //echo "Revenez plus tard svp. :o) !!!!!!!!!!!!!!!!!!!";die;
        $url = LINK_WS_PROJET;
        $client = new nusoap_client($url); 
        
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

       

        $parameters = array('authentication'=>$this->authentication,'projetccg'=>$projet,'document'=>$documents);
        $result = $client->call("updateProjetccg",$parameters);
        //Sprint_r($result);die;
       
        $notError = $this->verify_result($result);
      // print_r($result);die;
        if($notError > -1){
           
            return $result['id'];
        }
        

         else {
              
            return $notError;

        }

    }
    
    public  function getProjet($idProjet){
        
        $url = LINK_WS_PROJET;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

       

        $parameters = array('authentication'=>$this->authentication,'id'=>$idProjet);
        $result = $client->call("getProjetccg",$parameters);
       // print_r($client);die;
//        print "<pre>";
//        print_r($result);die;
//        print "</pre>";
        $notError = $this->verify_result($result);
       // print_r($notError);die;
        if($notError > -1){
           
            return $result['projetccg'];
        }
        

         else {
              
            return $notError;

        }

    }
    
    
    public  function get_liste_projet_tiers($idTiers=''){
        
        $url = LINK_WS_PROJET;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

       

        $parameters = array('authentication'=>$this->authentication,'id'=>$idTiers,'zone'=>  $this->getteurZone());
        $result = $client->call("getProjetccgForTiers",$parameters);
       
        $notError = $this->verify_result($result);
       // print_r($notError);die;
        if($notError > -1){
           
            return $result['projetccgs'];
        }
        

         else {
              
            return $notError;

        }

    }
    
    
    public  function createGarantieccg($garantie,$membres,$corporation,$institutionnel, $documents){
        

        $url = LINK_WS_GET_GARANTIE;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

       

        $parameters = array(
                            'authentication'=>$this->authentication,
                            'garantieccg'=>$garantie,
                            'membres'=>$membres,
                            'corporation'=>$corporation,
                            'institutionnel'=>$institutionnel,
                            'documents'=>$documents,
                          );
        $result = $client->call("createGarantieccg",$parameters);
       //print_r($client);die;
        $notError = $this->verify_result($result);
       // print_r($notError);die;
        if($notError > -1){
           
            return $result['id'];
        }
        

         else {
              
            return $notError;

        }

    }
    
    
    public  function updateGarantieccg($garantie, $membres, $old_membres, $corporation, $institutionnel){
        

        $url = LINK_WS_GET_GARANTIE;
        $client = new nusoap_client($url); 
        $data = array();
        if($client){

            $client->soap_defencoding = "UTF-8";
        }

       

        $parameters = array(
                            'authentication'=>$this->authentication,
                            'garantieccg'=>$garantie,
                            'membres'=>$membres,
                            'old_membres'=>$old_membres,
                            'corporation'=>$corporation,
                            'institutionnel'=>$institutionnel,
                          );
        $result = $client->call("updateGarantieccg",$parameters);
       //print_r($client);die;
        $notError = $this->verify_result($result);
       // print_r($notError);die;
        if($notError > -1){
           
            return $result['id'];
        }
        

         else {
              
            return $notError;

        }

    }
    
    /**
     * Cette méthode permet de recupérer une facture d'un tiers.
     * Elle reçoit comme paramétre l'identifiant du tiers.
     * @param type $id   id tiers
     * @return type      if ok array(), if not ok -1
     */
     public  function get_facture_by_id_tiers($id){
        

        $url = LINK_WS_GET_FACTURE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   

        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'idthirdparty'=>$id);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getInvoicesForThirdParty",$parameters,$ns,'');
        
         $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            return $result['invoices'];
        }
        

         else {
              
            return $notError;

        }
//        if (! $result || $result['invoices'] == NULL)
//        {
//            return -1;
//        }
//
//         else {
//             
//            return $result['invoices'];
//
//
//        }

    }
    
        /**
     * Cette méthode permet de recupérer une facture 
     * Elle reçoit comme paramétre la référence de la facture.
     * @param type $ref   ref facture
     * @return type      if ok array(), if not ok -1
     */
     public  function get_facture_by_ref($ref){
        

        $url = LINK_WS_GET_FACTURE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
  

        $parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $result = $client->call("getInvoice",$parameters,$ns,'');
        //print_r($client);die;
        $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['invoice'];
        }
        

         else {
              
            return $notError;

        }
//        if (! $result || $result['invoice'] == NULL)
//        {
//            return -1;
//        }
//
//         else {
//             
//            return $result['invoice'];
//
//
//        }

    }
     
    public  function get_facture_fournisseur_for_fournisseur_by_ref($ref){
        

        $url = LINK_WS_GET_FACTURE_FOURNISSEUR_SERP;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
  

        $parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $result = $client->call("getInvoiceSupplier",$parameters,$ns,'');
        //print_r($client);die;
        $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['invoice'];
        }
        

         else {
              
            return $notError;

        }
//        if (! $result || $result['invoice'] == NULL)
//        {
//            return -1;
//        }
//
//         else {
//             
//            return $result['invoice'];
//
//
//        }

    }
    
    /**
     * Cette méthode permet de créer une facture.
     * @param array $facture information de la facture
     * @return int id facture id > 0 if ok, id < 0 if not ok
     */
     public  function create_facture($facture){
        

        $url = LINK_WS_GET_FACTURE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
  

        $parameters = array('authentication'=>$this->authentication,'invoice'=>$facture);
        $result = $client->call("createInvoice",$parameters,$ns,'');
        
        
        $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result;
        }
        

         else {
              
            return $notError;

        }
    }
     
    public  function classer_facture($idFacture){
        

        $url = LINK_WS_GET_FACTURE_FOURNISSEUR_SERP;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
  

        $parameters = array('authentication'=>$this->authentication,'idFacture'=>$idFacture);
        $result = $client->call("closeInvoice",$parameters,$ns,'');
        
        //print_r($result);die;
        $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result;
        }
        

         else {
              
            return $notError;

        }
    }
    
    
    public  function classer_facture_fournisseur($idFacture){
        

        $url = LINK_WS_GET_FACTURE_FOURNISSEUR_SERP;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
  

        $parameters = array('authentication'=>$this->authentication,'idFacture'=>$idFacture);
        $result = $client->call("closeInvoiceSupplier",$parameters,$ns,'');
        
        print_r($result);die;
        $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result;
        }
        

         else {
              
            return $notError;

        }
    }
    
    /**
     * Cette méthode permet de recupérer une facture fournisseur d'un tiers.
     * Elle reçoit comme paramétre l'identifiant du tiers (fournisseur).
     * @param type $id   id tiers
     * @return type      if ok array(), if not ok -1
     */
     public  function get_facture_fournisseur_by_id_tiers($id){
        

        $url = LINK_WS_GET_FACTURE_FOURNISSEUR;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     

        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'idthirdparty'=>$id);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getSupplierInvoicesForThirdParty",$parameters,$ns,'');
        
           $notError = $this->verify_result($result);
        
        if($notError > -1){
           
            return $result['invoices'];
        }
        

         else {
              
            return $notError;

        }
//        if (! $result || $result['invoices'] == NULL)
//        {
//            return -1;
//        }
//
//         else {
//
//            return $result['invoices'];
//
//
//        }

    }
    
         public  function get_facture_fournisseur_by_ref($ref){
        

        $url = LINK_WS_GET_FACTURE_FOURNISSEUR;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     

        $parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        //parameters = array('authentication'=>$this->authentication,'ref'=>$ref);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getSupplierInvoice",$parameters,$ns,'');
        
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['invoice'];
        }
        

         else {
              
            return $notError;

        }


    }

         public  function get_plafond_by_id_tiers($idTiers){
        

        $url = LINK_WS_GET_PLAFOND;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     

        $parameters = array('authentication'=>$this->authentication,'id'=>$idTiers);
        //parameters = array('authentication'=>$this->authentication,'ref'=>$ref);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getSocieteextrafields",$parameters,$ns,'');
        
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['societeextrafields']['plafond'];
        }
        

         else {
              
            return $notError;

        }


    }
         /**
          * Cette méthode permet de recupérer les factures des clients d'un fournisseur.
          * @param type $id identifiant du fournisseur.
          * @return type
          */
         public  function get_factures_fournisseur_by_id($id){
        

        $url = LINK_WS_GET_FACTURE_FOURNISSEUR_SERP;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     

        $parameters = array('authentication'=>$this->authentication,'idFour'=>$id,'idTiers'=>'');
        //parameters = array('authentication'=>$this->authentication,'ref'=>$ref);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getInvoicesForThirdParty",$parameters,$ns,'');
        //print_r($result); die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['invoices'];
        }
        

         else {
              
            return $notError;

        }


    }
         public  function get_factures_tiers_for_fournisseur($idFour, $idTiers){
        

        $url = LINK_WS_GET_FACTURE_FOURNISSEUR_SERP;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     

        $parameters = array('authentication'=>$this->authentication,'idFour'=>$idFour,'idTiers'=>$idTiers);
        //parameters = array('authentication'=>$this->authentication,'ref'=>$ref);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getInvoicesForThirdParty",$parameters,$ns,'');
        
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['invoices'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    
         public  function getFacturesZone($idTiers,$type){
        

        $url = LINK_WS_FACTURE_ZONE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     

        $parameters = array('authentication'=>$this->authentication,'fk_soc'=>$idTiers,'type'=>$type);
        $result = $client->call("getInvoices",$parameters,$ns,'');
        //print_r($client);
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['invoices'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    
         public  function getAllInvoicesTiersZone($zone){
        

        $url = LINK_WS_FACTURE_ZONE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     

        $parameters = array('authentication'=>$this->authentication,'zone'=>$zone);
        $result = $client->call("getAllInvoicesTiersZone",$parameters,$ns,'');
        //print_r($client);
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['invoices'];
        }
        

         else {
              
            return $notError;

        }


    }
         public  function getAllInvoicesFournZone($zone){
        

        $url = LINK_WS_FACTURE_ZONE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     

        $parameters = array('authentication'=>$this->authentication,'zone'=>$zone);
        $result = $client->call("getAllInvoicesFournZone",$parameters,$ns,'');
        //print_r($client);die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['invoices'];
        }
        

         else {
              
            return $notError;

        }


    }
        
    public  function create_facture_from_commande($commande, $facture){
        

        $url = LINK_WS_GET_FACTURE_FOURNISSEUR_SERP;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     

        $parameters = array('authentication'=>$this->authentication,'commande'=>$commande,'facture'=>$facture);
        //parameters = array('authentication'=>$this->authentication,'ref'=>$ref);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("createInvoiceFormOrder",$parameters,$ns,'');
        //print_r($result);die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result;
        }
        

         else {
              
            return $notError;

        }


    }
    
    /**
     * Cette méthode permet de recupérer le dossier de garantie d'un tiers.
     * @param  $id id tiers
     * @return array() if ok, -1 if not ok
     */
    public   function get_garantie_by_id_tiers($id) {
        
        $url = LINK_WS_GET_GARANTIE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   

        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'id'=>$id);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getGarantieccg",$parameters,$ns,'');
       // print_r($client);die;
        $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['garantieccg'];
        }
        

         else {
              
            return $notError;

        }
        
        
    }
    
    public   function get_recu_by_id_tiers($id) {
        
        $url = LINK_WS_RECU_ADHESION;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   

        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'id'=>$id);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getRecuadhesionccg",$parameters,$ns,'');
        //print_r($result);die;
        $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['recu'];
        }
        

         else {
              
            return $notError;

        }
        
        
    }
    
    
    public   function create_recu_adhesion($adhesion) {
        
        $url = LINK_WS_RECU_ADHESION;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   

        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'recuadhesionccg'=>$adhesion);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("createRecuadhesionccg",$parameters,$ns,'');
        //print_r($client);die;
        $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['id'];
        }
        

         else {
              
            return $notError;

        }
        
        
    }
    
    public  function get_compte_de_famille($id) {
        $url = LINK_WS_GET_GARANTIE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   
        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'id'=>$id);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getCompteDeFamille",$parameters,$ns,'');
       //print_r($result);die;
        if (! $result || $result['listefamilleccg'] == NULL)
        {
        
            return -1;
        }

         else {

            return $result['listefamilleccg'];


        }

    }
    
    /**
     * Cette methode permet de recupérer un document.
     * @param type $name
     */
    public  function get_document($file_name) {
        
        $url = LINK_WS_GET_DOCUMENT;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
 
        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'string'=>'garantieccg','file'=>$file_name);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getDocument",$parameters,$ns,'');
        

        if($result['document']['content'] != NULL){
           
             $pdf_decode = base64_decode($result['document']['content']);

        return 1;
        }
        else{
            return -1;
        }
       
        

    }
    public  function get_image($idTiers) {
        
        $url = LINK_WS_GET_GARANTIE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
 
        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'idTiers'=>$idTiers);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getImage",$parameters,$ns,'');
        
//             print_r($result);die;
//        print "<pre>";
//        print_r($client->error_str);
//        print_r($result);
//        print "</pre>";die;
        if($result['image']['content'] != NULL){
           
             $image_decode = base64_decode($result['image']['content']);
             //header('Content-type: applicaton/pdf');
            //header('Content-Disposition: attachment; filename = '.$result['image']['filename']);
        
        //$tmpName = tempnam(sys_get_temp_dir(), $result['image']['filename']);
        // Ouvre un fichier pour lire un contenu existant
        //$current = file_get_contents($image);
        // Écrit le résultat dans le fichier
        $file = "img/logo.png";
        file_put_contents($file, $image_decode);
           
        return $file;
        }
        else{
            return -1;
        }
       
        

    }
    
    /**
     * Cette méthode permet de télécharger un document.
     * Elle reçoit en paramétre le nom du document.
     * @param nom du document $name
     * @param nom du module   $module_name
     * @return type
     */
    public  function get_document_download($name,$module_name) {
        
        $url = LINK_WS_GET_DOCUMENT;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';

        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'string'=>$module_name,'file'=>$name);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getDocument",$parameters,$ns,'');
        if($result['document']['content'] != NULL){
           
             $pdf_decode = base64_decode($result['document']['content']);

        //header('Content-type: applicaton/pdf');
        header('Content-Disposition: attachment; filename = '.$result['document']['filename']);
        
        $tmpName = tempnam(sys_get_temp_dir(), 'data');
        $file = fopen($tmpName, 'w');
        fwrite($file, $pdf_decode);
        ob_clean();
        flush();
        readfile($tmpName);
        }
        else{
            return -1;
        }
       
        

    }
    
    /**
     * Cette méthode permet de vérifier le résultat retouné par un webservice.
     * @param array() $result résultat retourné par le webservice
     * @return int 1 if ok, -1 if NOT_FOUND, -2 if NULL, -3 if BAD_CREDENTIALS 
     */
    private  function verify_result($result) {
        
        if ($result['result']['result_code'] == 'NOT_FOUND')
        {
            return -1;
        }
         elseif (! $result || $result['result']['result_code'] == NULL)
        {
            return -2;
        }
         elseif (! $result || $result['result']['result_code'] == 'PERMISSION_DENIED')
        {
            return -4;
        }
        elseif( $result['result']['result_code'] == 'BAD_CREDENTIALS') 
            {
                return -3;
            }
        elseif( $result['result']['result_code'] == 'BAD_VALUE_FOR_SECURITY_KEY') 
            {
                return -5;
            }
        elseif( $result['result']['result_code'] == 'BAD_PARAMETERS') 
            {
                return -6;
            }
        elseif( $result['result']['result_label'] == 'ErrorDuplicateField') 
            {
                return -7;
            }
        
        else{
            return 1;
        }
    }
    
    /**
     * Cette recupére l'identifiant d'un tiers.
     * Elle reçoit en paramétre le code du tiers.
     * @param string $code code du tiers recherché
     * @return int l'identifiant du tiers
     */
    public  function get_tiers_by_code($code) {
        
        $url = LINK_WS_GET_GARANTIE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   

        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'code'=>$code,'zone'=>$this->getteurZone());
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getTiers",$parameters,$ns,'');
        //print_r($result);die;
        $notError = $this->verify_result($result);
        
        
        if($notError > -1){
            
           
            return $result['id'];
            
        }
        else{
            return $notError;
        }
    }
    
    
    public  function get_fournisseur_by_code($code) {
        
        $url = LINK_WS_GET_GARANTIE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   

        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'code'=>$code,'zone'=>$this->getteurZone());
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getFournisseur",$parameters,$ns,'');
        //print_r($result);die;
        $notError = $this->verify_result($result);
        
        
        if($notError > -1){
            
           
            return $result['id'];
            
        }
        else{
            return $notError;
        }
    }
    
    public  function getIdUser($login) {
        
        $url = LINK_WS_GET_GARANTIE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   

        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'login'=>$login);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("getIdUser",$parameters,$ns,'');
       
        $notError = $this->verify_result($result);
        
        
        if($notError > -1){
            
           
            return $result['user'];
            
        }
        else{
            return $notError;
        }
    }
    public  function valider_commande($code,$idCommande,$type){
        
        $url = LINK_WS_GET_CONFIRMATION;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   
        $validator = array(
                            'code'              =>$code,
                            'id_commande'       =>$idCommande,
                            'type'              =>$type,
                
        );
        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'validator'=>$validator);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("setValidatore",$parameters,$ns,'');
        //print_r($result);die;
        $notError = $this->verify_result($result);
        
        
        if($notError > -1){
            
           
            return $result['ref'];
            
        }
        else{
            return $notError;
        }
    }
    
    
    public  function valider_commande_fournisseur($idCommande){
        
        $url = LINK_WS_GET_COMMANDES;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   
       
        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'id'=>$idCommande);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("validOrderSupplier",$parameters,$ns,'');
        //print_r($client);die;
        $notError = $this->verify_result($result);
        
        
        if($notError > -1){
            
           
            return $result['id'];
            
        }
        else{
            return $notError;
        }
    }
    
    
    public  function accepter_commande_fournisseur($idCommande,$dateEcheance){
        
        $url = LINK_WS_GET_COMMANDES;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   
       
        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'id'=>$idCommande,'date'=>$dateEcheance);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("acceptOrderSupplier",$parameters,$ns,'');
        //print_r($client);die;
        $notError = $this->verify_result($result);
        
        
        if($notError > -1){
            
           
            return $result['ref'];
            
        }
        else{
            return $notError;
        }
    }
    
    public  function refuser_commande_fournisseur($idCommande){
        
        $url = LINK_WS_GET_COMMANDES;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   
       
        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'id'=>$idCommande);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("refuseOrderSupplier",$parameters,$ns,'');
       // print_r($client);die;
        $notError = $this->verify_result($result);
        
        
        if($notError > -1){
            
           
            return $result['ref'];
            
        }
        else{
            return $notError;
        }
    }
    
    public  function reception_commande_fournisseur($livraison){
        
        $url = LINK_WS_GET_COMMANDES;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   
       
        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'livraison'=>$livraison);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("deliveryOrderSupplier",$parameters,$ns,'');
       // print_r($client);die;
        $notError = $this->verify_result($result);
        
        
        if($notError > -1){
            
           
            return $result['ref'];
            
        }
        else{
            return $notError;
        }
    }
    public  function valider_facture($code,$idFacture){
        
        $url = LINK_WS_GET_CONFIRMATION_FACTURE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   
        $validator = array(
                            'code'              =>$code,
                            'id_facture'       =>$idFacture,
                
        );
        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'validator'=>$validator);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("setValidator",$parameters,$ns,'');
        
        $notError = $this->verify_result($result);
        
        
        if($notError > -1){
            
           
            return $result['ref'];
            
        }
        else{
            return $notError;
        }
    }
    public  function valider_bond($validator){
        
        $url = LINK_WS_CONFIRM_BOND_LIVRAISON;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   
        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'validator'=>$validator);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("setValidator",$parameters,$ns,'');
        //print_r($result);die;
        $notError = $this->verify_result($result);
        
        
        if($notError > -1){
            
           
            return $result['id'];
            
        }
        else{
            return $notError;
        }
    }
  
    
    public  function create_echeance($echeance) {
        
        $url = LINK_WS_CREAT_ECHEANCE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
   

        //$parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$ref);
        $parameters = array('authentication'=>$this->authentication,'creditccgecheance'=>$echeance);
        //$result = $client->call("getInvoice",$parameters,$ns,'');
        $result = $client->call("createCreditccgecheance",$parameters,$ns,'');
       
        $notError = $this->verify_result($result);
        
        
        if($notError > -1){
            
           
            return $result['id'];
            
        }
        else{
            return $notError;
        }
    }
    
    /**
     * 
     * @param type $idTiers
     * @return type
     */
    
    public  function get_commandes_tiers( $idTiers,$idUser){
        

        $url = LINK_WS_GET_COMMANDES;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     
        
        $parameters = array(
                        'authentication'=>$this->authentication,
                        'idthirdparty'=>  $this->get_tiers_by_code($idTiers),
                        'idSupplier'  => $idUser,
                     );
     
        $result = $client->call("getOrdersForThirdParty",$parameters,$ns,'');
        
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['orders'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    
    public  function get_commandes_tiers_zone( $idTiers ){
        

        $url = LINK_WS_GET_COMMANDE_ZONE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     
        
        $parameters = array(
                        'authentication'=>$this->authentication,
                        'idthirdparty'=>  $idTiers,
                     );
     
        $result = $client->call("getOrders",$parameters,$ns,'');
       // print_r($client);die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['orders'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    public  function get_commandes_tiers_zone_fournisseur( $idFournisseur ){
        

        $url = LINK_WS_GET_COMMANDE_ZONE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     
        
        $parameters = array(
                        'authentication'=>$this->authentication,
                        'idFourn'=>  $idFournisseur,
                     );
     
        $result = $client->call("getOrdersClientForSupplier",$parameters,$ns,'');
       // print_r($client);die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['orders'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    
    public  function get_commandes_fournisseurs_zone_fournisseur( $idFournisseur ){
        

        $url = LINK_WS_GET_COMMANDE_ZONE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     
        
        $parameters = array(
                        'authentication'=>$this->authentication,
                        'idFourn'=>  $idFournisseur,
                     );
     
        $result = $client->call("getOrdersSupplierForSupplier",$parameters,$ns,'');
       // print_r($client);die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['orders'];
        }
        

         else {
              
            return $notError;

        }


    }
    /**
     * Cette permet de récuper un commaande par son identifiant
     * @param type $id identifiant de la commande 
     * @return array()  données de lsa commande
     */
    public  function get_commande_dol( $id){
        

        $url = LINK_WS_GET_COMMANDE_DOL;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     
        
        $parameters = array('authentication'=>$this->authentication,'id'=>$id);
     
        $result = $client->call("getOrder",$parameters,$ns,'');
        
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['order'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    
    public  function get_commandes_all_customer($idUser){
        

        $url = LINK_WS_GET_COMMANDES;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
        
         //récupération de l'id du user
        //$user = $this->getIdUser($login);
        
        //$parameters = array('authentication'=>$this->authentication,'idthirdparty'=> $user['id']);
        
         $parameters = array(
                        'authentication'=>$this->authentication,
                        'idthirdparty'=>  '',
                        'idSupplier'  => $idUser,
                     );
        $result = $client->call("getOrdersForThirdParty",$parameters,$ns,'');
        //print_r($result);die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['orders'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    
    public  function get_commandes_all_customer_zone($id_zone){
        

        $url = LINK_WS_GET_COMMANDES;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
        
         $parameters = array(
                        'authentication'=>$this->authentication,
                        'zone'  => $id_zone,
                     );
        $result = $client->call("getOrdersForThirdPartyZone",$parameters,$ns,'');
        //print_r($result);die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['orders'];
        }
        

         else {
              
            return $notError;

        }


    }
    public  function get_commandes_all_supplier($login){
        

        $url = LINK_WS_GET_COMMANDES;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
        //récupération de l'id de user
        $user = $this->getIdUser($login);
        
        $parameters = array('authentication'=>$this->authentication,'idthirdparty'=> $user['id']);
     
        $result = $client->call("getOrdersForSupplier",$parameters,$ns,'');
//         print_r($client);die;
//         print_r($result);die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['orders'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    
    public  function get_commandes_all_supplier_zone($id_zone){
        

        $url = LINK_WS_GET_COMMANDES;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
        //récupération de l'id de user
        
        
        $parameters = array('authentication'=>$this->authentication,'zone'=> $id_zone);
     
        $result = $client->call("getOrdersForSupplierZone",$parameters,$ns,'');
//         print_r($client);die;
//         print_r($result);die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['orders'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    public  function get_liste_fournisseur($id= ""){
        

        $url = LINK_WS_GET_GARANTIE;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     
        
        $parameters = array('authentication'=>$this->authentication,'id'=> $id);
     
        $result = $client->call("getSupplier",$parameters,$ns,'');
      
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['suppliers'];
        }
        

         else {
              
            return $notError;

        }


    }
    
    /**
     * Retourne les informations d'une commande à partir de sa référence
     * @param type $idCommande
     * @return type
     */
    public  function get_commande_by_ref($refCommande,$type){
        
         $url = LINK_WS_GET_COMMANDES;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     

        $parameters = array('authentication'=>$this->authentication,'id'=>'','ref'=>$refCommande,'ref_ext'=>'','type'=>$type);
        
        $result = $client->call("getOrder",$parameters,$ns,'');
        //print"<pre>";print_r($result);print"<pre>";die;
        //print_r($client);die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['order'];
        }
        

         else {
              
            return $notError;

        }

    }
    
    /**
     * Cette methode permet de récupérer les commandes fournisseurs adressés 
     * au fournisseur connecté.
     * @param type $idFournisseur l'identifiant client du fournisseur
     * @return if OK array() tableau contenant les commandes, if NOT OK int < 0 
     */
    public  function getOrderSupplierFromSupplier($idFournisseur){
        
         $url = LINK_WS_GET_COMMANDES;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     
        
        $parameters = array('authentication'=>$this->authentication,'id'=>$idFournisseur);
        
        $result = $client->call("getOrderSupplierFromSupplier",$parameters,$ns,'');
        //print"<pre>";print_r($result);print"<pre>";die;
        //print_r($client);die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['orders'];
        }
        

         else {
              
            return $notError;

        }

    }
    
    /**
     * Recupére la liste des SMS CCG
     * @param int $zone identifiant de la zone
     * @return array
     */
    public  function get_liste_sms(){
        
         $url = LINK_WS_SMS;
        $client = new nusoap_client($url); 
        if($client){

            $client->soap_defencoding = "UTF-8";
        }
        $ns='http://www.dolibarr.org/ns/';
     
        
        $parameters = array('authentication'=>$this->authentication,'zone'=>  $this->getteurZone());
        
        $result = $client->call("getSmsZone",$parameters,$ns,'');
        //print"<pre>";print_r($result);print"<pre>";die;
        //print_r($client);die;
         $notError = $this->verify_result($result);
        if($notError > -1){
           
            return $result['listeSMS'];
        }
        

         else {
              
            return $notError;

        }

    }
}
