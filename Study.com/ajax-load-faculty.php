<?php
session_start();
include "dbconn.php";
$email = $_SESSION['email'];
$sql = "SELECT * FROM faculty WHERE email='$email'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "
        <p><strong>Faculty ID:</strong> {$row['FACULTY_ID']}</p>
        <p><strong>Email:</strong> {$row['EMAIL']}</p>
        <p><strong>Contact:</strong> {$row['CONTACT']}</p>
        <p><strong>Department ID:</strong> {$row['DEPT_ID']}</p>";
    }
    mysqli_close($conn);
    echo $output;
} else {
    echo "<h2>No Record Found.</h2>";
}
?>