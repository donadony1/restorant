<?php
            // require_once 'composants/header.php';

            try{
                $bdd= new pdo('mysql:host=localhost;dbname=cart;charset=utf8', 'root',  '',
                [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
            
            }
            catch(exception $e){
                die('Error: ' .$e->getMessage());
            }





            if($id=$_GET['id']){


            $sql = "UPDATE cart_items SET disponibilite='oui' WHERE id=$id";

            // Prepare statement
            $stmt = $bdd->prepare($sql);

            // execute the query
                $stmt->execute();


                header('location: voirplat.php');

            }else {
                echo"le plats n'a pas ete ractiver";
            }

?>
<br><br><br><br><br><br>


<?php
   
require_once 'composants/footer.php';

?>