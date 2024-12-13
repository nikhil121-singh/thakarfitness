<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adminenquiry.css">
</head>
<body>
    <div class="header">
        <h1>Admin Panel - Enquiries</h1>
    </div>

    <div class="container">
        <h2>Submitted Enquiries</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Mobile</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'fetch_enquiries.php'; ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 Thakar Fitness. All rights reserved.</p>
    </footer>
</body>
</html>
