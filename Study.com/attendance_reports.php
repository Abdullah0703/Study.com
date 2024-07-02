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
                <h1>Attendance Report</h1>
                <table id="attendance-table" class="table table-hover ">
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            function loadAttendance() {
                $.ajax({
                    url: "ajax-load-adAttendance.php",
                    type: "POST",
                    success: function (data) {
                        $("#attendance-table").html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
            loadAttendance();
        });
    </script>

</body>

</html>