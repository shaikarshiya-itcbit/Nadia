<?php
// Establishing connection to the database
$con = new mysqli("localhost", "root", "", "delisheats");

// Check for connection errors
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Query to select all records from the orders table
$result = $con->query("SELECT * FROM orders");

// Check if the query executed successfully
if ($result) {
    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Output table header
        echo "<table border='1'>";
        echo "<tr><th>Email</th><th>Number</th><th>Food Name</th><th>Address</th></tr>";

        // Loop through each row and display order details
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["number"] . "</td>";
            echo "<td>" . $row["food_name"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
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
