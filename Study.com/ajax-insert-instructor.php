<?php
include "dbconn.php";

if (isset($_POST['course_name']) && isset($_POST['course_id']) && isset($_POST['course_dept']) && isset($_POST['course_credit'])) {
    $courseName = $_POST['course_name'];
    $courseID = $_POST['course_id'];
    $courseDept = $_POST['course_dept'];
    $courseCredit = $_POST['course_credit'];
    // Assuming Faculty ID is passed from the form or generated dynamically
    $facultyID = $_POST['faculty_id']; // Adjust this line based on your form

    // Connect to your database
    $conn = mysqli_connect("localhost", "root", "", "study");

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query to insert the new course into the database
    $sql = "INSERT INTO course (COURSENAME, COURSE_ID, CREDIT, DEPT_ID, Faculty_ID) 
            VALUES ('$courseName', '$courseID', '$courseCredit', '$courseDept', '$facultyID')";

    if (mysqli_query($conn, $sql)) {
        echo 1; // Return 1 if the course is inserted successfully
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn); // Display detailed error message
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo 0; // Return 0 if any required field is not set in the POST request
}
?>