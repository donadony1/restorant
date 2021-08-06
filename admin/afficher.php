<?php
require_once 'composants/header.php';

?>
<?php 
    while($donne=$afficha->fetch()){  
        ?>

<div class="content">

    <!-- id="<//?php echo $donnees['id'];?>" -->
    <div class="produit">
        <div>
            <h2>Nom du produit : <?= $donne['nom'] ?></h2>
            <p> Description : <em> <?= $donne['descrire'] ?></em></p>
            <p> Prix : <b><?= number_format($donne['prix'], 0, '.', '') ?></b></p>
            <p> <img src='../assets/images/<?= $donne['photo'] ?>' alt='<?= $donne['nom'] ?>' width='100%'
                    height="340px">
        </div>
        <div style="margin-bottom: 3%;">

            <?php
    require_once 'composants/footer.php';
    }            
 ?>