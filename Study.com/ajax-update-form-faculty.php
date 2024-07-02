<?php
$faculty_id = $_POST["id"];
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$contact = $_POST["contact"];
$dept_id = $_POST["dept_id"];
$password = $_POST["password"];
$status = $_POST["status"];
$email = $_POST["emailID"];

$conn = mysqli_connect("localhost", "root", "", "study") or die("Connection Failed");

$sql = "UPDATE faculty SET FIRSTNAME = '{$firstName}', LASTNAME = '{$lastName}', EMAIL = '{$email}', 
        CONTACT = '{$contact}', DEPT_ID = '{$dept_id}', STATUS = '{$status}', password = '{$password}' 
        WHERE FACULTY_ID = '{$faculty_id}'";

if (mysqli_query($conn, $sql)) {
    echo 1; // If update successful
} else {
    echo 0; // If update failed
}
?>