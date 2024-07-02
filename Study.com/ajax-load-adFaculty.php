<?php
session_start();
include "dbconn.php";
$sql = "SELECT * FROM faculty";
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
            <th>Dept ID</th>
            <th>Status</th>
            <th>Password</th>
        </tr>
    </thead>
    ";
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
            <td>{$row['FACULTY_ID']}</td>
            <td>{$row['FIRSTNAME']} {$row['LASTNAME']}</td>
            <td>{$row['EMAIL']}</td>
            <td>{$row['CONTACT']}</td>
            <td>{$row['DEPT_ID']}</td>
            <td>{$row['STATUS']}</td>
            <td>{$row['password']}</td>
            <td>
                <button class='btn btn-primary edit-btn-f' data-eid='{$row['FACULTY_ID']}'>Edit</button>
            </td>
            <td>
                <button class='btn btn-primary delete-btn-f' data-id='{$row['FACULTY_ID']}'>Delete</button>
            </td>
        </tr>";
    }
    mysqli_close($conn);
    echo $output;
} else {
    echo "<tr><td colspan='8'><h2>No Record Found.</h2></td></tr>";
}
?>