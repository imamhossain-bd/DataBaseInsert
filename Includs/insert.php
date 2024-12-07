<?php
    require("../main.php");
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert From</title>
    <link rel="stylesheet" href="insert.css">
</head>
<body>
    <section>
    <h2>Add New Employee</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="salary" placeholder="Salary" required>
            <input type="date" name="hireDate" placeholder="Hire Date" required>
            <button type="submit" name="insert">Insert</button>
        </form>
    </section>
</body>
</html>