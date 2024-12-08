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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $hireDate = $_POST['hireDate'];

    $sql = "INSERT INTO emp_data (name, email, salary, hireDate) VALUES ('$name', '$email', '$salary', '$hireDate')";

    if ($conn->query($sql)) {
        header("Location: ../main.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Employee</title>
</head>
<body>
    <h1>Add New Employee</h1>
    <form method="POST">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="number" name="salary" placeholder="Salary" required><br>
        <input type="date" name="hireDate" required><br>
        <button type="submit" href="../main.php">Add Employee</button>
    </form>
    
</body>
</html>
