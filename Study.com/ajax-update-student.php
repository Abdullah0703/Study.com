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
$address = $_POST['address'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];
$password = $_POST['password'];

// Handle profile picture upload
if (isset($_FILES['profile_pic'])) {
    $file_name = $_FILES['profile_pic']['name'];
    $file_tmp = $_FILES['profile_pic']['tmp_name'];

    // Specify the upload directory
    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/Study.com/profile_pics/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Move the uploaded file to the upload directory
    move_uploaded_file($file_tmp, $upload_dir . $file_name);

    // Update the student's profile picture in the database
    $pic_url = $upload_dir . $file_name;
    $update_pic_sql = "UPDATE student SET pic='$pic_url' WHERE email='$email'";
    $conn->query($update_pic_sql);
}

// Update the student's information in the database, including password
$update_sql = "UPDATE student SET FIRSTNAME='$firstname', LASTNAME='$lastname', ADDRESS='$address', DOB='$dob', CONTACT='$contact', password='$password' WHERE EMAIL='$email'";

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