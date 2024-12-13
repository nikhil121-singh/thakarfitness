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

// Delete admin
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM admins WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Admin deleted successfully!');
            window.location.href = 'adminsidepanel.html';
        </script>";
    } else {
        echo "<script>
            alert('Error deleting admin.');
            window.location.href = 'adminsidepanel.html';
        </script>";
    }

    $stmt->close();
}

$conn->close();
?>
