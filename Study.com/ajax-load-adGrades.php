<?php
session_start();
include "dbconn.php";
$sql = "SELECT * FROM transcript";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output .= "
    <thead>
        <tr> 
            <th>Student ID</th>
            <th>Course ID</th>
            <th>Grade</th>
            
        </tr>
    </thead>
    ";
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
            
            <td>{$row['STUDENT_ID']}</td>
            <td>{$row['COURSE_ID']}</td>
            <td>{$row['GRADE']}</td>
            <td>
                <button class='btn btn-primary edit-btn-c' data-eid='{$row['STUDENT_ID']}'>Edit</button>
            </td>
            <td>
                <button class='btn btn-primary delete-btn-c' data-id='{$row['STUDENT_ID']}'>Delete</button>
            </td>
        </tr>";
    }
    mysqli_close($conn);
    echo $output;
} else {
    echo "<tr><td colspan='8'><h2>No Record Found.</h2></td></tr>";
}
?>