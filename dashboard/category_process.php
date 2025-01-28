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
    $cat_name = trim(htmlspecialchars($_POST['cat_name']));


    $stmt = $conn->prepare("INSERT INTO categories (cat_name) VALUES (?)");
    $stmt->bind_param("s", $cat_name);
    $stmt->execute();

    $_SESSION['success'] = 'Успешно добавихте категорията!';
    header('location:categories.php');
} else {
    $_SESSION['error'] = 'Възникна грешка при добавянето на категорията.';
    header('location:categories.php');
} // end of if
?>
