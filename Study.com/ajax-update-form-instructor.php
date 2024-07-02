<?php
$course_id = $_POST["id"];
$courseName = $_POST["course_name"];
$credit = $_POST["credit"];
$dept_id = $_POST["dept_id"];
$faculty_id = $_POST["faculty_id"];

$conn = mysqli_connect("localhost", "root", "", "study") or die("Connection Failed");

$sql = "UPDATE course SET COURSENAME = '{$courseName}', CREDIT = '{$credit}', DEPT_ID = '{$dept_id}', 
        Faculty_ID = '{$faculty_id}' WHERE COURSE_ID = '{$course_id}'";

if (mysqli_query($conn, $sql)) {
    echo 1; // If update successful
} else {
    echo 0; // If update failed
}
?>