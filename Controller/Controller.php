<?php



class Controller {
    private $dbh = null;

    protected function connexionBD(){
        try{
            $this->dbh = new PDO('mysql:host=localhost;dbname=stock', 'root', '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "test";
        }catch (\PDOException $ex){
            echo "Erreur connexion BD";die;
        }

        return $this->dbh;
    }

    protected function deconnexionBD(){
        $this->dbh = null;
    }

}