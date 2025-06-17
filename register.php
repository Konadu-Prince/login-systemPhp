<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Check if user exists
  $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
  $check->bind_param("s", $username);
  $check->execute();
  $check->store_result();

  if ($check->num_rows > 0) {
    echo "Username already exists.";
  } else {
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    echo "Registration successful. <a href='index.html'>Login now</a>";
  }
}
?>
