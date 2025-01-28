<?php
include('include/config.php');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//check if user is logged
if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit;
}
?>

<?php


#=> EDIT START
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $cat_name = $row['cat_name'];



    if (isset($_POST['edit_button'])) {
        $cat_name = trim(htmlspecialchars($_POST['cat_name']));


        $sql = "UPDATE categories SET cat_name= '$cat_name' WHERE id=$id";
        $result = mysqli_query($conn, $sql);


        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = 'Успешно редактирахте ' . $cat_name . '!';
            header("location:categories");
        } else {
            $_SESSION['error'] = 'Възникна грешка при редактирането на категорията.';
            header("location:categories");
        }
    }
} else {
    $_SESSION['error'] = 'Възникна грешка при редактирането на категорията.';
    header("location:categories");
}
#=> EDIT END
?>

<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админ панел - Редактиране</title>
    <!-- ikonki fontawesome -->
    <script src="https://kit.fontawesome.com/369f641e5e.js" crossorigin="anonymous"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
    <link rel="icon" href="../balik_logo.ico">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Категории</a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> -->
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">


                            <!-- Main content -->
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                        </div><!-- /.container-fluid -->
                                    </div>


                                    <!-- form -->
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="cat_name" class="form-control" id="category" value="<?php echo $cat_name; ?>" aria-describedby="nameHelp" autocomplete="off">
                                        </div>
                                        <div class="modal-footer">
                                            <a href="categories" type="button" class="btn btn-danger" data-dismiss="modal">Назад</a>
                                            <button type="submit" name="edit_button" class="btn btn-success">Редактирай</button>
                                        </div>
                                    </form>

                                    <!-- /.content -->
                                </div>
                                <!-- /.content-wrapper -->
                            </div>
                            <!-- ./wrapper -->

                            <!-- REQUIRED SCRIPTS -->


                            <!-- Bootstrap 4 -->
                            <script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                            <!-- AdminLTE App -->
                            <script src="../admin/dist/js/adminlte.min.js"></script>



</body>

</html>