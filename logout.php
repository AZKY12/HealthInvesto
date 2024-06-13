<?php
// logout.php

// Start a session
session_start();

// End the session
session_destroy();

// Redirect to login page
header("Location: index.html");
exit;
?>
