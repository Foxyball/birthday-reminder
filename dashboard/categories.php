<?php
include('include/config.php');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//check if user is logged
if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Birthday Reminder - Категории</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
    <link rel="icon" href="balik_logo.ico">

    <!-- DataTables -->
    <link rel="stylesheet" href="../admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="../admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="../admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />

    <!-- datepicker  -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <a href="#" class="nav-link">Категории</a>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Търсене" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

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
                        <div class="col-sm-10">
                            <!-- Main content -->
                            <div class="content">
                                <div class="row">

                                    <!-- Button trigger modal -->
                                    <div class="row">
                                        <div class="mb-3 ml-3">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                                                <i class="fas fa-plus"></i> Добави
                                            </button>
                                        </div>
                                    </div>


                                    <!-- Add Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="category_process" method="POST">
                                                        <div class="form-group">
                                                            <input type="text" name="cat_name" class="form-control" id="category" placeholder="Име на Категория" aria-describedby="nameHelp" oninvalid="this.setCustomValidity('Моля, въведете категория')" oninput="setCustomValidity('')" autocomplete="off" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Затвори</button>
                                                            <button type="submit" name="add" class="btn btn-success">Добави</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div> <!-- End Add Modal -->

                                </div><!-- /.container-fluid -->

                                <!-- success message  -->
                                <?php if (isset($_SESSION['success'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Успешно!</strong> <?php echo $_SESSION['success']; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php }
                                unset($_SESSION['success']); ?>
                                <!-- end success message  -->

                                <!-- error message  -->
                                <?php if (isset($_SESSION['error'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Грешка!</strong> <?php echo $_SESSION['error']; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php }
                                unset($_SESSION['error']); ?>
                                <!-- end error message  -->


                                <!-- list all birthday_list -->
                                <table id="tablica" class="table">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Име</th>
                                            <th>Действие</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $stmt = $conn->prepare("SELECT * FROM categories ORDER BY id DESC");
                                        $stmt->execute();
                                        $result = $stmt->get_result();


                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['id'];
                                                $cat_name = $row['cat_name'];

                                        ?>

                                                <tr>
                                                    <td><?php echo $id; ?></td>
                                                    <td><?php echo $cat_name; ?></td>
                                                    <td>
                                                        <a href="edit_category?id=<?php echo $id; ?>" class="btn btn-info" title="Редактирай"><i class="fas fa-edit"></i></a>
                                                        <a href="delete_category?id=<?php echo $id; ?>" class="btn btn-danger btn-del" title="Изтрий"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>


                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td colspan="5">Няма категории :(</td>
                                            </tr>
                                        <?php } ?>
                                        <!-- end of if while -->
                                    </tbody>
                                </table> <!-- end of table -->


                            </div>
                            <!-- /.content -->
                        </div>
                        <!-- /.content-wrapper -->
                    </div>
                    <!-- ./wrapper -->


                    <!-- jQuery -->
                    <script src="../admin/plugins/jquery/jquery.min.js"></script>
                    <!-- Bootstrap 4 -->
                    <script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <!-- AdminLTE App -->
                    <script src="../admin/dist/js/adminlte.min.js"></script>

                    <script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
                    <script src="../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
                    <script src="../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
                    <script src="../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
                    <script src="../admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
                    <script src="../admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
                    <script src="../admin/plugins/jszip/jszip.min.js"></script>
                    <script src="../admin/plugins/pdfmake/pdfmake.min.js"></script>
                    <script src="../admin/plugins/pdfmake/vfs_fonts.js"></script>
                    <script src="../admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
                    <script src="../admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
                    <script src="../admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


                    <script>
                        // SweetAlerts 

                        $('.btn-del').on('click', function(e) {
                            e.preventDefault();
                            const href = $(this).attr('href')

                            Swal.fire({
                                title: 'Сигурни ли сте?',
                                text: 'Потвърждение за изтриване',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Да, изтрий!',
                                cancelButtonText: 'Отказ'
                            }).then((result) => {
                                if (result.value) {
                                    document.location.href = href;
                                }
                            })
                        })
                    </script>

                    <!-- datatable -->
                    <script>
                        $(function() {
                            $("#tablica")
                                .DataTable({
                                    responsive: true,
                                    lengthChange: false,
                                    autoWidth: false,
                                })
                                .buttons()
                                .container()
                                .appendTo("#tablica_wrapper .col-md-6:eq(0)");
                        });
                    </script> <!-- end of datatable -->

                    


                    <!--  JS custom validation -->
                    <script>
                        var FormStuff = {
                            init: function() {
                                this.applyConditionalRequired();
                                this.bindUIActions();
                            },

                            bindUIActions: function() {
                                $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
                            },

                            applyConditionalRequired: function() {

                                $(".require-if-active").each(function() {
                                    var el = $(this);
                                    if ($(el.data("require-pair")).is(":checked")) {
                                        el.prop("required", true);
                                    } else {
                                        el.prop("required", false);
                                    }
                                });

                            }

                        };

                        FormStuff.init();
                    </script>
                    <!-- END of JS custom validation -->


</body>

</html>