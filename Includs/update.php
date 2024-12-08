<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "employees";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE emp_data SET name = '$name', email = '$email' WHERE id = $id";

    if ($conn->query($sql)) {
        echo "Employee updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$id = $_GET['id'] ?? null;
$employee = $conn->query("SELECT * FROM emp_data WHERE id = $id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Employee</title>
</head>
<body>
    <h1>Update Employee</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $employee['id'] ?>">
        <input type="text" name="name" value="<?= $employee['name'] ?>" required><br>
        <input type="email" name="email" value="<?= $employee['email'] ?>" required><br>
        <button type="submit">Update Employee</button>
    </form>
    <a href="../main.php">Back to Employee List</a>
</body>
</html>
