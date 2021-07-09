<?php
 session_start();
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

            
                        header("Location: cart/cart.php");
        } else {

            echo " Invalid email or password";
        }

    

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>

    <form action="login.php" method="POST">
        <input type="email" placeholder="Entre votre email" name="log_email">
        <input type="password" placeholder="Entre votre mot de pass" name="log_password">
        <input type="submit" name="login" value="Connexion">

    </form>


</body>

</html>