<?php

session_start();
if (isset($_POST['submit'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST['password'];

    if ($username == 'urgen' && $password == 'admin') {
        $_SESSION['username'] = $username;
        header('location: dashboard.php');
    } else {
        echo '<h4 class="errors">INCORRECT USERNAME OR PASSWORD</h4>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Employee</title>
</head>

<body>
    <div class="my-5 px-20 h-screen ">
        <nav class="flex justify-between align-center text-blue-500 py-4 mb-40">
            <h1 class="text-3xl font-bold hover:text-black"><a href="login.php">EMPLOYEE MANAGEMENT</a></h1>
            <div>
                <a href="login.php" class="p-5 text-black hover:text-blue-300">Home</a>
                <a href="#" class="p-5 text-black hover:text-blue-300">Contact</a>
            </div>
            <div>
                <a href="login.php" class="text-black mr-4 hover:text-blue-300">Log In</a>
                <a href="#" class="bg-gray-300 py-2 px-4 rounded-3xl hover:text-white hover:bg-blue-300">Sign Up</a>
            </div>
        </nav>
        <div class="h-full flex align-center justify center">
            <form class="flex flex-col mx-auto border border-solid border-black w-1/2 h-1/4 rounded-lg p-4 justify-around align-around" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <h1 class="text-2xl text-center text-bold text-blue-700 mb-3">LOGIN FORM</h1>
                <div class="flex justify-around">
                    <label for="username">Username:</label>
                    <input class="border border-solid border-black rounded-md w-1/2" type="text" name="username" placeholder="username">
                </div>
                <div class="flex justify-around">
                    <label for="password">Password:</label>
                    <input class="border border-solid border-black rounded-md w-1/2" type="password" name="password" placeholder="password">
                </div>
                <div class="flex justify-around">
                    <input class="border border-solid border-blue-700 rounded-2xl w-20 p-1 bg-blue-300" type="submit" value="Login" name="submit" class="contact-btn">
                    <input class="border border-solid border-blue-700 rounded-2xl w-20 p-1 bg-blue-300" type="reset" value="reset" name="reset" class="contact-btn">
                    <div class="border border-solid border-blue-700 rounded-2xl w-20 p-1 bg-blue-300"><a href="dashboard.php">Guest</a></div>
                </div>
        </div>

        </form>
    </div>
    </div>
</body>

</html>