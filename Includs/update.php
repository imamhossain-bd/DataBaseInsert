<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "employees";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];

    $sql = "UPDATE emp_data SET name = '$newName', email = '$newEmail' WHERE id = $id";

    if ($conn->query($sql)) {
        header("Location: ../main.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
</head>
<body>
    <h1>Update Employee</h1>
    <form method="POST">
        <input type="number" name="id" placeholder="ID" required><br>
        <input type="text" name="name" placeholder="New Name" required><br>
        <input type="email" name="email" placeholder="New Email" required><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
<a href="../main.php">Back to Employee List</a>

<?php $conn->close(); ?>
