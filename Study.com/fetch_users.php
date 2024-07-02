<?php
$conn = mysqli_connect("localhost", "root", "", "study");
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}

if (isset($_POST['user_type']) && ($_POST['user_type'] == 'student' || $_POST['user_type'] == 'faculty')) {
    $table_name = ($_POST['user_type'] == 'student') ? 'student' : 'faculty';

    // Query to fetch column names dynamically
    $sql_columns = "SHOW COLUMNS FROM $table_name";
    $result_columns = $conn->query($sql_columns);

    $columns = array();
    if ($result_columns->num_rows > 0) {
        while ($row = $result_columns->fetch_assoc()) {
            $columns[] = $row['Field']; // Store column names in an array
        }
    }

    // Query to fetch data from the specified table
    $sql_data = "SELECT * FROM $table_name";
    $result_data = $conn->query($sql_data);

    $users = array();
    if ($result_data->num_rows > 0) {
        while ($row = $result_data->fetch_assoc()) {
            $users[] = $row;
        }
    }
    echo json_encode(array('columns' => $columns, 'data' => $users));
} else {
    echo json_encode(array('error' => 'Invalid request'));
}

mysqli_close($conn);
?>