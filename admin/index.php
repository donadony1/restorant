
<style>

    .connex{
    margin-top:10%;
   margin-left: 29%;
   background-color: rgba(1, 1, 1, 0.5);
   padding: 3% ;
    width: 40%;
    color: blanchedalmond;
    border-radius:2% ;
}
form{
    width: 100%;
}
.b{
    width: 100%;
    border-top: none;
    border-left: none;
    border-right: none;
    background-color: white;
    border-bottom: white solid;
     color: black;
    height: 4%;
}
h2{
    width: 100%;
}
a{
    width: 100%;
}
body{
    background-image: url('4.jpg') ;
    background-position: center;
    box-shadow: blue;
    cursor:pointer;
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
session_start();

// require_once('function.php');
try{
    $bdd= new pdo('mysql:host=localhost;dbname=cart;charset=utf8', 'root',  '',
    [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

}
catch(exception $e){
    die('Error: ' .$e->getMessage());
}

?>

<html>
<body>
    
</body>    
<link rel="stylesheet" href="bootstrap.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">

    <div class="connex">

        <h2>connectez-vous ici</h2>
        <h2>Admimistation</h2>
        <form action="" method="POST">
            <h2>username</h2><input class="b" type="text" name="user">
            <h2>mot de passe</h2><input class="b" type="password" name="motdepasse">
            <button type="submit"class="btn btn-primary mt-4" name="submit">connexion </button>
        </form>
<?php
    if(isset($_POST['submit'])){
        $username= htmlspecialchars($_POST['user']) ;
        $mots=sha1($_POST['motdepasse']);
        $inser=$bdd->query('SELECT * FROM admin_nom');
        $row = $inser->fetch();
            
        foreach($inser as $row ){
            if ($username == $row['nom'] && $mots == $row['motpass']){
                
                $_SESSION['username']=$row['nom'];
                header('location: index1.php');
            } else {
                
            }
        }
        echo "<h1>les informations ne sont pas correctes </h1>";
    }
    ?>

</div>

<?php 
// var_dump($row['motpass'], $row['nom']);
 ?>
</body>

</html>


