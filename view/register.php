<?php
 $connect = mysqli_connect("localhost", "root", "", "cart"); 
 if ($connect -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connect -> connect_error;
  exit();
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>

<!-- <style>
body {
    background-color: lightgray;
    height: 100vh;
    width: 100vw;
    display: flex;
    align-items: center;
    justify-content: center;
}

.container {
    width: 90vw;
    height: 90vh;
    background-image: url("../assets/images/poly.png");
    background-size: 70% 100%;
    background-position-x: center;
    background-position-y: center;
    background-repeat: no-repeat;
}
</style> -->

<body style="background-color: lightgray;">
    <div class="container">

        <form action="register.php" method="POST">
            <div><input type="text" name="name" placeholder="Votre nom" required>
                <input type="text" name="town" placeholder="Votre ville" required>
                <input type="text" name="quarter" placeholder="Votre quartier" required>
                <input type="email" name="email" placeholder="Votre email" required>
                <input type="tel" name="contact" placeholder="Votre contact" required>
                <input type="password" name="password" placeholder="Votre mot de pass" required>
                <input type="submit" name="submit" value="Envoyer">
            </div>
        </form>
    </div>


    <?php
     
    if(isset($_POST['submit'])){
        
        $name = $connect -> real_escape_string($_POST['name']);
        $town = $connect -> real_escape_string($_POST['town']);
        $quarter = $connect -> real_escape_string($_POST['quarter']);
        $email = $connect -> real_escape_string($_POST['email']);
        $contact = $connect -> real_escape_string($_POST['contact']);
        $password = md5($connect -> real_escape_string($_POST['password']));

        $sql = "INSERT INTO users VALUES ('', '$name', '$town', '$quarter', '$contact', '$email', '$password')";
        

        if ($connect->query($sql) === TRUE) {
            echo "Registration successfully";
            } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
            }

        $connect->close();


        header( "refresh:2;url=login.php" );
    }


    
    
    
    
    ?>




</body>

</html>