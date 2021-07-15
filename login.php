<?php

 include 'header.php'; 


if(isset($_POST['login'])){
    $log_email = $_POST['log_email'];
    $log_password = md5($_POST['log_password']);


  
 $connect = mysqli_connect("localhost", "root", "", "cart"); 
$query = mysqli_query($connect, "SELECT * FROM users WHERE Email='$log_email' AND Upassword='$log_password'");
$row = mysqli_fetch_array($query);
$num_row = mysqli_num_rows($query);


        if($num_row > 0){
            
            $user = array(
                'name' =>  $row['name'],
                'Town' => $row['Town'],
                'quater' => $row['Quarter'],
                'email' => $row['Email'],
                'contact' => $row['Contact']
            );

               if(empty($_SESSION['user'])){
                    $_SESSION['user'][] = $user;


                    var_dump($_SESSION['user']);
               } else{ 
                   echo "You are already Logged in";
               }

            
                        header("Location: cart.php");
        } else {

            echo " Invalid email or password";
        }

    

}


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<div class="form_container">
    <h4> Connecter vous pour passer les commande</h4>
    <form class="login_form" action="login.php" method="POST">
        <input type="email" placeholder="Entre votre email" name="log_email">
        <input type="password" placeholder="Entre votre mot de pass" name="log_password">
        <input type="submit" class="btn btn-success" name="login" value="Connecte Moi">
    </form>

    <div>
        <h5> Vous n'avez pas encore un compte, inscriver vous ici</h5>

        <a href="register.php" class="btn btn-dark btn-block">Inscription</a>
    </div>
</div>


</body>

</html>