<?php   
 include 'header.php'; 
?>

<head>
    <title>Confirm order</title>
</head>


<style>
input[type='submit'] {
    margin: 5px 0px 5px 0px;
}

body {
    background-color: rgb(209, 207, 199);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column
}
</style>

<div class="confirm_container">









    <?php
require("../assets/classes/PHPMailer/PHPMailer.php");
require("../assets/classes/PHPMailer/SMTP.php");

if(isset($_SESSION['cart']) && isset($_SESSION['user'])){
    
    $total = 0;
    $order = "";
    $order.= "
    <table style='border: 1px solid black;'>
    <tr style='border: 1px solid black;'>
      <th style='border: 1px solid black;'>ID</th>
      <th style='border: 1px solid black;'>Name</th>
      <th style='border: 1px solid black;'>Price</th>
      <th style='border: 1px solid black;'>Quantity</th>
      <th style='border: 1px solid black;'>Total Price</th>
      </tr>
      
      
      ";
      
      foreach ($_SESSION['cart'] as $key => $value){
          $id  = $value['id'];  
          
          $order.= "
          <tr style='border: 1px solid black;'>
          <td style='border: 1px solid black;'>$id</td>
          <td style='border: 1px solid black;'> ".$value['name']." </td>
          <td style='border: 1px solid black;'> ".$value['price']." </td>
          <td style='border: 1px solid black;'> ".$value['quantity']." </td>
          <td style='border: 1px solid black;'> " .number_format($value['price'] * $value['quantity'], 2)." frs</td>
          </tr>
          ";
          
              $total = $total + $value['price'] * $value['quantity'];
          }

          $order.="
          <tr style='border: 1px solid black;'>
          <td colspan='3' style='border: 1px solid black;'></td>
            <td style='border: 1px solid black;'><b>Total Price</b></td>
            <td style='border: 1px solid black;'> " .number_format($total,2)." frs</td>            
            </tr>
            </table>
            ";
            
            
            
            echo $order;
            
            
        }
        
        
        
        if(isset($_POST['order'])) {
            
            if(isset($_SESSION['cart']) && isset($_SESSION['user'])){
                
                $name = $_SESSION['user'][0]['name'];
                $email = $_SESSION['user'][0]['email'];
                $town = $_SESSION['user'][0]['Town'];
                $quarter = $_SESSION['user'][0]['quater'];
                $contact = $_SESSION['user'][0]['contact'];
                
                
                $subject = "Nouvel comande";
                $message = " <div style='max-width: 600px;  min-width:300px;'>
                <h4 style='color: darkgreen;  width: 70%; font-size: 20px;'> Merci d'avoir placer une nouvel comande sur
                restaurant la fourchette</h4>
                <h6 style='font-size: 15px;'><b>MR/MADAM $name</b> </h6>
                <h6><b>Domicile a $quarter, $town</b> </h6>
        <h6><b>contact: $contact</b> </h6>
        <h6><b>email: $email</b> </h6><hr>
        
        </div>" .  $order . "<hr> Merci nous avon recu votre commande nous alons vous contacter<br> dans quelque minute pandan la livreson";
        
        
        
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
        
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "mbutiji1@gmail.com";  
        $mail->Password = "developer-8081";  
        $mail->SetFrom($email, $name);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AddAddress($email); 
        
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            
            echo "<h4> Merci nous avon recu votre commander, verifier votre facture dans votre email</h4>";
        }
        
        
    } else {
        echo "please login and add items to your cart";
    }

    
    
    if(isset($_SESSION['cart']) && isset($_SESSION['user'])){
        
                $name = $_SESSION['user'][0]['name'];
                $email = $_SESSION['user'][0]['email'];
                $town = $_SESSION['user'][0]['Town'];
                $quarter = $_SESSION['user'][0]['quater'];
                $contact = $_SESSION['user'][0]['contact'];
                
                
                $subject = "Nouvel comande";
                $message = " <div style='max-width: 600px;  min-width:300px;'>
                <h4 style='color: darkgreen;  width: 70%; font-size: 20px;'>Une nouvel commande vien d'etre effectuer</h4>
                <h6 style='font-size: 15px;'><b>MR/MADAM $name</b> </h6>
                <h6><b>Domicile a $quarter, $town</b> </h6>
                <h6><b>contact: $contact</b> </h6>
                <h6><b>email: $email</b> </h6><hr>
                
                </div>" .  $order . "<hr> Restaurant la fourchette";
                
                
                
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                $mail->IsSMTP(); // enable SMTP
        
                $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465; // or 587
                $mail->IsHTML(true);
                $mail->Username = "mbutiji1@gmail.com";  
                $mail->Password = "developer-8081";  
                $mail->SetFrom($email, $name);
                $mail->Subject = $subject;
                $mail->Body = $message;
                $mail->AddAddress("mbiakopclinton@gmail.com"); 
                
                if(!$mail->Send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            unset($_SESSION['cart']);
            
            // echo "<h4> Merci nous avon recu votre commander, verifier votre facture dans votre email</h4>";
        }
        
        
    }
}




?>

    <?php    

if(isset($_SESSION['cart']) && isset($_SESSION['user'])){
    
    echo '
    <form action="order.php" method="POST">
    <input type="submit" name="order" value="Confirm order" class="btn btn-success">
    </form>
    ';
} else {
    
}

?>


</div>


<script src="../assets/js/app.js"></script>
</body>

</html>