<?php 
require_once 'composants/header.php';

?>

<?php

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

<style>
.main {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}
</style>

<?php
echo "<div class='main'>";
while($donne=$afficha->fetch()){  
          
          ?>



<div class="content">


    <div class="produit">
        <div>
            <h2>Nom du produit : <?= $donne['nom'] ?></h2>
            <p> Description : <em> <?= $donne['descrire'] ?></em></p>
            <p> Prix : <b><?= number_format($donne['price'], 0, '.', '') ?></b></p>
            <p> <img src='../assets/images/<?= $donne['photo'] ?>' alt='<?= $donne['nom'] ?>' width='100%'
                    height="340px">
        </div>
        <div style="margin-bottom: 3%;">

            <button type="button" class="btn btn-outline-primary"> <a
                    href="modifier.php?id=<?php echo $donne['id'];?>">modifier</a></button>
            <button type="button" class="btn btn-outline-primary"> <a
                    href="activer.php?id=<?php echo $donne['id'];?>">activation</a></button>
            <button type="button" class="btn btn-outline-primary"> <a
                    href="?action=cacher&amp;id=<?php echo $donne['id'];?>">cacher</a></button>

            <!-- </div> -->
        </div>
    </div>
</div>
<?php

}  

echo "</div><br><br>";

if(isset($_GET['action'])=='cacher'){
    $id=$_GET['id'];


    $sql = "UPDATE cart_items SET disponibilite='non' WHERE id=$id";

    // Prepare statement
       $stmt = $bdd->prepare($sql);
  
    // execute the query
          $stmt->execute();
}
 ?>

<div class="footer">

    <?php

require_once 'composants/footer.php';

?>
</div>