<?php
include('include/config.php');
include('include/smtp.class.php');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$today = date('m-d');

$stmt = $conn->prepare("SELECT * FROM birthday_list WHERE DATE_FORMAT(birthdate, '%m-%d') = ?");
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $birthdate = $row['birthdate'];

        $form_message = "<html><body style='font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;'>";
        $form_message .= "<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse;'>";
        $form_message .= "<tr><td align='center' bgcolor='#70bbd9' style='padding: 40px 0 30px 0;'>";
        $form_message .= "<img src='https://img.freepik.com/premium-vector/birthday-cake-with-candles-hand-drawn-vector-illustration-card-banner-t-shirt_528592-136.jpg?w=2000' alt='Birthday cake' width='300' height='300' style='display: block;' />";
        $form_message .= "</td></tr>";
        $form_message .= "<tr><td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>";
        $form_message .= "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
        $form_message .= "<tr><td style='color: #153643; font-size: 24px;'><b>BalikG Reminder!</b></td></tr>";
        $form_message .= "<tr><td style='padding: 20px 0 30px 0; color: #153643; font-size: 16px; line-height: 20px;'>";
        $form_message .= "<p><i><b>BalikG Reminder</b> Ви напомня, че датата е <b>$today</b> и $name има рожден ден! Пожелайте му/й нещо приятно!</i></p>";
        $form_message .= "</td></tr>";
        $form_message .= "<tr><td>";
        $form_message .= "<table border='1' cellpadding='0' cellspacing='0' width='100%' style='border-color: #e0e0e0;'>";
        $form_message .= "<tr style='background-color:#eee;'><td style='padding: 8px;'><strong>Име:</strong></td><td style='padding: 8px;'>$name</td></tr>";
        $form_message .= "<tr style='background-color:#eee;'><td style='padding: 8px;'><strong>Дата:</strong></td><td style='padding: 8px;'>$birthdate</td></tr>";
        $form_message .= "</table>";
        $form_message .= "</td></tr>";
        $form_message .= "<tr><td style='padding: 20px 0 30px 0; color: #153643; font-size: 16px; line-height: 20px;'>";
        $form_message .= "<p><i>За повече информация може да натиснете <a href='https://projects.balikgstudio.eu/birthday-reminder/dashboard/'>тук</a></i></p>";
        $form_message .= "<p><i>Благодарим Ви, че използвате нашите услуги!</i></p>";
        $form_message .= "</td></tr>";
        $form_message .= "</table>";
        $form_message .= "</td></tr>";
        $form_message .= "<tr><td bgcolor='#70bbd9' style='padding: 30px 30px 30px 30px;'>";
        $form_message .= "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
        $form_message .= "<tr><td style='color: #ffffff; font-size: 14px;'>&copy; 2023 BalikG Studio. All rights reserved.</td></tr>";
        $form_message .= "</table>";
        $form_message .= "</td></tr>";
        $form_message .= "</table>";
        $form_message .= "</body></html>";

        $to = "thefoxybg@gmail.com";
        $subject = "Днес $name има рожден ден!";

        if (!sendEmail($to, $subject, $form_message)) {
            error_log("Failed to send email to $to");
        }
    }
}

$stmt->close();
$conn->close();

?>
