<?php
session_start();
include "dbconn.php";
$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output .= "
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
            <th>DOB</th>
            <th>Dept ID</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Password</th>
        </tr>
    </thead>
    ";
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
            <td>{$row['STUDENT_ID']}</td>
            <td>{$row['FIRSTNAME']} {$row['LASTNAME']}</td>
            <td>{$row['EMAIL']}</td>
            <td>{$row['CONTACT']}</td>
            <td>{$row['ADDRESS']}</td>
            <td>{$row['DOB']}</td>
            <td>{$row['DEPT_ID']}</td>
            <td>{$row['GENDER']}</td>
            <td>{$row['STATUS']}</td>
            <td>{$row['password']}</td>
            <td>
                <button class='btn btn-primary edit-btn' data-eid='{$row['STUDENT_ID']}'>Edit</button>
            </td>
            <td>
                <button class='btn btn-primary delete-btn' data-id='{$row['STUDENT_ID']}'>Delete</button>
            </td>
        </tr>";
    }
    mysqli_close($conn);
    echo $output;
} else {
    echo "<tr><td colspan='8'><h2>No Record Found.</h2></td></tr>";
}
?>