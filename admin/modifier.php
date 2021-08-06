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


<?php

 if(isset($_POST['modifi'])){
     echo $_POST['id'];
 }
 ?>


<?php


$id=$_GET['id'];

$re1 = "SELECT * FROM cart_items WHERE id = $id";
$affichag = $bdd->query($re1);
$affichag->execute();


 while($parcor=$affichag->fetch()) {
?>
<div class="fom">
    <form action='' method='POST' enctype='multipart/form-data'>

        <p> <img src='../assets/images/<?= $parcor['photo'] ?>' alt='<?= $parcor['nom'] ?>' width='100%' height="340px">
        </p>

        <p><label for='nomProduit'>Nom du produit</label></p>

        <p><input type='text' id='nomProduit' name='nom' value="<?php echo $parcor['nom']; ?>"></p>

        <label for='imageProduit'>Image du produit</label>
        <input type='file' id='imageProduit' name='image'>

        <p><label for='descriptionProduit'>Description du produit</label></p>

        <p> <textarea type='text' id='descriptionProduit'
                name='description'><?php echo $parcor['descrire']; ?></textarea></p>

        <p> <label for='prixProduit'>Prix</label></p>

        <p><input type='number' id='prixProduit' name='prix' value="<?php echo $parcor['price']; ?>"></p>

        <p> <input type='submit' name='subm'> </p>
    </form>
</div>
<?php
}


if(isset($_POST['subm'])){
    $nomm = htmlentities($_POST['nom']);
    $imagee = $_FILES['image'];
    $descriptionn = htmlentities($_POST['description']);
    $prixx = htmlentities($_POST['prix']);

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

  

   if( $taille > $taille_max){
       echo" photo trop lourd";
   }

   
    //   
    //inserer les elements dans la base de donne

   if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)){


    
        $sql =$bdd->prepare("UPDATE cart_items SET nom= ?, descrire=?, price=?, photo=? WHERE id= $id");

        $sql->execute( array($nomm,$descriptionn,$prixx,$_FILES['image']['name'] ));

    // Prepare statement
    
    //   $stmt->execute();

        echo " les donnes on bien ete modifier";
 }

}

    echo' les informations entrent pas !'; 
?>
<?php
        require_once 'composants/footer.php';
?>