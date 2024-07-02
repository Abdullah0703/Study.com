<?php
session_start(); // Start the session to access session variables
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
$sql = "SELECT * FROM faculty WHERE email='$email'";
// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    // Fetch the student's data
    $facultyData = $result->fetch_assoc();
} else {
    // Handle the case where student data is not found
    echo "Faculty data not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Student</title>
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
                <div id="updateForm">
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <h1>Update Profile</h1>
                            <form id="updateStudentForm" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="firstname">First Name:</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                        value="<?php echo $studentData['FIRSTNAME']; ?>" autocomplete="given-name">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name:</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                        value="<?php echo $studentData['LASTNAME']; ?>" autocomplete="family-name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?php echo $studentData['EMAIL']; ?>" readonly autocomplete="email">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact:</label>
                                    <input type="text" class="form-control" id="contact" name="contact"
                                        value="<?php echo $studentData['CONTACT']; ?>" autocomplete="tel">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="text" name="password" id="password" class="form-control"
                                        value="<?php echo $studentData['password']; ?>" autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
                                <button type="button" class="btn btn-primary" id="backBtn">Back</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#backBtn').click(function () {
                window.location.replace('Student.php');
            });

            // Update student profile via AJAX
            $('#updateStudentForm').submit(function (event) {
                event.preventDefault(); // Prevent the form from submitting normally

                var formData = new FormData($(this)[0]); // Get form data

                $.ajax({
                    url: 'ajax-update-faculty.php',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Handle success response
                        alert(response);
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>