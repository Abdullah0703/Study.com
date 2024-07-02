<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['attendance'])) {
        header("Location: attendance_reports.php");
        exit;
    } elseif (isset($_POST['grade'])) {
        header("Location: grade_records.php");
        exit;
    } elseif (isset($_POST['course'])) {
        header("Location: manage_courses.php");
        exit;
    } elseif (isset($_POST['instructor'])) {
        header("Location: assign_instructor.php");
        exit;
    } elseif (isset($_POST['account'])) {
        header("Location: manage_users.php");
        exit;
    } elseif (isset($_POST['users'])) {
        header("Location: view_users.php");
        exit;
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
    <title>Document</title>
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
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="attendance">Attendance
                                Report</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-3" name="grade">Grade
                                Records</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="course">Manage
                                Courses</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-3" name="instructor">Assign
                                Instructors</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="account">Manage
                                Users</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-3" name="users">View User
                                List</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>