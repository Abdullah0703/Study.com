<?php
// Check if the ID is set in the POST request
if (isset($_POST["id"])) {
    $student_id = $_POST["id"];

    $conn = mysqli_connect("localhost", "root", "", "study") or die("Connection Failed");

    $sql = "DELETE FROM student WHERE STUDENT_ID = $student_id";

    if (mysqli_query($conn, $sql)) {
        // If deletion is successful, return 1
        echo 1;
    } else {
        // If deletion fails, return 0
        echo 0;
    }
} else {
    // If ID is not set in the POST request, return an error message
    echo "Error: Student ID not provided";
}
?>