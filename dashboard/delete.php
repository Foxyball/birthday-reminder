<?php
include('include/config.php');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//check if user is logged
if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit;
}


# => DELETE
if (isset($_GET['del'])) {
    $id = $_GET['del'];

    $sql = "DELETE FROM birthday_list WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Успешно изтрихте рожден ден!';
        header('location:index');
    } else {
        $_SESSION['error'] = 'Възникна грешка при изтриването на рожден ден.';
        header('location:index');
    }
} else {
    $_SESSION['error'] = 'Възникна грешка при изтриването на рожден ден.';
    header('location:index');
}


# => DELETE END
