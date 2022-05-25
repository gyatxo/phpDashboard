

<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'urgen');
define('DB_PASS', 'admin123');
define('DB_NAME', 'employee_table');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die('Connection Failed' . $conn->connect_error);
}
