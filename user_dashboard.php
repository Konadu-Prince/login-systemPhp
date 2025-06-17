<?php
session_start();

// Redirect if not logged in or not a regular user
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.html");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <nav>
        <a href="user_dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </nav>

    <main>
        <h1>👋 Welcome, <?php echo $username; ?>!</h1>
        <p>This is your personal dashboard.</p>

        <section>
            <h3>Your Options</h3>
            <ul>
                <li><a href="#">Edit Profile</a></li>
                <li><a href="#">View Reports</a></li>
                <li><a href="#">Submit Feedback</a></li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 SecureWeb App</p>
    </footer>
</body>
</html>
