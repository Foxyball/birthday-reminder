<?php
session_start();

include('../include/connect.php');

if (isset($_SESSION['admin_logged_in'])) {
  header('location: index.php');
  exit;
}

if (isset($_POST['login'])) {


  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare("SELECT admin_id,admin_name, admin_email, admin_password, created_at FROM admins WHERE admin_email = ? AND admin_password = ? LIMIT 1");

  $stmt->bind_param('ss', $email, $password);

  if ($stmt->execute()) {
    $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password, $created_at);
    $stmt->store_result();

    if ($stmt->num_rows() == 1) {
      $stmt->fetch();

      $_SESSION['admin_id'] = $admin_id;
      $_SESSION['admin_name'] = $admin_name;
      $_SESSION['admin_email'] = $admin_email;
      $_SESSION['created_at'] = $created_at;
      $_SESSION['admin_logged_in'] = true;


      header('location: index');
    } else {
      header('location: login?error=Грешен имейл или парола.');
    }
  } else {
    //error
    header('location: login?error=Нещо се обърка.');
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="balik_logo.ico" type="image/png">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Вход в BalikG Reminder</title>
</head>
<script>
  tailwind.config = {
    darkMode: 'class',
    theme: {
      extend: {
        colors: {
          primary: {
            "50": "#eff6ff",
            "100": "#dbeafe",
            "200": "#bfdbfe",
            "300": "#93c5fd",
            "400": "#60a5fa",
            "500": "#3b82f6",
            "600": "#2563eb",
            "700": "#1d4ed8",
            "800": "#1e40af",
            "900": "#1e3a8a"
          }
        }
      },
      fontFamily: {
        'body': [
          'Roboto',
          'ui-sans-serif',
          'system-ui',
          '-apple-system',
          'system-ui',
          'Segoe UI',
          'Roboto',
          'Helvetica Neue',
          'Arial',
          'Noto Sans',
          'sans-serif',
          'Apple Color Emoji',
          'Segoe UI Emoji',
          'Segoe UI Symbol',
          'Noto Color Emoji'
        ],
        'sans': [
          'Roboto',
          'ui-sans-serif',
          'system-ui',
          '-apple-system',
          'system-ui',
          'Segoe UI',
          'Roboto',
          'Helvetica Neue',
          'Arial',
          'Noto Sans',
          'sans-serif',
          'Apple Color Emoji',
          'Segoe UI Emoji',
          'Segoe UI Symbol',
          'Noto Color Emoji'
        ]
      }
    }
  }
</script>

</head>

<body>
  <section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
        <img class="w-8 h-8 mr-2" src="balik_logo.ico" alt="logo">
        BalikG Reminder
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <form method="POST" class="space-y-4 md:space-y-6" action="" onsubmit="ShowLoading()">
            <p style="color: red;"><?php if (isset($_GET['error'])) {
                                      echo $_GET['error'];
                                    } ?></p>
            <div>
              <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Имейл..." required="">
            </div>
            <div>
              <input type="password" name="password" id="password" placeholder="Парола.." class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
            </div>
            <button type="submit" name="login" class="w-full text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Вход</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- LOADING AFTER SUBMIT JQUERY -->
  <script type="text/javascript">
    function ShowLoading(e) {
      var div = document.createElement('div');
      div.innerHTML = "Зареждане...<br />";
      div.style.cssText = 'position: fixed; top: 5%; left: 40%; z-index: 5000; width: 422px; text-align: center; background: #EDDBB0; border: 1px solid #000';
      document.body.appendChild(div);
      return true;
      // These 2 lines cancel form submission, so only use if needed.
      //window.event.cancelBubble = true;
      //e.stopPropagation();
    }
  </script>
  <!-- !LOADING AFTER SUBMIT JQUERY -->


</body>

</html>