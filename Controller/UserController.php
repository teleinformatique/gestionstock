<?php


class UserController extends Controller {
    public function ajoutAction($postData){
        $action = $postData['action'];
        $response = $this->$action($postData);

        return $this->traiterResponse($response,$postData['type']);
    }

    public function listeAction(){
        $con = parent::connexionBD();
        $query = $con->query("SELECT * FROM user  ");
        $query->setFetchMode(PDO::FETCH_OBJ);
        $result = $query->fetchAll();

        return $result;
    }

    private function ajoutUser($data){
        $con = parent::connexionBD();
        $query = $con->prepare("INSERT INTO user(nom, prenom, telephone, login, password, profile) VALUES(:nom, :prenom, :telephone, :login, :password, :profile)");

        $error = $query->execute(array(
            ':nom'=>$data['nom'],
            ':prenom'=>$data['prenom'],
            ':telephone'=>$data['telephone'],
            ':login'=>$data['login'],
            ':password'=>$data['password'],
                ':profile'=>$data['type'],
        ));

        parent::deconnexionBD();
        return $error;
    }

    public function removeAction($data){
        $con = parent::connexionBD();

        $query = $con->prepare("DELETE FROM user WHERE id = :id");

        $error = $query->execute(array(
            ':id'=>$data["id"]
        ));

        parent::connexionBD();
        return $this->traiterResponse($error,$data['type']);
    }

    public function getAction($id){
        $con = parent::connexionBD();
        $query = $con->query("SELECT * FROM user WHERE id = ".$id);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $result = $query->fetch();

        return $result;
    }

    public function modifyUser($data){
        $con = parent::connexionBD();
        $query = $con->prepare("UPDATE user SET nom = :nom , prenom = :prenom, telephone = :telephone, login=:login, password=:password, profile=:profile WHERE id = :id");

        $error = $query->execute(array(
            ':nom'=>$data['nom'],
            ':prenom'=>$data['prenom'],
            ':telephone'=>$data['telephone'],
            ':profile'=>$data['type'],
            ':login'=>$data['login'],
            ':password'=>$data['password'],
            ':id'=>$data['id'],
        ));

        parent::deconnexionBD();
        return $this->traiterResponse($error,$data['type']);
    }

    private function traiterResponse($error,$type){
        $redirect = "";
        switch($error){
            case intval($error) === 1:
                $redirect = "index.php?page=liste-user&type=".$type;
                break;
            default:
                $redirect = "index.php?page=error";
        }

        return $redirect;
    }

    public  function connexion($login, $pass){
        $con = parent::connexionBD();
    $query = $con->query("SELECT * FROM user WHERE login = '".$login."' AND password = '".$pass."'");
        $query->setFetchMode(PDO::FETCH_OBJ);
        $result = $query->fetch();

        return $result;
    }
}