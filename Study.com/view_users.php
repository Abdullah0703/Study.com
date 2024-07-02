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
    <title>View Users</title>
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
                    <thead>
                        <tr id="tableHeader"></tr>
                    </thead>
                    <tbody id="tableBody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#loadStudents").click(function () {
                loadTable("student");
            });

            $("#loadFaculties").click(function () {
                loadTable("faculty");
            });

            function loadTable(userType) {
                $.ajax({
                    url: "fetch_users.php",
                    type: "POST",
                    data: { user_type: userType },
                    dataType: "json",
                    success: function (data) {
                        // Clear existing table content
                        $("#tableHeader").empty();
                        $("#tableBody").empty();

                        // Populate table headers
                        var headerRow = $("#tableHeader");
                        $.each(data.columns, function (index, column) {
                            headerRow.append("<th>" + column + "</th>");
                        });

                        // Populate table body
                        var body = $("#tableBody");
                        $.each(data.data, function (index, user) {
                            var row = $("<tr></tr>");
                            $.each(data.columns, function (index, column) {
                                row.append("<td>" + user[column] + "</td>");
                            });
                            body.append(row);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    </script>
</body>

</html>