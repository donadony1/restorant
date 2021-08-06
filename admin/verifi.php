<?php 

session_start();

if(!isset($_SESSION['username'])){
    header('location: index.php');
}
else {
    echo 'bienvenue <h1>'. $_SESSION['username']. '</h1>';
    
}