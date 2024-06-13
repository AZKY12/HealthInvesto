<?php
// hospital_registration.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $id = $_POST["id"];
    $password = $_POST["password"];

    // Connect to the database
    $conn = new mysqli("localhost", "healthinvesto123", "HealthInvesto@123", "healthinvesto");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the hospitals table
    $sql = "INSERT INTO users (username, id, password) VALUES ('$username', '$id', '$password')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        header("Location: index.html?registrationSuccess=true");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
