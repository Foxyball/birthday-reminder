<?php
include('include/config.php');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

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
    $cat_id = $_POST['cat_id'];
    // $customdate = date("Y.d.m", strtotime($birthdate));

    $stmt = $conn->prepare("INSERT INTO birthday_list (name, birthdate,cat_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $birthdate, $cat_id);
    $stmt->execute();

    $_SESSION['success'] = 'Успешно добавихте рожден ден!';
    header('location:index.php');
} else {
    $_SESSION['error'] = 'Възникна грешка при добавянето на рожден ден.';
    header('location:index.php');
} // end of if
?>
