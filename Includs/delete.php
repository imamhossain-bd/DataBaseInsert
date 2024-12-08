<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "employees";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'] ?? null;
if ($id) {
    $sql = "DELETE FROM emp_data WHERE id = $id";

    if ($conn->query($sql)) {
        header("Location: ../main.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
