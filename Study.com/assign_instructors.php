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
    <title>Assign Instructor</title>
</head>

<body>
    <?php include "header.php" ?>
    <div class="container-fluid">
        <div class="row">
            <?php include "sidebar.php"; ?>
            <div class="col-md-9">
                <h1>Assign Instructor</h1>
                <table id="grade-table" class="table table-hover ">
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
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            function loadTable() {
                $.ajax({
                    url: "ajax-load-adInstructor.php",
                    type: "POST",
                    success: function (data) {
                        $("#grade-table").html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
            loadTable();

            //Show Modal Box for updating the data of student
            $(document).on("click", ".edit-btn", function () {
                $("#modal").show();
                $("#grade-table").hide();
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
            // Save Update Form for instructor
            $(document).on("click", "#edit-submit", function () {
                var courseId = $("#edit-id").val();
                var courseName = $("#edit-course-name").val();
                var credit = $("#edit-credit").val();
                var deptId = $("#edit-dept-ID").val();
                var facultyId = $("#edit-faculty-ID").val();

                $.ajax({
                    url: "ajax-update-form-instructor.php",
                    type: "POST",
                    data: {
                        id: courseId,
                        course_name: courseName,
                        credit: credit,
                        dept_id: deptId,
                        faculty_id: facultyId
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


        });
    </script>

</body>

</html>