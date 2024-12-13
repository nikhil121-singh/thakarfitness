<?php
session_start();

// Example database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'project_gym';

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to verify credentials
    $sql = "SELECT * FROM admins WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Successful login
        $_SESSION['username'] = $username;
        echo "<script>
            alert('Login successful!');
            window.location.href = 'adminsidepanel.php'; // Redirect to dashboard
        </script>";
    } else {
        // Login failed
        echo "<script>
            alert('Invalid username or password.');
            window.location.href = 'adminlogin.html';
        </script>";
    }

    $stmt->close();
}

$conn->close();
?>
