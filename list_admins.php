<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'project_gym';

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all admins
$sql = "SELECT id, username, password FROM admins";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['username']}</td>
            <td>{$row['password']}</td>
            <td>
                <form action='delete_admin.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <button type='submit' onclick='return confirm(\"Are you sure you want to delete this admin?\");'>Delete</button>
                </form>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No admins found</td></tr>";
}

$conn->close();
?>
