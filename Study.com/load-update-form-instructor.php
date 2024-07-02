<?php

// Check if COURSE_ID is set in the $_POST array
if (isset($_POST["id"])) {
    $course_id = $_POST["id"];

    include "dbconn.php";

    // Construct the SQL query
    $sql = "SELECT * FROM course WHERE COURSE_ID = '{$course_id}'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query executed successfully
    if ($result) {
        // Check if any rows are returned
        if (mysqli_num_rows($result) > 0) {
            $output = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $output .= "
            <tr>
            <td>Course Name:</td>
              <td>
                <input type='text' id='edit-course-name' value='{$row["COURSENAME"]}'>
                <input type='text' id='edit-id' hidden value='{$row["COURSE_ID"]}'>
              </td>
            </tr>
            <tr>
              <td>Credit:</td>
              <td>
                <input type='text' id='edit-credit' value='{$row["CREDIT"]}'>
              </td>
            </tr>
            <tr>
              <td>Dept ID:</td>
              <td>
                <input type='text' id='edit-dept-ID' value='{$row["DEPT_ID"]}'>
              </td>
            </tr>
            <tr>
              <td>Faculty ID</td>
              <td>
                <input type='text' id='edit-faculty-ID' value='{$row["Faculty_ID"]}'>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input type='submit' id='edit-submit' value='Save'></td>
            </tr>";
            }
            echo $output;
        } else {
            echo "<h2>No Record Found.</h2>";
        }
    } else {
        echo "Error: " . mysqli_error($conn); // Display SQL error message
    }

    // Close the connection
    mysqli_close($conn);
} else {
    echo "Error: COURSE_ID is not set in the POST array.";
}

?>