<?php
// Establishing connection to the database
$con = new mysqli("localhost", "root", "", "delisheats");

// Check for connection errors
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Query to select all records from the signin table
$result = $con->query("SELECT * FROM signin");

// Check if the query executed successfully
if ($result) {
    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Output table header
        echo "<table border='1'>";
        echo "<tr><th>Username</th><th>Password</th></tr>";

        // Loop through each row and display username and password
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "</tr>";
        }

        // Close the table
        echo "</table>";
    } else {
        echo "No records found";
    }
} else {
    // Display error if query execution fails
    echo "Error: " . $con->error;
}

// Close the database connection
$con->close();
?>

