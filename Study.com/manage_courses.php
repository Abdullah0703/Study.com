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
    <title>Manage Course</title>
</head>

<body>
    <?php include "header.php" ?>
    <div class="container-fluid">
        <div class="row">
            <?php include "sidebar.php"; ?>
            <div class="col-md-9">
                <form>
                    <button type="button" id="loadCourse" class="btn btn-primary ">Load Course</button>
                    <button type="button" id="showAddCourseFormBtn" class="btn btn-primary ">Add Course</button>
                </form>
                <div id="course-info">
                    <table id="course-table" class="table table-hover ">
                    </table>
                </div>
                <div id="add-course-div" style="display:none;">
                    <!-- Form for adding a new course -->
                    <form id="add-course-form">
                        <h2>Add new Course</h2>
                        <div class="mb-3">
                            <label for="course-name" class="form-label">Course ID:</label>
                            <input type="text" class="form-control" id="course-name" name="course-name">
                        </div>
                        <div class="mb-3">
                            <label for="course-name" class="form-label">Course Name:</label>
                            <input type="text" class="form-control" id="course-id" name="course-id">
                        </div>
                        <div class="mb-3">
                            <label for="course-name" class="form-label">Dept ID:</label>
                            <input type="text" class="form-control" id="course-dept" name="course-dept">
                        </div>
                        <div class="mb-3">
                            <label for="course-name" class="form-label">Credit Hour:</label>
                            <input type="text" class="form-control" id="course-credit" name="course-credit">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Course</button>
                    </form>
                </div>
            </div>
            <div id="message" class="alert" role="alert" style="display: none;"></div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            function loadCourses() {
                $.ajax({
                    url: "ajax-load-adCourses.php",
                    type: "POST",
                    success: function (data) {
                        $("#course-table").html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
            loadCourses();

            // Toggle visibility of the add course form
            $("#showAddCourseFormBtn").click(function () {
                $("#add-course-div").toggle();
                $("#course-info").toggle();
            });

            // Handle form submission for adding a new course
            $("#add-course-form").submit(function (e) {
                e.preventDefault(); // Prevent default form submission
                var courseName = $("#course-name").val();
                var courseID = $("#course-id").val();
                var courseDept = $("#course-dept").val();
                var courseCredit = $("#course-credit").val();

                console.log("Course Name:", courseName);
                console.log("Course ID:", courseID);
                console.log("Dept ID:", courseDept);
                console.log("Credit Hour:", courseCredit);

                $.ajax({
                    url: "ajax-insert-course.php",
                    type: "POST",
                    data: {
                        course_name: courseName,
                        course_ID: courseID,
                        course_dept: courseDept,
                        course_credit: courseCredit,
                    },
                    success: function (data) {
                        if (data == 1) {
                            loadCourses(); // Reload the course list
                            showMessage("success", "Course added successfully.");
                        } else {
                            showMessage("error", "Failed to add course.");
                        }
                    },
                    error: function (xhr, status, error) {
                        showMessage("error", "An error occurred while adding the course.");
                    }
                });
            });

            //Show Modal Box for updating the data of Course
            $(document).on("click", ".edit-btn", function () {
                $("#modal").show();
                $("#course-table").hide();
                var studentId = $(this).data("eid");
                $.ajax({
                    url: "load-update-form-instructor.php",
                    type: "POST",
                    data: { id: studentId },
                    success: function (data) {
                        $("#modal-form table").html(data);
                        $("#modal").show();
                    }
                })
            });
            // Save Update Form for Course
            $(document).on("click", "#edit-submit", function () {
                var courseId = $("#edit-id").val();
                var courseName = $("#edit-course-name").val();
                var credit = $("#edit-credit").val();
                var deptId = $("#edit-dept-ID").val();

                $.ajax({
                    url: "ajax-update-form-course.php",
                    type: "POST",
                    data: {
                        id: courseId,
                        course_name: courseName,
                        credit: credit,
                        dept_id: deptId,
                    },
                    success: function (data) {
                        if (data == 1) {
                            console.log(data);
                            $("#modal").hide();
                            loadTable();
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


            //Delete Records 
            $(document).on("click", ".delete-btn", function () {
                if (confirm("Do you really want to delete this record ?")) {
                    var studentId = $(this).data("id");
                    var element = this;
                    $.ajax({
                        url: "ajax-delete-course.php",
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

            // Function to show messages
            function showMessage(type, message) {
                $("#message").removeClass("alert-success alert-danger").addClass("alert-" + type).text(message).show();
            }
        });
    </script>
</body>

</html>