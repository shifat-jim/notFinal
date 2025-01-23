<?php
session_start();

// Simulated user data (this would normally be retrieved from a database)
$users = [
    '0112230815' => ['password' => '1234', 'name' => 'John Doe', 'email' => 'john@example.com'],
    '0112230816' => ['password' => '5678', 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nid = $_POST['NID'];
    $password = $_POST['password'];

    // Validate the login credentials
    if (isset($users[$nid]) && $users[$nid]['password'] === $password) {
        // Store user data in session
        $_SESSION['user'] = $users[$nid];
        // Redirect to profile page
        header("Location: profile.php");
        exit();
    } else {
        echo "Invalid credentials!";
    }
}
?>
