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

// Add new admin
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; // Simple password storage (not secure)

    $sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "<script>
            window.location.href = 'adminsidepanel.php';
        </script>";
    } else {
        echo "<script>
            alert('Error adding admin.');
            window.location.href = 'adminsidepanel.php';
        </script>";
    }

    $stmt->close();
}

$conn->close();
?>
