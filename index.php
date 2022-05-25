<?php
if (isset($_POST['submit'])) {
    echo $_POST['gender'];
    echo $_POST['sports'];
    if (!empty($_POST['checked'])) {
        foreach ($_POST['checked'] as $value) {
            echo $value;
        }
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
    <title>EMPLOYEE MANAGEMENT</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="container mx-auto bg-blue-300">
        <nav class="flex justify-between border border-black bg-blue-300">
            <h1>EMPLOYEE</h1>
            <div class="flex justify-around">
                <a href="#">HOME</a>
                <a href="#">ABOUT</a>
                <a href="#">DASHBOARD</a>
            </div>
            <div class="flex">
                <button>ADMIN LOGIN</button>
                <button>SIGN UP</button>
            </div>
        </nav>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="radio" name="gender" value="female">
        <label>female</label>
        <input type="radio" name="gender" value="male">
        <label>male</label>
        <input type="checkbox" id="html" name="checked[]" value="html">html <br>
        <input type="checkbox" id="js" name="checked[]" value="js">js <br>
        <input type="checkbox" id="react" name="checked[]" value="react">react <br>
        <select name="sports">
            <option value="basketball">basketball</option>
            <option value="football">football</option>
            <option value="cricket">cricket</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>