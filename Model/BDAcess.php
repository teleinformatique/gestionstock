<?php



class BDAcess {
    public static function connexion($bd, $user, $password){
        try{
            $dbh = new PDO('mysql:host=localhost;dbname='.$bd, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "test";
        }catch (\PDOException $ex){
            echo "Erreur connexion BD";
        }

    }
}