<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $faculty_id = $_POST["faculty_id"];
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $dept_id = $_POST["dept_id"];
    $status = $_POST["status"];
    $password = $_POST["password"];
    $conn = mysqli_connect("localhost", "root", "", "study") or die("Connection Failed");
    $sql = "INSERT INTO faculty (FACULTY_ID, FIRSTNAME, LASTNAME, CONTACT, EMAIL, DEPT_ID, STATUS, password) 
            VALUES ('$faculty_id', '$firstName', '$lastName', '$contact', '$email', '$dept_id', '$status', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Faculty signup successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request!";
}
?>