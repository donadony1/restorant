<?php 
require_once 'composants/header.php';
try{
    $bdd= new pdo('mysql:host=localhost;dbname=cart;charset=utf8', 'root',  '',
    [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

}
catch(exception $e){
    die('Error: ' .$e->getMessage());
}
?>
<div class="fom">

    <form action='' method='post' enctype='multipart/form-data'>

        <p><label for='nomProduit'>Nom du produit</label></p>

        <p> <input type='text' id='nomProduit' name='nom'></p>

        <p> <label for='imageProduit'>Image du produit</label></p>

        <p> <input type='file' id='imageProduit' name='image'> </p>

        <p<label for='descriptionProduit'>Description du produit</label></p>

            <p> <textarea type='text' id='descriptionProduit' name='description'></textarea> </p>

            <p><label for='prixProduit'>Prix</label></p>

            <p> <input type='number' id='prixProduit' name='prix'> </p>

            <p><input type='submit' name='submit' name='submit'></p>

    </form>
</div>


<?php

if (isset($_POST['submit'])){
  
    $nom = htmlentities($_POST['nom']);
    $image = $_FILES['image'];
    $description = htmlentities($_POST['description']);
    $prix = htmlentities($_POST['prix']);
    $dispo="oui";



    $dossier='../assets/images/';

    //recuperation du nom de la photo

    $fichier=basename($_FILES['image']['name']);

    //la taille max que peut contenir une photo

    $taille_max=3000000;

    //recuperation de la taille du fichier

    $taille=filesize($_FILES['image']['tmp_name']);

    //extensions autoriser

    $extensions = array('jpg','gif','jpeg','png');

    //recuperation d'extension de la photo

    $extension=strchr($_FILES['image']['name'], '.');

    // conditions

   
    // verification de la taille du la photo

    if( $taille > $taille_max){
        echo" photo trop lourd";
    }



    if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)){
        $requete = 'INSERT INTO cart_items(nom, descrire, price, photo,disponibilite) 
                    VALUES (?, ?, ?, ?,?)';
        $insert = $bdd->prepare($requete);
        $verif = $insert->execute(array($nom, $description, $prix, $_FILES['image']['name'],$dispo));

        if($verif){
            echo 'Le produit a ete ajoute';
        }
        else{
            echo 'Erreur pour ajout';
        }
}
}
?>

<?php
require_once 'composants/footer.php';
?>