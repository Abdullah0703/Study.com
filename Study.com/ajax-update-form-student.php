<?php
$student_id = $_POST["id"];
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$contact = $_POST["contact"];
$address = $_POST["address"];
$dob = $_POST["dob"];
$dept_id = $_POST["dept_id"];
$gender = $_POST["gender"];
$password = $_POST["password"];
$status = $_POST["status"];
$email = $_POST["emailID"];

$conn = mysqli_connect("localhost", "root", "", "study") or die("Connection Failed");

$sql = "UPDATE student SET FIRSTNAME = '{$firstName}', LASTNAME = '{$lastName}', 
        ADDRESS = '{$address}', DOB = '{$dob}', EMAIL = '{$email}', 
        CONTACT = '{$contact}', DEPT_ID = '{$dept_id}', GENDER = '{$gender}', 
        STATUS = '{$status}', password = '{$password}' WHERE STUDENT_ID = '{$student_id}'";

if (mysqli_query($conn, $sql)) {
    echo 1; // If update successful
} else {
    echo 0; // If update failed
}
?>