<?php


include_once 'Controller.php';

class ProduitController extends Controller {

    public function ajoutAction($postData){
        $action = $postData['action'];
        $response = $this->$action($postData);

        return $this->traiterResponse($response);
    }

    public function listeAction(){
        $con = parent::connexionBD();
        $query = $con->query("SELECT * FROM produit");
        $query->setFetchMode(PDO::FETCH_OBJ);
        $result = $query->fetchAll();

        return $result;
    }

    private function ajoutProduit($data){
        $con = parent::connexionBD();
        $query = $con->prepare("INSERT INTO produit(libelle, description, qteStock) VALUES(:libelle, :description, :qteStock)");

        $error = $query->execute(array(
            ':libelle'=>$data['libelle'],
            ':description'=>$data['description'],
            ':qteStock'=>0,
        ));

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
                $redirect = "index.php?page=liste-produit";
                break;
            default:
                $redirect = "index.php?page=error";
        }

        return $redirect;
    }
}