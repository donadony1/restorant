<?php
require_once './sup.php';
require_once 'composants/header.php';

try{
    $bdd= new pdo('mysql:host=localhost;dbname=cart;charset=utf8', 'root',  '',
    [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
   
}
catch(exception $e){
    die('Error: ' .$e->getMessage());
}
$re2 = "SELECT * FROM cart_items ORDER BY id DESC";
$afficha = $bdd->query($re2);
?>



<div class="flex">
    <?php
while($donne=$afficha->fetch()){  
  
          
    ?>

    <div class="content">

        <!-- id="<//?php echo $donnees['id'];?>" -->
        <div class="produit">
            <div>
                <h2>Nom du produit : <?= $donne['nom'] ?></h2>
                <p> Description : <em> <?= $donne['descrire'] ?></em></p>
                <p> Prix : <b><?= number_format($donne['price'], 0, '.', '') ?></b></p>
                <p> <img src='../assets/images/<?= $donne['photo'] ?>' alt='<?= $donne['nom'] ?>' width='100%'
                        height="340px">
            </div>
            <div style="margin-bottom: 3%;">
                <form action="supprime.php" method='POST'>
                    <input type="hidden" name="id" value="<?= $donne['id'] ?>">
                    <input type="submit" name="supprimer" value="supprimer">
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <?php
}
?>
</div>