<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_gym";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    $delete_sql = "DELETE FROM enquiry WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param('i', $delete_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch all enquiries
$sql = "SELECT id, first_name, last_name, age, mobile, created_at FROM enquiry";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiries</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #d4fc79, #96e6a1);
            color: #333;
        }
        .container {
            width: 90%;
            margin: 40px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 3em;
            color: #444;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2em;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow: hidden;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: center;
            font-size: 1em;
            color: #333;
        }
        th {
            background: #f4f4f4;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr {
            transition: background-color 0.2s;
        }
        tr:nth-child(even) {
            background-color: #f7f7f7;
        }
        tr:hover {
            background-color: #e0ffe0;
        }
        td:hover {
            background-color: #c9f5c9;
            cursor: pointer;
        }
        .cancel-button {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #ff4d4d;
            color: white;
            font-weight: bold;
            text-decoration: none;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        .cancel-button:hover {
            box-shadow: 0 0 10px 2px rgba(255, 77, 77, 0.8);
            transform: scale(1.1);
        }
        .delete-button {
            padding: 5px 10px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .delete-button:hover {
            background-color: #ff1a1a;
        }
    </style>
</head>
<body>
    <a href="adminsidepanel.php" class="cancel-button">Cancel</a>
    <h1>Thakar Fitness</h1>
    <div class="container">
        <h2>Enquiries Received</h2>
        <form method="POST" action="">
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Mobile</th>
                    <th>Submission Date</th>
                    <th>Action</th>
                </tr>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['age']); ?></td>
                            <td><?php echo htmlspecialchars($row['mobile']); ?></td>
                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                            <td>
                                <button type="submit" name="delete_id" value="<?php echo $row['id']; ?>" class="delete-button">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No enquiries found.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </form>
    </div>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
