<?php include 'config/database.php'; ?>
<?php
$dept_name = $location = '';
$dept_nameErr = $locationErr = '';

// update get the data of the department to be updated
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM department WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $dept_name = $data[0]['dept_name'];
    $location = $data[0]['location'];
} else {
    $dept_name = $location = '';
}
if (isset($_POST['submit'])) {
    echo $id;
    //validate dept name
    if (!empty($_POST['dept_name'])) {
        $dept_name = $_POST['dept_name'];
    } else {
        $dept_nameErr = '<div class="flex justify-end w-full text-red-500 p-2">Department Name is Required!</div>';
    }
    //validate dept location
    if (!empty($_POST['location'])) {
        $location = $_POST['location'];
    } else {
        $locationErr = '<div class="flex justify-end w-full text-red-500 p-2">Location is Required!</div>';
    }

    //validate emp id
    if (!empty($_POST['hiddenId'])) {
        $updateId = $_POST['hiddenId'];
    }

    //check if everything is entered correctly
    if (empty($dept_nameErr) && empty($locationErr)) {
        $sql = "UPDATE department SET dept_name='$dept_name', location='$location' WHERE id=$updateId";
        if (mysqli_query($conn, $sql)) {
            header('location: dashboardDepartment.php');
        } else {
            echo 'Error' . mysqli_error($conn);
        }
    } else {
        echo 'INVALID INFO PROVIDED';
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
    <title>Department</title>
</head>

<body>
    <div class="container mt-20 h-screen w-screen flex justify-center align-center ">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="flex flex-col w-1/2 h-fit justify-center align-center border border-black p-2 " method="POST">
            <h1 class="self-center uppercase pb-5">Department Details</h1>
            <div class="flex justify-between p-3 w-full">
                <label class="p-2" for="dept_name">Department Name :</label>
                <input class="border border-solid border-gray-300 w-1/2 rounded-md p-2" type="text" value="<?php echo $dept_name ?>" name="dept_name" placeholder="Department Name">
            </div>
            <?php echo NULL ?: $dept_nameErr; ?>
            <div class="flex justify-between p-3 w-full">
                <label class="p-2" for="location">Department Location :</label>
                <input class="border border-solid border-gray-300 w-1/2 rounded-md p-2" type="location" value="<?php echo $location ?>" name="location" placeholder="Location">
            </div>
            <?php echo NULL ?: $locationErr; ?>
            <div class="flex justify-around p-3 w-full">
                <input class="border border-solid border-blue-900 px-4  py-1 rounded-full bg-blue-400" type="submit" name="submit" value="submit">
                <input class="border border-solid border-blue-900 px-4  py-1 rounded-full bg-blue-400" type="reset" name="reset" value="reset">
                <input type="hidden" name="hiddenId" value="<?php echo $id; ?>">
                <a class="border border-solid border-blue-900 px-4  py-1 rounded-full bg-blue-400" href="dashboard.php">Dashboard</a>
            </div>
        </form>
    </div>
</body>

</html>