<?php
include('include/functions.php');
include('include/config.php');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if (isset($_SESSION['admin_logged_in'])) {
    header('location: index.php');
    exit;
}

if (isset($_POST['login'])) {


    $email = $_POST['email'];
    $cookie_password = $_POST['password'];
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

            // remember me 
            if (isset($_POST['rememberme'])) {
                setcookie("email", $email, time() + 3600); // 1 hour
                setcookie("password", $cookie_password, time() + 3600); // 1 hour
            } // end of if remember me

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

<title>BalikG Reminder</title>
<?php

header_container(); ?>

</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="balik_logo.ico" alt="BalikG Reminder">
                BalikG Reminder
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Моля, влезте в профила си
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="" method="POST">
                        <p style="color: red;"><?php if (isset($_GET['error'])) {
                                                    echo $_GET['error'];
                                                } ?></p>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Имейл адрес</label>
                            <input type="email" name="email" value="<?php if (isset($_COOKIE['email'])) {
                                                                        echo $_COOKIE['email'];
                                                                    } ?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Имейл адрес" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Парола</label>
                            <input type="password" name="password" value="<?php if (isset($_COOKIE['password'])) {
                                                                                echo $_COOKIE['password'];
                                                                            } ?>" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" name="rememberme" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Запомни ме</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Забравена Парола?</a>
                        </div>
                        <button type="submit" name="login" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Вход</button>
                        <!-- <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Нямаш акаунт? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Регистрирай се</a>
                        </p> -->
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php footer_container(); ?>
</body>

</html>