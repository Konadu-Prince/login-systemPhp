<?php
// login.php
session_start();
require_once "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role === 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();
        } else {
            $error = "❌ Invalid password.";
        }
    } else {
        $error = "❌ User not found. <a href='register.html'>Register here</a>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <nav>
        <a href="index.html">Home</a>
        <a href="register.html">Register</a>
    </nav>

    <main>
        <h2>🔐 Login</h2>

        <?php if (!empty($error)): ?>
            <div class="error" style="color:red;"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post" action="login.php">
            <label for="username">Username:</label><br>
            <input type="text" name="username" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" required><br><br>

            <button type="submit">Login</button>
        </form>

        <p class="text-center mt-4">Not registered? <a href="register.html">Create an account</a></p>
    </main>

    <footer>
        <p>&copy; 2025 SecureWeb App</p>
    </footer>
</body>
</html>
