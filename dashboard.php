<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // redirect if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <nav >
    <a class="menu" href="#">Home</a>
    <a class="menu" href="#">Profile</a>
    <a class="menu" href="logout.php">Logout</a>
  </nav>

  <main>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h1>
    <p>This is your dashboard. You're officially logged in!</p>
    <p>Now you can...</p>
    <ul>
      <li>View your profile</li>
      <li>Access protected data</li>
      <li>Log out securely</li>
    </ul>
  </main>

  <footer>
    &copy; 2025 All rights reserved
  </footer>
</body>
</html>
