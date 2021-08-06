<?php
       try{
        $bdd= new pdo('mysql:host=localhost;dbname=cart;charset=utf8', 'root',  '',
        [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
       
    }
    catch(exception $e){
        die('Error: ' .$e->getMessage());
    }
            if(isset($_POST['supprimer'])){

            $id=$_POST['id'];
           

            $supp=$bdd->query("SELECT photo FROM cart_items WHERE id=$id ");
             $supp->execute();

          $donne=$supp->fetch();
    
          $photo = $donne['photo'];
        //   var_dump($photo);
        
        $chemin="../assets/images/$photo";

        if(file_exists($chemin)){

            chown($chemin, 666);
            unlink($chemin);
            
        $supp=$bdd->query("DELETE FROM cart_items WHERE id=$id ");
        $supp->execute();

    }else{
        echo'deja supprimer';
    }
    // $supp=$bdd->query("DELETE FROM cart_items WHERE id=$id ");
    // $supp->execute();
    
    header('Location: supprime.php');
       
        }