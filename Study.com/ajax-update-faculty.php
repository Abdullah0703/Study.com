<?php
session_start();
include "dbconn.php";

// Check if the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'student') {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit;
}

// Retrieve the email of the logged-in student
$email = $_SESSION['email'];

// Retrieve form data sent via POST
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contact = $_POST['contact'];
$password = $_POST['password'];

// Update the student's information in the database, including password
$update_sql = "UPDATE faculty SET FIRSTNAME='$firstname', LASTNAME='$lastname',  CONTACT='$contact', password='$password' WHERE EMAIL='$email'";

if ($conn->query($update_sql) === TRUE) {
    // Return success message if update is successful
    echo "Profile updated successfully!";
} else {
    // Return error message if update fails
    echo "Error updating profile: " . $conn->error;
}

// Close the database connection
$conn->close();
?>