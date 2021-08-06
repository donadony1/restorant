<style>
    .connex{
   margin-left: 30%;
   background-color: #3158c9;
   padding: 3% ;
    width: 40%;
    color: white;
 }
 form{
     width: 100%;
 }
 input{
    width: 100%;
     border-top: none;
     border-left: none;
     border-right: none;
     background-color:white;
     border-bottom: white solid;
     color: blue;
 }
 h2{
     width: 100%;
 }
a{
    width: 100%;
}
.connex h1{
    background-color: red;
    border: thin solid red;
    color: white; 
    padding: 5px; 
    font-size: 1.2em; 
    text-align: center;
}
</style>
<?php   
require_once 'composants/header.php'; 

// require_once 'composants/header.php';

try{
    $bdd= new pdo('mysql:host=localhost;dbname=cart;charset=utf8', 'root',  '',
    [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

}


catch(exception $e){
    die('Error: ' .$e->getMessage());
}

?>

<?php
    if(isset($_POST['sudmit'])){
        $username=htmlspecialchars($_POST['user']);
        $password= sha1($_POST['motdepasse']);

        
        if(!empty($username) && !empty($password)){
                
            $mont=$bdd->query('SELECT nom FROM admin_nom');
            $mont->execute();
            $count = 0;
            foreach($mont as $row){
                if($username==$row['nom']){
                    $count++;
                }else{
     
                }
            }

            if($count > 0){
                $rep = "desole nom exite deja";
            } else {
    
                $inser=$bdd->prepare('INSERT INTO admin_nom(nom, motpass) VALUE(?,?)');
                $inser->execute(array($username, $password));
                    $rep1='les informatiom on ete bien enregistrer';
            }

        }
    }
 ?>


     <div class="connex">

        <h2>creer un compte</h2> 
            <h2>Admimistation</h2> 
            <form action="" method="POST">
                <h2>username</h2><input type="text" name="user" required>
                <h2>mot de passe</h2><input type="password" name="motdepasse" placeholder="entrer un mot de passe" required><br>
                <button  type="submit" name="sudmit" class="btn btn-primary mt-4">inscrire</button>
                <br>
               <button class="btn btn-primary mt-4"> <a href="index.php"><h4> connectez-vous si vous allez un compte</h4></a></button> 
              <h1><?php if(isset($rep)) echo $rep;?></h1>
               <h1><?php if(isset($rep1)) echo $rep1;?></h1>
            </form>

    </div>
</body>
</html>

