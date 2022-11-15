<?php
session_start();

include('../include/connect.php'); 

#check if user is logged
if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit;
}
?>

<?php
if (isset($_POST['add'])) {
    $name = trim(htmlspecialchars($_POST['name']));
    $birthdate = $_POST['birthdate'];

    $stmt = $conn->prepare("INSERT INTO birthday_list (name, birthdate) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $birthdate);
    $stmt->execute();

    $_SESSION['success'] = 'Успешно добавихте рожден ден!';
    header('location:index.php');
} else {
    $_SESSION['error'] = 'Възникна грешка при добавянето на рожден ден.';
    header('location:index.php');
} // end of if
?>
