<?php
session_start();
include "dbconn.php";
$sql = "SELECT * FROM attendance";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output .= "
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Faculty ID</th>
            <th>Course ID</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    ";
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
            <td>{$row['STUDENT_ID']}</td>
            <td>{$row['FACULTY_ID']}</td>
            <td>{$row['COURSE_ID']}</td>
            <td>{$row['ATTENDANCE_DATE']}</td>
            <td>{$row['ATTENDANCE_STATUS']}</td>
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