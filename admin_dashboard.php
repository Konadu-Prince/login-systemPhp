<?php
session_start();

// Redirect if not logged in or not admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.html");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <nav>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </nav>

    <main>
        <h1>👑 Welcome Admin, <?php echo $username; ?>!</h1>
        <p>You have access to all the controls.</p>

        <section>
            <h3>Admin Controls</h3>
            <ul>
                <li><a href="#">Manage Users</a></li>
                <li><a href="#">View Logs</a></li>
                <li><a href="#">Site Settings</a></li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 SecureWeb App</p>
    </footer>
</body>
</html>
