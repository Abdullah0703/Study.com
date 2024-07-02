<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Signup</title>
</head>

<body>
    <?php include "header.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <div
                class="container d-flex justify-content-center align-items-center flex-column border border-2 rounded-4 w-75 h-75 p-5 my-5 col-md-9">
                <div>
                    <h1>Sign Up</h1>
                    <form id="student-form" style="display: none;">
                        <h2>Student Signup</h2>
                        <div class="form-group">
                            <label for="student_id">Student ID:</label>
                            <input type="text" class="form-control" id="student_id" name="student_id">
                        </div>
                        <div class="form-group">
                            <label for="s_first_name">First Name:</label>
                            <input type="text" class="form-control" id="s_first_name" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="s_last_name">Last Name:</label>
                            <input type="text" class="form-control" id="s_last_name" name="last_name">
                        </div>
                        <div class="form-group">
                            <label for="s_address">Address:</label>
                            <input type="text" class="form-control" id="s_address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="s_dob">DOB:</label>
                            <input type="date" class="form-control" id="s_dob" name="dob">
                        </div>
                        <div class="form-group">
                            <label for="s_email">Email:</label>
                            <input type="email" class="form-control" id="s_email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="s_contact">Contact:</label>
                            <input type="text" class="form-control" id="s_contact" name="contact">
                        </div>
                        <div class="form-group">
                            <label for="s_dept_id">Department ID:</label>
                            <input type="text" class="form-control" id="s_dept_id" name="dept_id">
                        </div>s_
                        <div class="form-group">
                            <label for="s_gender">Gender:</label>
                            <select class="form-control" id="s_gender" name="gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="s_status">Status:</label>
                            <input type="text" class="form-control" id="s_status" name="status">
                        </div>
                        <div class="form-group">
                            <label for="s_password">Password:</label>
                            <input type="password" class="form-control" id="s_password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="pic">Pic:</label>
                            <input type="file" class="form-control-file" id="pic" name="pic">
                        </div>
                        <button type="submit" class="btn btn-primary" id="student-signup">Student Signup</button>
                    </form>
                </div>
                <div>
                    <form id="faculty-form" style="display: none;">
                        <h2>Faculty Signup</h2>
                        <div class="form-group">
                            <label for="faculty_id">Faculty ID:</label>
                            <input type="text" class="form-control" id="faculty_id" name="faculty_id">
                        </div>
                        <div class="form-group">
                            <label for="f_first_name">First Name:</label>
                            <input type="text" class="form-control" id="f_first_name" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="f_last_name">Last Name:</label>
                            <input type="text" class="form-control" id="f_last_name" name="last_name">
                        </div>
                        <div class="form-group">
                            <label for="f_contact">Contact:</label>
                            <input type="text" class="form-control" id="f_contact" name="contact">
                        </div>
                        <div class="form-group">
                            <label for="f_email">Email:</label>
                            <input type="email" class="form-control" id="f_email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="f_dept_id">Department ID:</label>
                            <input type="text" class="form-control" id="f_dept_id" name="dept_id">
                        </div>
                        <div class="form-group">
                            <label for="f_status">Status:</label>
                            <input type="text" class="form-control" id="f_status" name="status">
                        </div>
                        <div class="form-group">
                            <label for="f_password">Password:</label>
                            <input type="password" class="form-control" id="f_password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary" id="faculty-signup">Faculty Signup</button>
                    </form>
                </div>
                <div class="form-group">
                    <label for="user-type">Select User Type:</label>
                    <select class="form-control" id="user-type">
                        <option value="student">Student</option>
                        <option value="faculty">Faculty</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#user-type").change(function () {
                var userType = $(this).val();
                if (userType === "student") {
                    $("#student-signup-form").show();
                    $("#faculty-signup-form").hide();
                } else if (userType === "faculty") {
                    $("#student-signup-form").hide();
                    $("#faculty-signup-form").show();
                }
            });
            // Student Signup
            $("#student-form").submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: 'signup_student.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert(response);
                        $("#student-form")[0].reset(); // Reset form
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            });

            // Faculty Signup
            $("#faculty-form").submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: 'signup_faculty.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert(response);
                        $("#faculty-form")[0].reset(); // Reset form
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>

</html>