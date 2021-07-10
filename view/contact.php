<?php
 include 'header.php'; 

require("../assets/classes/PHPMailer/PHPMailer.php");
require("../assets/classes/PHPMailer/SMTP.php");


if(isset($_POST['name']) && isset($_POST['email'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['tel'];
$body = $_POST['body'];
$subject = " formulaire";
$message =" <html>

<h1 style='color: red;'> this is the new age</h1>

</html>";


// $message.= "Email: " . $email . "\r\n";
// $message.= "Contact: " . $contact . "\r\n";
// $message.= "Name: " . $name . "\r\n";
// $message.= "Message: " . $body . "\r\n";

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


header("Location: contact.php");
}
?>

<main class="contact">

    <div class="main_contact">

        <div class="main_contact_info">
            <p>la fouchette vous offre la possibilité de découvrir<br> les plus beaux plats africains de tous les temps.
                goûter et rester</p>
            <span class="info_item">
                <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white"
                        class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg></a> <span>+237681109455</span>
            </span>
            <span class="info_item">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white"
                        class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path
                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                    </svg></a> <span>info@fouchette.com</span>
            </span>
            <span class="info_item">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white"
                        class="bi bi-twitter" viewBox="0 0 16 16">
                        <path
                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg></a> <span>@fochette</span>
            </span>
            <span class="info_item">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white"
                        class="bi bi-facebook" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg></a> <span>facebook.com/lafouchette</span>
            </span>

        </div>






        <div class="main_contact_form">
            <h4>Envoyer nous un message</h4>
            <form action="contact.php" method="POST">
                <input type="text" name="name" id="name" placeholder="Votre Nom" required>
                <input type="Email" name="email" id="email" placeholder="Votre Email" required>
                <input type="tel" name="tel" id="tel" placeholder="Numero de Telephone" required>
                <textarea rows="" cols="" name="body" id="message" placeholder="Votre Message" required></textarea>
                <input type="submit" class="btn btn-dark" name="submit" value="Envoyer">
            </form>

        </div>

    </div>




</main>
<script src="../assets/js/app.js"></script>
</body>

</html>