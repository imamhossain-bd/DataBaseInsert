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

// Fetch data to display in the table
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
        button {
            padding: 5px 10px;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <h1>Employee Management</h1>

    <!-- Links to Forms -->

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
                        <a href='Includes/insert.php?id={$row['id']}'><button>Insert</button></a>
                        <a href='Includes/update.php?id={$row['id']}'><button>Update</button></a>
                        <a href='Includes/delete.php?id={$row['id']}'><button>Delete</button></a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No employees found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
