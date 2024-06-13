<?php
// hi.php

// Start a session
session_start();

// Check if the session variable is not set
if (!isset($_SESSION['logged_in'])) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthInvesto - Find a Doctor</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #272727;">
    <header>
            <h1>HealthInvesto</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="logout.php">Sign Out</a></li>
                </ul>
            </nav>
    </header>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
            <section id="add">
                <h2>Add a Doctor</h2>
                <form action="add_doctor.php" method="POST">
                    <div class="row">
                    <div class="col">
                    <div class="form-group">
                        <label for="doctor_name">Doctor Name:</label>
                        <input type="text" id="doctor_name" name="doctor_name" placeholder="Enter doctor's name" required>
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        <label for="doctor_hospital">Hospital:</label>
                        <input type="text" id="doctor_hospital" name="doctor_hospital" placeholder="Enter hospital name" required>
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                    <div class="form-group">
                        <label for="doctor_specialization">Specialization:</label>
                        <input type="text" id="doctor_specialization" name="doctor_specialization" placeholder="Enter specialization" required>
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        <label for="consultation_date">Consultation Date:</label>
                        <input type="date" id="consultation_date" name="consultation_date" required>
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        <label for="consultation_time">Consultation Time:</label>
                        <input type="time" id="consultation_time" name="consultation_time" required>
                    </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block">Add Doctor</button>
                </form>
            </section>
    </div>
    </div>
    </div>

    <footer class="fixed-bottom text-white text-center py-2">
            <p>&copy; 2023 HealthInvesto</p>
    </footer>

    <script>
        // Function to parse URL parameters
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

        // Check if registrationSuccess parameter is true and display alert
        if (getParameterByName('registrationSuccess') === 'true') {
            alert("Doctor added successfully");
        }
    </script>    
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
