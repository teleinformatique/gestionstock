<?php
if($_SESSION['profile'] != 2){
    session_destroy();
    header("Location:index.php?page=connexion");
}