<?php
// Database connection
$host = 'localhost'; // Replace with your database host
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$database = 'project_gym'; // Replace with your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete enquiries older than 15 days
$delete_sql = "DELETE FROM enquiry WHERE created_at < NOW() - INTERVAL 15 DAY";
$conn->query($delete_sql);

// Fetch remaining enquiries in descending order
$sql = "SELECT id, first_name, last_name, age, mobile, created_at FROM enquiry ORDER BY created_at DESC";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['age']}</td>
            <td>{$row['mobile']}</td>
            <td>{$row['created_at']}</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No enquiries found</td></tr>";
}

// Close connection
$conn->close();
?>
