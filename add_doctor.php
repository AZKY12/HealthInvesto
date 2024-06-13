<?php
// add_doctor.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $doctor_name = $_POST["doctor_name"];
    $doctor_hospital = $_POST["doctor_hospital"];
    $doctor_specialization = $_POST["doctor_specialization"];
    $consultation_date = $_POST["consultation_date"];
    $consultation_time = $_POST["consultation_time"];

    // Connect to the database
    $conn = new mysqli("localhost", "id21903333_healthinvesto123", "HealthInvesto@123", "id21903333_healthinvesto");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to insert doctor details into the database
    $sql = "INSERT INTO doctors (name, hospital, specialization, consultation_date, consultation_time) VALUES ('$doctor_name', '$doctor_hospital', '$doctor_specialization', '$consultation_date', '$consultation_time')";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        header("Location: hi.php?registrationSuccess=true");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
