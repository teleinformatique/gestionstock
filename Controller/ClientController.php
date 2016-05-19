<?php


class ClientController extends Controller {
    public function ajoutAction($postData){
        $action = $postData['action'];
        $response = $this->$action($postData);

        return $this->traiterResponse($response,$postData['type']);
    }

    public function listeAction($type = 1){
        $con = parent::connexionBD();
        $query = $con->query("SELECT * FROM client WHERE type = ".$type);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $result = $query->fetchAll();

        return $result;
    }

    private function ajoutClient($data){
        $con = parent::connexionBD();
        $query = $con->prepare("INSERT INTO client(nom, prenom, telephone, type) VALUES(:nom, :prenom, :telephone, :type)");

        $error = $query->execute(array(
            ':nom'=>$data['nom'],
            ':prenom'=>$data['prenom'],
            ':telephone'=>$data['telephone'],
            ':type'=>$data['type'],
        ));

        parent::deconnexionBD();
        return $error;
    }

    public function removeAction($data){
        $con = parent::connexionBD();

        $query = $con->prepare("DELETE FROM client WHERE id = :id");

        $error = $query->execute(array(
            ':id'=>$data["id"]
        ));

        parent::connexionBD();
        return $this->traiterResponse($error,$data['type']);
    }

    public function getAction($id){
        $con = parent::connexionBD();
        $query = $con->query("SELECT * FROM client WHERE id = ".$id);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $result = $query->fetch();

        return $result;
    }

    public function modifyClient($data){
        $con = parent::connexionBD();
        $query = $con->prepare("UPDATE client SET nom = :nom , prenom = :prenom, telephone = :telephone, type=:type WHERE id = :id");

        $error = $query->execute(array(
            ':nom'=>$data['nom'],
            ':prenom'=>$data['prenom'],
            ':telephone'=>$data['telephone'],
            ':type'=>$data['type'],
            ':id'=>$data['id'],
        ));

        parent::deconnexionBD();
        return $this->traiterResponse($error,$data['type']);
    }

    private function traiterResponse($error,$type){
        $redirect = "";
        switch($error){
            case intval($error) === 1:
                $redirect = "index.php?page=liste-client&type=".$type;
                break;
            default:
                $redirect = "index.php?page=error";
        }

        return $redirect;
    }
}