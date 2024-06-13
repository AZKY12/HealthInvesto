<?php
// login.php

// Start a session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to the database
    $conn = new mysqli("localhost", "healthinvesto123", "HealthInvesto@123", "healthinvesto");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to retrieve user data
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    // Execute SQL statement
    $result = $conn->query($sql);

    // Check if a matching user is found
    if ($result->num_rows > 0) {
        // User is authenticated
        // Set session variable
        $_SESSION['logged_in'] = true;

        // Redirect to hi.php
        header("Location: hi.php");
        exit;
    } else {
        // Authentication failed
        echo "Invalid username or password";
    }

    // Close database connection
    $conn->close();
}
?>
