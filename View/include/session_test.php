<?php
if(!isset($_SESSION['profile'])){
    header("Location:index.php?page=connexion");
}