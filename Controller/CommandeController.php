<?php


class CommandeController extends Controller {

    public function ajoutAction($postData){
        $action = $postData['action'];
        $response = $this->$action($postData);

        return $this->traiterResponse($response);
    }

    public function listeAction(){
        $con = parent::connexionBD();
        $query = $con->query("SELECT c.id,c.datedelivraison,cli.nom, cli.telephone FROM commande c, client cli WHERE c.client_id = cli.id");
        $query->setFetchMode(PDO::FETCH_OBJ);
        $result = $query->fetchAll();

        return $result;
    }

    private function ajoutCommande($data){
        $con = parent::connexionBD();
        $query = $con->prepare("INSERT INTO commande(datedelivraison, modedelivraison, modedepaiement, client_id) VALUES(:datedelivraison, :modedelivraison, :modedepaiement, :client_id)");

        $error = $query->execute(array(
            ':datedelivraison'=>$data['date_livraison'],
            ':modedelivraison'=>$data['delai'],
            ':modedepaiement'=>$data['mode_reglement'],
            ':client_id'=>$data['client'],
        ));

        $idCommande = $con->lastInsertId();
        for($i=0; $i < $data['numProd']; $i++){
            $query = $con->prepare("INSERT INTO mouvement(produit_id, commande_id, qte, type) VALUES(:produit_id, :commande_id, :qte, :type)");
            $error = $query->execute(array(
                ':produit_id'=>$data['libelle_'.$i],
                ':commande_id'=>$idCommande,
                ':qte'=>$data['qte_'.$i],
                ':type'=>$data['type'],
            ));

            if($error){
                $this->updateProduitQte($data['libelle_'.$i], $data['qte_'.$i], $data['type']);
            }
        }
        parent::deconnexionBD();
        return $error;
    }

    public function removeAction($id){
        $con = parent::connexionBD();

        $query = $con->prepare("DELETE FROM produit WHERE id = :id");

        $error = $query->execute(array(
            ':id'=>$id,
        ));

        parent::connexionBD();
        return $this->traiterResponse($error);
    }

    public function getAction($id){
        $con = parent::connexionBD();
        $query = $con->query("SELECT * FROM produit WHERE id = ".$id);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $result = $query->fetch();

        return $result;
    }

    public function modifyProduit($data){
        $con = parent::connexionBD();
        $query = $con->prepare("UPDATE produit SET libelle = :libelle , description = :description, qteStock = :qteStock WHERE id = :id");

        $error = $query->execute(array(
            ':libelle'=>$data['libelle'],
            ':description'=>$data['description'],
            ':qteStock'=>$data['qte'],
            ':id'=>$data['id'],
        ));

        parent::deconnexionBD();
        return $this->traiterResponse($error);
    }

    private function traiterResponse($error){
        $redirect = "index.php?page=";
        switch($error){
            case intval($error) === 1:
                $redirect = "index.php?page=liste-commande";
                break;
            default:
                $redirect = "index.php?page=error";
        }

        return $redirect;
    }

    private function updateProduitQte($id, $qte, $type){
        $con = parent::connexionBD();
        $query = $con->prepare("UPDATE produit SET qtestock = qtestock + :qte WHERE id = :id");
        $error = $query->execute(array(
            ':qte' => ($type == 1)? $qte * -1: $qte * 1,
            ':id' => $id,
        ));

        parent::deconnexionBD();

        return $this->traiterResponse($error);
    }
}