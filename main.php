<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "employees";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data (Example)
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $hireDate = $_POST['hireDate'];

    $sql = "INSERT INTO emp_data (name, email, salary, hireDate) VALUES ('$name', '$email', '$salary', '$hireDate')";

    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($salary) && !empty($hireDate)) {
        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully.";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    } else {
        echo "Please fill up all fields.";
    }
}
// // Update data (Example)
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];
    $sql = "UPDATE emp_data SET name = '$newName', email = '$newEmail' WHERE id = $id";
    $conn->query($sql);
}

// // Delete data (Example)
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM emp_data WHERE id = $id";
    $conn->query($sql);
}

// // Fetch data to display in the table
$result = $conn->query("SELECT * FROM emp_data");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px 12px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Employee Management</h1>

    <!-- Form for Insert -->
    <h2>Add New Employee</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="salary" placeholder="Salary" required>
        <input type="date" name="hireDate" placeholder="Hire Date" required>
        <button type="submit" name="insert">Insert</button>
    </form>

    <!-- Form for Update -->
    <h2>Update Employee</h2>
    <form method="POST">
        <input type="number" name="id" placeholder="ID" required>
        <input type="text" name="name" placeholder="New Name" required>
        <input type="email" name="email" placeholder="New Email" required>
        <input type="text" name="salary" placeholder="Enter Your Salary" required>
        <input type="date" name="hireDate" placeholder="Enter Your Hire Date" required>
        <button type="submit" name="update">Update</button>
    </form>

    <!-- Form for Delete -->
    <h2>Delete Employee</h2>
    <form method="POST">
        <input type="number" name="id" placeholder="ID" required>
        <button type="submit" name="delete">Delete</button>
    </form>

    <!-- Display Data in Table -->
    <h2>Employee List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
            <th>Hire Date</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['salary']}</td>
                    <td>{$row['hireDate']}</td>
                    <td>
                <button onclick='location.href=\"/Includs/insert.php?id={$row['id']}\"'>Insert</button>
                <button onclick='location.href=\"/includes/update.php?id={$row['id']}\"'>Update</button>
                <button onclick='location.href=\"delete.php?id={$row['id']}\"'>Delete</button>
            </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No emp_data found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
