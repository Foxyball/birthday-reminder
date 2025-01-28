<?php
include('include/config.php');
include('include/smtp.class.php');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

#sql query to get birthday list
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
       

        $to="thefoxybg@gmail.com";
        $subject="Днес $name има рожден ден!";

        sendEmail($to, $subject, $form_message);

    } 
}
	// end of if while


$stmt->close();
$conn->close();

?>
