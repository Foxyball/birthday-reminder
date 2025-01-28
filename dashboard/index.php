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
  <title>Birthday Reminder - Начало</title>
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

  <script src='../dashboard/fullcalendar-6.1.14/dist/index.global.js'></script>
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
        <li class="breadcrumb-item active">Начало</li>
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



                  <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Внимание!</strong> Сайтът е в режим на поддръжка.Възможни са проблеми със зареждането на данните или със създаването на нови. Освен това се работи над нова версия на сайта, която ще бъде пусната в близко бъдеще. 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> -->

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
                          <form action="process.php" method="POST">
                            <div class="form-group">
                              <input type="text" name="name" class="form-control" id="name" placeholder="Име на рожденик" aria-describedby="nameHelp" oninvalid="this.setCustomValidity('Моля, въведете име')" oninput="setCustomValidity('')" autocomplete="off" required>
                              <small id="name" class="form-text text-muted">(<span style="color:red;">*</span>) Изберете само <b>Име</b> или <b>Име</b> и <b>Фамилия</b>.</small>
                            </div>
                            <div class="form-group">
                              <?php $sql4 = "SELECT * FROM categories";
                              $result4 = $conn->query($sql4);
                              ?>
                              <select class="form-control" name="cat_id" id="category" oninvalid="this.setCustomValidity('Моля, изберете категория')" oninput="setCustomValidity('')" required>
                                <option value="" selected disabled>Изберете категория...</option>
                                <?php while ($row4 = mysqli_fetch_assoc($result4)) { ?>
                                  <option value="<?php echo $row4['id']; ?>"><?php echo $row4['cat_name']; ?></option>
                                <?php } ?>
                              </select>
                              <small id="name" class="form-text text-muted">(<span style="color:red;">*</span>) Изберете <b>Категория</b>.</small>
                            </div>
                            <div class="form-group">
                              <input type="text" name="birthdate" class="form-control" id="datepicker" placeholder="Изберете дата" oninvalid="this.setCustomValidity('Моля, въведете дата')" oninput="setCustomValidity('')" autocomplete="off" required>
                              <small id="date" class="form-text text-muted">(<span style="color:red;">*</span>) Изберете <b>рождената дата</b>.</small>
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

                  <!-- Help Modal -->
                  <div class="modal fade" id="staticHelp" data-keyboard="true" tabindex="-1" aria-labelledby="staticHelpLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="helpModalLabel">Какво е новото ?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Легенда.</p>
                          <span class="badge badge-success">Предстоящ</span> - Рожденици, чийто рожден ден предстои.
                          <br>
                          <span class="badge badge-danger">Минал</span> - Рожденици, чийто рожден ден е Минал.
                          <br>
                          <span class="badge badge-warning">Днес</span> - Рожденици, чийто рожден ден е Днес.
                          <br>
                          <i class="fas fa-birthday-cake"></i> - Рожденици, чийто рожден ден е Днес.
                          <br>
                        </div>
                      </div>
                    </div>
                  </div> <!-- End Help Modal -->

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

                <?php
                #count total number of birthday_list for this month
                $sql3 = "SELECT * FROM birthday_list WHERE MONTH(birthdate) = MONTH(CURRENT_DATE())";
                $count_result = $conn->query($sql3);
                $count = mysqli_num_rows($count_result);

                ?>
                <!-- end count -->


                <h3>Рожденици за този месец - <?php if ($count > 0) {
                                                echo $count;
                                              } else { ?>
                    0 <?php } ?>
                </h3>
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Предстоящ / Минал</th>
                      <th scope="col">Име</th>
                      <th scope="col">Дата</th>
                    </tr>
                  </thead>
                
                  <tbody>
  <?php
  // select all data from db that birthdate is equal to this month
  $sql1 = "SELECT * FROM birthday_list WHERE MONTH(birthdate) = MONTH(CURRENT_DATE()) ORDER BY birthdate ASC";
  $monthly_result = $conn->query($sql1);

  if ($monthly_result->num_rows > 0) {
    while ($row = $monthly_result->fetch_assoc()) { ?>
      <tr>
        <td>
          <?php
          // check if birthday is today 
          if (date('m-d') == date('m-d', strtotime($row['birthdate']))) { ?>
            <span class="badge badge-warning">Днес</span>
          <?php } else if (date('m-d') > date('m-d', strtotime($row['birthdate']))) { ?>
            <span class="badge badge-danger">Минал</span>
          <?php } else { ?>
            <span class="badge badge-success">Предстоящ</span>
          <?php } ?>
          <!-- end of if -->
        </td>
        <td><?php
            // echo name and age 
            $currentAge = date_diff(date_create($row['birthdate']), date_create('today'))->y;
            echo $row['name'] . ' (' . $currentAge . ' г.)';
            ?></td>
        <td><?php
            // count days until next birthday and age on next birthday
            $today = new DateTime(date('Y-m-d'));
            $birthdate = new DateTime($row['birthdate']);
            $nextBirthday = new DateTime(date('Y') . '-' . $birthdate->format('m-d'));

            if ($today > $nextBirthday) {
              $nextBirthday->modify('+1 year');
            }

            $daysUntilBirthday = $today->diff($nextBirthday)->days;
            $ageNextBirthday = $currentAge + 1;

            echo date('d.m.Y', strtotime($row['birthdate'])) . ' (' . $daysUntilBirthday . ' дни, ' . $ageNextBirthday . ' г.)';
            ?>
        </td>
      </tr>
    <?php }
  } else { ?>
    <tr>
      <td colspan="2">Няма рожденици за този месец :(</td>
    </tr>
  <?php } ?>
  <!-- end of if while -->
</tbody>




                </table>


                <div id="calendar"></div>


                <!-- list all birthday_list -->
                <table id="tablica" class="table">
                  <thead>
                    <tr>
                      <th>№</th>
                      <th>Име</th>
                      <th>Дата</th>
                      <th>Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

$stmt = $conn->prepare("SELECT * FROM birthday_list ORDER BY id DESC");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $name = $row['name'];
    $birthdate = $row['birthdate'];
    $cat_id = $row['cat_id'];

    $sql5 = "SELECT * FROM categories WHERE id = $cat_id";
    $cat_result = $conn->query($sql5);
    $cat_row = $cat_result->fetch_assoc();
    $cat_name = $cat_row['cat_name'];

    // Format the birthdate
    $formattedBirthdate = date('d.m.Y', strtotime($birthdate));

    // Calculate days until next birthday
    $currentDate = new DateTime();
    $birthDateThisYear = new DateTime(date('Y') . '-' . date('m-d', strtotime($birthdate)));
    if ($currentDate > $birthDateThisYear) {
      $birthDateThisYear->modify('+1 year');
    }
    $interval = $currentDate->diff($birthDateThisYear);
    $daysUntilBirthday = $interval->days;
?>

    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $name . '(' . $cat_name . ')' ?></td>
      <td><?php echo $formattedBirthdate . ' (след ' . $daysUntilBirthday . ' дни)'; ?></td>
      <td>
        <a href="edit?editid=<?php echo $id; ?>" class="btn btn-info" title="Редактирай"><i class="fas fa-edit"></i></a>
        <a href="delete?del=<?php echo $id; ?>" class="btn btn-danger btn-del" title="Изтрий"><i class="fas fa-trash"></i></a>
      </td>
    </tr>

  <?php }
} else { ?>
  <tr>
    <td colspan="5">Няма рожденици :(</td>
  </tr>
<?php } ?>
                    <!-- end of if while -->
                  </tbody>
                </table> <!-- end of table -->

                <!-- Legend -->
                <span class="badge badge-success">Предстоящ</span> - Рожденици, чийто рожден ден предстои.
                <br>
                <span class="badge badge-danger">Минал</span> - Рожденици, чийто рожден ден е Минал.
                <br>
                <span class="badge badge-warning">Днес</span> - Рожденици, чийто рожден ден е Днес.
                <br>

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
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: 'prevYear,prev,next,nextYear today',
      center: 'title',
      right: 'dayGridMonth,dayGridWeek,dayGridDay'
    },
    initialView: 'dayGridMonth',
    locale: 'bg',
    selectable: true,
    <?php $initialDate = date('Y-m-d'); ?>
    initialDate: '<?php echo $initialDate; ?>',
    navLinks: true, // can click day/week names to navigate views
    dayMaxEvents: true, // allow "more" link when too many events
    events: [
      <?php
      $currentYear = date('Y'); // Get the current year
      $sql = "SELECT * FROM birthday_list";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $birthdate = $row['birthdate']; // Example: 2004-10-10
        $cat_id = $row['cat_id'];

        $sql5 = "SELECT * FROM categories WHERE id = $cat_id";
        $cat_result = $conn->query($sql5);
        $cat_row = $cat_result->fetch_assoc();
        $cat_name = $cat_row['cat_name'];

        // Extract month and day from birthdate, then append the current year
        $birthMonthDay = date('m-d', strtotime($birthdate)); // Get MM-DD
        $adjustedDate = $currentYear . '-' . $birthMonthDay; // Replace year with current year
      ?>
        {
          title: '<?php echo $name . ' (' . $cat_name . ')'; ?>',
          start: '<?php echo $adjustedDate; ?>',
          url: 'edit?editid=<?php echo $id; ?>'
        },
      <?php } ?>
    ]
  });

  calendar.render();
});
</script>



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

          <!-- datepicker -->
          <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

          <script>
            $(function() {
              $("#datepicker").datepicker();
            });
            //   translating the datepicker to bulgarian
            jQuery(function($) {
              $.datepicker.regional['bg'] = {
                closeText: 'затвори',
                prevText: '&#x3c;назад',
                nextText: 'напред&#x3e;',
                nextBigText: '&#x3e;&#x3e;',
                currentText: 'днес',
                monthNames: ['Януари', 'Февруари', 'Март', 'Април', 'Май', 'Юни',
                  'Юли', 'Август', 'Септември', 'Октомври', 'Ноември', 'Декември'
                ],
                monthNamesShort: ['Яну', 'Фев', 'Мар', 'Апр', 'Май', 'Юни',
                  'Юли', 'Авг', 'Сеп', 'Окт', 'Нов', 'Дек'
                ],
                dayNames: ['Неделя', 'Понеделник', 'Вторник', 'Сряда', 'Четвъртък', 'Петък', 'Събота'],
                dayNamesShort: ['Нед', 'Пон', 'Вто', 'Сря', 'Чет', 'Пет', 'Съб'],
                dayNamesMin: ['Не', 'По', 'Вт', 'Ср', 'Че', 'Пе', 'Съ'],
                weekHeader: 'Wk',
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
              };
              $.datepicker.setDefaults($.datepicker.regional['bg']);
            });


            // formatting the datepicker to dd.mm.yyyy
            //   jQuery(function(a) {
            //     $("#datepicker").datepicker({
            //       dateFormat: 'dd.mm.yy',
            //       changeYear: true,
            //       viewMode: "years",
            //       minViewMode: "years"
            //     });
            //   });
            // 
          </script> <!-- end of datepicker -->


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

          <!-- minimum characters for name  -->
          <script>
            $(document).ready(function() {
              $('#name').keyup(function() {
                var len = $(this).val().length;
                if (len >= 4) {
                  $('#name').removeClass('is-invalid');
                  $('#name').addClass('is-valid');
                } else {
                  $('#name').removeClass('is-valid');
                  $('#name').addClass('is-invalid');
                }
              });
            });
          </script> <!-- end of minimum characters for name  -->

</body>

</html>