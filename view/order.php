<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm order</title>


    <!-- js links  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- css     -->

    <link rel="stylesheet" href="../assets/styles/style.css">
</head>


<?php
session_start();

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
    
    $name = $_SESSION['user'][0]['name'];
    $email = $_SESSION['user'][0]['email'];
    $town = $_SESSION['user'][0]['Town'];
    $quarter = $_SESSION['user'][0]['quater'];
    $contact = $_SESSION['user'][0]['contact'];
    
    // $contact = $_POST['tel'];
    // $body = $_POST['body'];
    $subject = "Nouvel comande";
    $message = " <div style='max-width: 600px;  min-width:300px;'>
        <h4 style='color: darkgreen;  width: 70%; font-size: 20px;'> Merci d'avoir placer une nouvel comande sur
            restaurant la fourchette</h4>
        <h6 style='font-size: 15px;'><b>MR/MADAM $name</b> </h6>
        <h6><b>Domicile a $quarter, $town</b> </h6>
        <h6><b>contact: $contact</b> </h6>
        <h6><b>email: $email</b> </h6><hr>

    </div>" .  $order . "<hr> Merci nous avon recu votre commande nous alons vous contacter<br> dans quelque minute pandan la livreson";




    // $message.= "Email: " . $email . "\r\n";
    // $message.= "Contact: " . $contact . "\r\n";
    // $message.= "Name: " . $name . "\r\n";
    //  $message.= "Message: " . $body . "\r\n";

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
        echo "<p class='sent_alert'> Message envoyer merci </p>";
     }


    // header("Location: order.php");
}




?>

<body>
    <style>
    input[type='submit'] {
        margin: 5px 0px 5px 0px;
    }
    </style>


    <form action="order.php" method="POST">
        <input type="submit" name="order" value="Confirm order" class="btn btn-success">
    </form>



    <!-- 
    <div style="max-width: 600px;  min-width:300px;">
        <h4 style="color: darkgreen;  width: 70%; font-size: 20px;"> Merci d'avoir placer une nouvel comande sur
            restaurant la fourchette</h4>
        <h6 style="font-size: 15px; "><b>MR/MADAM clinton</b> </h6>
        <h6><b>Domicile a douala</b> </h6>
        <h6><b>contact: 23454</b> </h6>
        <h6><b>email: mkdjedhfujh</b> </h6>

    </div> -->

    <script src="./cart/app.js"></script>
</body>

</html>