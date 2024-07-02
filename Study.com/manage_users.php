<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Manage Users</title>
</head>

<body>
    <?php include "header.php" ?>
    <div class="container-fluid">
        <div class="row">
            <?php include "sidebar.php"; ?>
            <div class="col-md-9">
                <form method="post">
                    <button type="button" id="loadStudents" class="btn btn-primary">Load Students</button>
                    <button type="button" id="loadFaculties" class="btn btn-primary">Load Faculties</button>
                </form>
                <table id="userTable" class="table table-hover">
                </table>
                <div id="error-message"></div>
                <div id="success-message"></div>
                <div id="modal">
                    <div id="modal-form">
                        <h2>Edit Form</h2>
                        <table id="edit-tbl" class="table table-hover">
                        </table>
                        <div id="close-btn">X</div>
                    </div>
                </div>
            </div>
            <div id="message" class="alert" role="alert" style="display: none;"></div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            function loadStudents() {
                $.ajax({
                    url: "ajax-load-adStudent.php",
                    type: "POST",
                    success: function (data) {
                        $("#userTable").html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            function loadFaculties() {
                $.ajax({
                    url: "ajax-load-adFaculty.php",
                    type: "POST",
                    success: function (data) {
                        $("#userTable").html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
            $("#loadStudents").on("click", loadStudents);
            $("#loadFaculties").on("click", loadFaculties);
            //show msg function
            function showMessage(type, message) {
                $("#message").removeClass("alert-success alert-danger").addClass("alert-" + type).text(message).show();
            }

            //Show Modal Box for updating the data of student
            $(document).on("click", ".edit-btn", function () {
                $("#modal").show();
                $("#userTable").hide();
                var studentId = $(this).data("eid");
                $.ajax({
                    url: "load-update-form-student.php",
                    type: "POST",
                    data: { id: studentId },
                    success: function (data) {
                        $("#modal-form table").html(data);
                        $("#modal").show();
                    }
                })
            });
            //Save Update Form for student
            $(document).on("click", "#edit-submit", function () {
                var stuId = $("#edit-id").val();
                var fname = $("#edit-fname").val();
                var lname = $("#edit-lname").val();
                var contact = $("#edit-contact").val();
                var addr = $("#edit-addr").val();
                var dob = $("#edit-dob").val();
                var deptId = $("#edit-dept_ID").val();
                var gender = $("#edit-gender").val();
                var password = $("#edit-pass").val();
                var email = $("#edit-email").val();
                var status = $("#edit-status").val();

                $.ajax({
                    url: "ajax-update-form-student.php",
                    type: "POST",
                    data: {
                        id: stuId,
                        first_name: fname,
                        last_name: lname,
                        contact: contact,
                        address: addr,
                        dob: dob,
                        dept_id: deptId,
                        gender: gender,
                        password: password,
                        emailID: email,
                        status: status,
                    },
                    success: function (data) {
                        if (data == 1) {
                            console.log(data);
                            $("#modal").hide();
                            loadStudents();
                            showMessage("success", "Data updated successfully.");
                        } else {
                            showMessage("error", "Failed to update data.");
                        }
                    },
                    error: function (xhr, status, error) {
                        showMessage("error", "An error occurred while updating data.");
                    }
                });
            });
            //Show Modal Box for updating the data of faculty
            $(document).on("click", ".edit-btn-f", function () {
                $("#modal").show();
                $("#userTable").hide();
                var facultyId = $(this).data("eid");
                $.ajax({
                    url: "load-update-form-faculty.php",
                    type: "POST",
                    data: { id: facultyId },
                    success: function (data) {
                        $("#modal-form table").html(data);
                        $("#modal").show();
                    }
                })
            });
            //Save Update Form for faculty
            $(document).on("click", "#edit-submit-f", function () {
                var facId = $("#edit-id").val();
                var fname = $("#edit-fname").val();
                var lname = $("#edit-lname").val();
                var contact = $("#edit-contact").val();
                var deptId = $("#edit-dept_ID").val();
                var password = $("#edit-pass").val();
                var email = $("#edit-email").val();
                var status = $("#edit-status").val();

                $.ajax({
                    url: "ajax-update-form-faculty.php",
                    type: "POST",
                    data: {
                        id: facId,
                        first_name: fname,
                        last_name: lname,
                        contact: contact,
                        dept_id: deptId,
                        password: password,
                        emailID: email,
                        status: status,
                    },
                    success: function (data) {
                        if (data == 1) {
                            console.log(data);
                            $("#modal").hide();
                            loadStudents();
                            showMessage("success", "Data updated successfully.");
                        } else {
                            showMessage("error", "Failed to update data.");
                        }
                    },
                    error: function (xhr, status, error) {
                        showMessage("error", "An error occurred while updating data.");
                    }
                });
            });
            //Hide Modal Box
            $("#close-btn").on("click", function () {
                $("#modal").hide();
                $("#userTable").show();
            });

            //Delete Records for student
            $(document).on("click", ".delete-btn", function () {
                if (confirm("Do you really want to delete this record ?")) {
                    var studentId = $(this).data("id");
                    var element = this;
                    $.ajax({
                        url: "ajax-delete-student.php",
                        type: "POST",
                        data: { id: studentId },
                        success: function (data) {
                            if (data == 1) {
                                $(element).closest("tr").fadeOut();
                            } else {
                                console.log(studentId);
                                $("#error-message").html("Can't Delete Record.").slideDown();
                                $("#success-message").slideUp();
                            }
                        }
                    });
                }
            });
            //Delete Records for faculty
            $(document).on("click", ".delete-btn-f", function () {
                if (confirm("Do you really want to delete this record ?")) {
                    var facId = $(this).data("id");
                    var element = this;
                    $.ajax({
                        url: "ajax-delete-faculty.php",
                        type: "POST",
                        data: { id: facId },
                        success: function (data) {
                            if (data == 1) {
                                $(element).closest("tr").fadeOut();
                            } else {
                                console.log(studentId);
                                $("#error-message").html("Can't Delete Record.").slideDown();
                                $("#success-message").slideUp();
                            }
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>