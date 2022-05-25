<?php include 'config/database.php'; ?>
<?php
$emp_name = $email = $phone = $address = $dept_id = '';
$emp_nameErr = $emailErr = $phoneErr = $addressErr = $dept_idErr = '';

$getDept = 'SELECT dept_name, id FROM department';
$res = mysqli_query($conn, $getDept);
$data = mysqli_fetch_all($res, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
    //validate emp name
    if (!empty($_POST['emp_name'])) {
        $emp_name = $_POST['emp_name'];
    } else {
        $emp_nameErr = '<div class="flex justify-end w-full text-red-500 p-2 mr-5">Employee Name is Required!</div>';
    }
    //validate emp email
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $emailErr = '<div class="flex justify-end w-full text-red-500 p-2 mr-5">Email is Required!</div>';
    }
    //validate emp phone
    if (!empty($_POST['phone'])) {
        $phone = $_POST['phone'];
    } else {
        $phoneErr = '<div class="flex justify-end w-full text-red-500 p-2 mr-5">Phone Number is Required!</div>';
    }
    //validate emp address
    if (!empty($_POST['address'])) {
        $address = $_POST['address'];
    } else {
        $addressErr = '<div class="flex justify-end w-full text-red-500 p-2 mr-5">Address is Required!</div>';
    }
    //validate emp dept-id
    if (!empty($_POST['dept_id'])) {
        $dept_id = $_POST['dept_id'];
    } else {
        $dept_idErr = '<div class="flex justify-end w-full text-red-500 p-2 mr-5">Department Selection is Required!</div>';
    }

    // echo $emp_name, $email, $phone, $address, $dept_id;
    // echo $emp_nameErr, $emailErr, $phoneErr, $addressErr, $dept_idErr;

    //check if everything is entered correctly
    if (empty($emp_nameErr) && empty($emailErr) && empty($phoneErr) && empty($addressErr) && empty($dept_idErr)) {
        $sql = "INSERT INTO employee (emp_name, email, phone, address, dept_id) VALUES ('$emp_name', '$email', '$phone', '$address', '$dept_id')";

        if (mysqli_query($conn, $sql)) {
            // header('location: dashboard.php');
            echo 'success';
        } else {
            echo 'Error' . mysqli_error($conn);
        }
    } else {
        echo '<script> alert("INVALID INFO PROVIDED")</script>';
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
    <title>Document</title>
</head>

<body>
    <div class="container mt-20 h-screen w-screen flex justify-center align-center ">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="flex flex-col w-1/2 h-fit justify-center align-center border border-black p-2 " method="POST">
            <h1 class="self-center uppercase pb-5">Employee Details</h1>
            <div class="flex justify-between p-3 w-full">
                <label class="p-2" for="emp_name">Employee Name :</label>
                <input class="border border-solid border-gray-300 w-1/2 rounded-md p-2" type="text" name="emp_name" placeholder="Enter Employee Name">
            </div>
            <?php echo NULL ?: $emp_nameErr; ?>
            <div class="flex justify-between p-3 w-full">
                <label class="p-2" for="email">Employee Email :</label>
                <input class="border border-solid border-gray-300 w-1/2 rounded-md p-2" type="email" name="email" placeholder="Enter Email">
            </div>
            <?php echo NULL ?: $emailErr; ?>
            <div class="flex justify-between p-3 w-full">
                <label class="p-2" for="phone">Employee Phone :</label>
                <input class="border border-solid border-gray-300 w-1/2 rounded-md p-2" type="number" name="phone" placeholder="Enter Phone Number">
            </div>
            <?php echo NULL ?: $phoneErr; ?>
            <div class="flex justify-between p-3 w-full">
                <label class="p-2" for="address">Employee Address :</label>
                <input class="border border-solid border-gray-300 w-1/2 rounded-md p-2" type="text" name="address" placeholder="Enter Address">
            </div>
            <?php echo NULL ?: $addressErr; ?>
            <div class="flex justify-between p-3 w-full">
                <h1 class="p-2">Select your department : </h1>
                <select class="w-1/2 border border-solid border-gray-300 rounded-md p-2" name="dept_id">
                    <?php foreach ($data as $dept) : ?>
                        <option value="<?php echo $dept['id']; ?>"><?php echo $dept['dept_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php echo NULL ?: $dept_idErr; ?>
            <div class="flex justify-around p-3 w-full">
                <input class="border border-solid border-blue-900 px-4  py-1 rounded-full bg-blue-400 uppercase" type="submit" name="submit" value="submit">
                <input class="border border-solid border-blue-900 px-4  py-1 rounded-full bg-blue-400 uppercase" type="reset" name="reset" value="reset">
                <a class="border border-solid border-blue-900 px-4  py-1 rounded-full bg-blue-400 uppercase" href="dashboard.php">Dashboard</a>
            </div>
        </form>
    </div>
</body>

</html>