<?php
if (session_status() === PHP_SESSION_NONE) {
    // Start the session
    session_start();
}
include "dbconn.php";

if ($_SESSION['username'] == "student") {
    // Fetch student data based on session email
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM student WHERE email='$email'";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

    // Check if student data is found
    if (mysqli_num_rows($result) > 0) {
        // Fetch student data
        $studentData = mysqli_fetch_assoc($result);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Sidebar</title>
    <style>
        .full-height {
            height: 90vh;
        }
    </style>
</head>

<body>
    <div class="col-2 bg-light p-3 full-height">
        <ul class="list-unstyled">
            <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'student' && isset($studentData)): ?>
                <img src="<?php echo isset($studentData['pic']) ? $studentData['pic'] : 'C:\Users\abdul\Desktop\UNI DATA\Softwares\XAMP\htdocs\Study.com\profile_pics\male.svg'; ?>"
                    alt="Student Image" height="100px" width="100px" class="rounded">
                <a href="attendance.php">
                    <li>View Attendance</li>
                </a>
                <br>
                <a href="grades.php">
                    <li>View Grades</li>
                </a>
                <br>
                <a href="student_update.php">
                    <li>Update Personal Details</li>
                </a>
                <br>
            <?php elseif (isset($_SESSION['username']) && $_SESSION['username'] == 'faculty'): ?>
                <a href="take_attendance.php">
                    <li>Take Attendance</li>
                </a>
                <br>
                <a href="manage_attendance.php">
                    <li>Manage Attendance Records</li>
                </a>
                <br>
                <a href="student_list.php">
                    <li>View Student List</li>
                </a>
                <br>
                <a href="grade_assignments.php">
                    <li>Grade Assignments</li>
                </a>
                <br>
            <?php elseif (isset($_SESSION['username']) && $_SESSION['username'] == 'admin'): ?>
                <a href="attendance_reports.php">
                    <li>View Attendance Reports</li>
                </a>
                <br>
                <a href="grade_records.php">
                    <li>Access Grade Records</li>
                </a>
                <br>
                <a href="manage_courses.php">
                    <li>Manage Course Catalog</li>
                </a>
                <br>
                <a href="assign_instructors.php">
                    <li>Assign Instructors</li>
                </a>
                <br>
                <a href="manage_users.php">
                    <li>Manage User Accounts</li>
                </a>
                <br>
                <a href="view_users.php">
                    <li>View User Lists</li>
                </a>
                <br>
            <?php endif; ?>
        </ul>
    </div>
</body>

</html>