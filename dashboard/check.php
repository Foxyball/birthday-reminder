<?php
include('../include/connect.php');
require '../phpmailer/PHPMailerAutoload.php';

#sql query to get birthday list
$today = date("d.m.Y");

$stmt = $conn->prepare("SELECT * FROM birthday_list WHERE birthdate = ?");
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();



if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $birthdate = $row['birthdate'];

        // phpmailer 
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = '';                 // SMTP username
        $mail->Password = '';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $form_message = "<html><body>";
        $form_message .= "<img src='https://img.freepik.com/premium-vector/birthday-cake-with-candles-hand-drawn-vector-illustration-card-banner-t-shirt_528592-136.jpg?w=2000' alt='Birthday cake' border='0' width='500' height='500'>";
        $form_message .= "<h1>BalikG Reminder!</h1>";
        $form_message .= "<p><i><b>BalikG Reminder</b> Ви напомня, че датата е <b>$today</b> и $name има рожден ден! Пожелайте му нещо приятно!</i></p>";
        $form_message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
        $form_message .= "<tr style='background-color:#eee;'><td><strong>Име:</strong> </td><td>" . $name . "</td></tr>";
        $form_message .= "<tr style='background-color:#eee;'><td><strong>Дата:</strong> </td><td>" . $birthdate . "</td></tr>";
        $form_message .= "</table>";
        $form_message .= "<p><i>За повече информация може да натиснете <a href='https://projects.balikgstudio.eu/birthday-reminder/dashboard/'>тук</a></i></p>";
        $form_message .= "<p><i>Благодарим Ви, че използвате нашите услуги!</i></p>";
        $form_message .= "</body></html>";
        $mail->setFrom('', 'Напомняне за рожден ден - BalikG Reminder');
        $mail->addAddress('', 'Foxyball');     //Add a recipient
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Напомняне за рожден ден - BalikG Reminder";
        $mail->Body    = $form_message;


        if (!$mail->send()) {
            echo 'Възникна грешка при изпращането на имейл.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo '';
        }
        // end of PHP Mailer

    }
} // end of if while
