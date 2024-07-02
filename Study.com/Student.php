<?php

session_start(); // Start the session to access session variables
// Include the database connection file
include "dbconn.php";
// Check if the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'student') {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit;
}

// Retrieve the email of the logged-in student
$email = $_SESSION['email'];

// Query to fetch the student's information
$sql = "SELECT * FROM student WHERE email='$email'";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    // Fetch the student's data
    $studentData = $result->fetch_assoc();
} else {
    // Handle the case where student data is not found
    echo "Student data not found.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php include "header.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include "sidebar.php"; ?>
            <div class="col-md-9">
                <form method="post">
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <h1>Welcome <?php echo $studentData['FIRSTNAME'] . " " . $studentData['LASTNAME'] ?></h1>
                            <div id="info-container" class="mt-5">
                            </div>
                            <button type="button" class="btn btn-primary" id="updateStudentBtn">Update Profile</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Function to redirect to studentupdate.php when the button is clicked
            $('#updateStudentBtn').click(function () {
                window.location.replace('student_update.php');
            });
            function loadTable() {
                $.ajax({
                    url: "ajax-load-student.php",
                    type: "POST",
                    success: function (data) {
                        $("#info-container").html(data);
                    }
                });
            }
            loadTable();
        });
    </script>
</body>

</html>