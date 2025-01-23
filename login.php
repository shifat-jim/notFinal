<?php
session_start();

// Simulated users database (For demo purposes)
$users = [
    '0112230815' => ['password' => '1234', 'name' => 'John Doe', 'email' => 'john@example.com'],
    '0112230816' => ['password' => '5678', 'name' => 'Jane Doe', 'email' => 'jane@example.com']
];

// Handle the login process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nid = $_POST['NID'];
    $password = $_POST['password'];

    // Check if the user exists in the simulated database
    if (isset($users[$nid]) && $users[$nid]['password'] === $password) {
        $_SESSION['user'] = $users[$nid]; // Store user info in session
        header("Location: profile.php"); // Redirect to profile page
        exit();
    } else {
        // If login failed, redirect back to login page with error
        header("Location: login.html?error=true");
        exit();
    }
}
?>
