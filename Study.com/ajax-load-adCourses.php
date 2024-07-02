<?php
session_start();
include "dbconn.php";
$sql = "SELECT * FROM course";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output .= "
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Dept ID</th>
            <th>Credit Hour</th>
         
        </tr>
    </thead>
    ";
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
            <td>{$row['COURSE_ID']}</td>
            <td>{$row['COURSENAME']}</td>
            <td>{$row['DEPT_ID']}</td>
            <td>{$row['CREDIT']}</td>
            <td>
                <button class='btn btn-primary edit-btn-c' data-eid='{$row['COURSE_ID']}'>Edit</button>
            </td>
            <td>
                <button class='btn btn-primary delete-btn-c' data-id='{$row['COURSE_ID']}'>Delete</button>
            </td>
        </tr>";
    }
    mysqli_close($conn);
    echo $output;
} else {
    echo "<tr><td colspan='8'><h2>No Record Found.</h2></td></tr>";
}
?>