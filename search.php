<?php
// search.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the search parameters
    $hospital = $_GET["hospital"];
    $specialization = $_GET["specialization"];
    $date = $_GET["date"];

    // Connect to the database
    $conn = new mysqli("localhost", "healthinvesto123", "HealthInvesto@123", "healthinvesto");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to retrieve doctors based on search parameters
    // $sql = "SELECT * FROM doctors WHERE hospital = '$hospital' AND specialization = '$specialization'";
    $sql = "SELECT * FROM doctors WHERE hospital = '$hospital' AND specialization = '$specialization' AND DATE_FORMAT(consultation_date, '%Y-%m-%d') = '$date'";


    // Execute SQL query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output search results
        $output = '';
        while ($row = $result->fetch_assoc()) {
            $output .= "<div class='doctor'>";
            $output .= "<h3>{$row['name']}</h3>";
            $output .= "<p><strong>Hospital:</strong> {$row['hospital']}</p>";
            $output .= "<p><strong>Specialization:</strong> {$row['specialization']}</p>";
            $output .= "<p><strong>Consultation Date:</strong> {$row['consultation_date']}</p>";
            $output .= "<p><strong>Consultation Time:</strong> {$row['consultation_time']}</p>";
            $output .= "</div>";
        }
        echo $output;
    } else {
        echo "No doctors found";
    }

    // Close database connection
    $conn->close();
}
?>
