<?php
session_start();

// Simulating user data (usually, you'd query this from a database)
$users = [
    '0112230815' => ['password' => '1234', 'name' => 'John Doe', 'nid' => '0112230815', 'email' => 'john@example.com'],
    '0112230816' => ['password' => '5678', 'name' => 'Jane Doe', 'nid' => '0112230816', 'email' => 'jane@example.com'],
];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nid = $_POST['NID'];
    $password = $_POST['password'];

    // Validate the login
    if (isset($users[$nid]) && $users[$nid]['password'] == $password) {
        // Start a session and store user data
        $_SESSION['user'] = $users[$nid];
        // Redirect to the profile page
        header("Location: profile.php");
        exit();
    } else {
        echo "Invalid credentials!";
    }
}
?>
