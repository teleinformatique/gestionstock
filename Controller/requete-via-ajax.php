<?php

session_name("Serp_commercial");
 session_start();
$dbh = null;
try{
    $dbh = new PDO('mysql:host=localhost;dbname=stock', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "test";
}catch (\PDOException $ex){
    echo "Erreur connexion BD";
}

if(isset($_GET['type']) ) {
$query = $dbh->query("SELECT * FROM client WHERE type = ".$_GET['type']." AND telephone LIKE '%".$_GET['q']."%'");
$query->setFetchMode(PDO::FETCH_ASSOC);
$result = $query->fetchAll();

    $json = json_encode($result);
    echo $json;
    
}