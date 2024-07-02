<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $dept_id = $_POST["dept_id"];
    $gender = $_POST["gender"];
    $status = $_POST["status"];
    $password = $_POST["password"];

    $conn = mysqli_connect("localhost", "root", "", "study");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO student (STUDENT_ID, FIRSTNAME, LASTNAME, ADDRESS, DOB, EMAIL, CONTACT, DEPT_ID, GENDER, STATUS, password) 
            VALUES ('$student_id', '$first_name', '$last_name', '$address', '$dob', '$email', '$contact', '$dept_id', '$gender', '$status', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Student registered successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    header("Location: signup.php");
    exit();
}
?>