<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adminpanel.css">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: white;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            height: 50px;
            margin-right: 10px;
        }

        .header-buttons {
            display: flex;
            gap: 10px;
        }

        .header-buttons a {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #e1bc17;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .header-buttons a:hover {
            background-color: #000;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo-container">
            <img src="./photo/WhatsApp_Image_2024-08-27_at_19.22.58_285a632b-removebg-preview.ico" alt="Admin Logo" class="logo">
            <h1>Admin Panel</h1>
        </div>
        <div class="header-buttons">
            <a href="admin.php">View Entries</a>
        </div>
    </header>

    <main class="container">
        <h2>Manage Admins</h2>
        <form action="adminpanel.php" method="POST" class="add-admin-form">
            <h3>Add New Admin</h3>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter admin username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter admin password" required>
            </div>
            <button type="submit" class="add-button">Add Admin</button>
        </form>

        <hr>

        <!-- List of Admins -->
        <h3>Current Admins</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'list_admins.php'; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-left">
                <p>&copy; 2004 Thakar Fitness. All rights reserved.</p>
            </div>

            <div class="footer-center">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>

            <div class="footer-right">
                <p>Contact: +91 9574051010</p>
                <p>Email: thakarfitness55@gmail.com</p>
            </div>
        </div>
    </footer>
</body>
</html>
