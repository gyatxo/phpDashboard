<?php include 'config/database.php'; ?>
<?php
session_start();
$selectData = 'SELECT * FROM department';
$res = mysqli_query($conn, $selectData);
$data = mysqli_fetch_all($res, MYSQLI_ASSOC);
// print_r($data);

// delete
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "DELETE FROM department WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('location: dashboardDepartment.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/0.0.0-insiders.4a070ac/tailwind.min.css" integrity="sha512-vJu7D5BpjnNXVpLBrl9LKLvmXBNjiLwge8EOZ/YS9XwiChpfKLAlydwIZvoJaDE3LI/kr3goH0MzDzNbBgyoOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="flex flex-row ">
        <div class="flex flex-col  space-y-5 justify-between min-h-screen w-60 px-2 py-4 bg-gray-50">
            <div class=" flex items-center justify-between text-gray-600 text-3xl px-5 uppercase"><b>Employee Management</b></div>
            <div class="flex flex-col flex-auto">
                <div class="p-2 hover:bg-pink-100">
                    <div class="flex flex-row space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <h4 class="font-bold text-gray-500 hover:text-pink-600 uppercase text-bold">Dashboard</h4>
                    </div>
                </div>
                <div class="p-2 hover:bg-pink-100 ">
                    <div class="flex flex-row space-x-3 ">
                        <a href="dashboard.php" class="font-regular text-gray-500 hover:text-pink-600 uppercase text-bold">Employee</a>
                    </div>
                </div>
                <div class="p-2 hover:bg-pink-100">
                    <div class="flex flex-row space-x-3">
                        <a href="dashboardDepartment.php" class="font-regular text-gray-500 hover:text-pink-600 uppercase text-bold">Department</a>
                    </div>
                </div>

            </div>

        </div>


        <div class="flex-auto ">
            <div class="flex flex-col">
                <div class="flex justify-end bg-white h-24 p-2 drop-shadow-2xl">
                    <div class="flex space-x-3">

                        <h4 class="font-bold text-gray-500 p-1 mr-5 mt-5">Welcome</h4>

                    </div>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <p class="text-gray-400 p-1 mr-10 mt-5"><?php echo strtoupper($_SESSION['username']); ?></p>
                    <?php else : ?>
                        <p class="text-gray-400 p-1 mr-10 mt-5">Guest</p>
                    <?php endif; ?>
                    <a href="logout.php" class="border border-solid border-blue-900 px-4  rounded-full bg-blue-400 uppercase self-center py-1 mr-5"> LOGOUT</a>
                </div>
                <div class="bg-blue-50 min-h-screen">

                    <!--Table-->
                    <div class="flex justify-between ">
                        <div class="p-4 font-bold text-gray-600 uppercase">Department details</div>
                        <a href="department.php" class="border border-solid border-blue-900 px-4  rounded-full bg-blue-400 uppercase self-center py-1 mr-5"> <span>ADD +</span></a>
                    </div>
                    <div class="grid  lg:grid-cols-1  md:grid-cols-1 p-4 gap-3">
                        <div class="col-span-2 flex flex-auto items-center justify-between  p-5 bg-white rounded shadow-sm">
                            <table class="min-w-full divide-y divide-gray-200 table-auto">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Location
                                        </th>
                                        <th scope="col" colspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach ($data as $info) : ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <?php echo ucwords($info['dept_name']); ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <?php echo ucwords($info['location']); ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                <a href="editDepartment.php?id=<?php echo $info['id']; ?>" class="text-black hover:text-indigo-900 p-1 border border-solid border-black rounded-full mr-3 bg-blue-400">Edit</a>
                                                <a href="dashboardDepartment.php?id=<?php echo $info['id']; ?>" class="text-black hover:text-indigo-900 p-1 border border-solid border-black rounded-full mr-3 bg-blue-400">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>