<?php

// Check if STUDENT_ID is set in the $_POST array
if (isset($_POST["id"])) {
  $student_id = $_POST["id"];

  include "dbconn.php";

  // Construct the SQL query
  $sql = "SELECT * FROM student WHERE STUDENT_ID = '{$student_id}'";


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
            <td>Email:</td>
              <td>
                <input type='text' id='edit-email' value='{$row["EMAIL"]}'>
                <input type='text' id='edit-id' hidden value='{$row["STUDENT_ID"]}'>
              </td>
            </tr>
            <tr>
              <td>First Name:</td>
              <td>
                <input type='text' id='edit-fname' value='{$row["FIRSTNAME"]}'>
                <input type='text' id='edit-id' hidden value='{$row["STUDENT_ID"]}'>
              </td>
            </tr>
            <tr>
              <td>Last Name</td>
              <td><input type='text' id='edit-lname' value='{$row["LASTNAME"]}'></td>
            </tr>
            <tr>
              <td>Contact</td>
              <td><input type='text' id='edit-contact' value='{$row["CONTACT"]}'></td>
            </tr>
            <tr>
              <td>Address</td>
              <td><input type='text' id='edit-addr' value='{$row["ADDRESS"]}'></td>
            </tr>
            <tr>
              <td>DOB</td>
              <td><input type='text' id='edit-dob' value='{$row["DOB"]}'></td>
            </tr>
            <tr>
              <td>Dept ID</td>
              <td><input type='text' id='edit-dept_ID' value='{$row["DEPT_ID"]}'></td>
            </tr>
            <tr>
              <td>Gender</td>
              <td><input type='text' id='edit-gender' value='{$row["GENDER"]}'></td>
            </tr>
            <tr> 
              <td>Password</td>
              <td><input type='text' id='edit-pass' value='{$row["password"]}'></td>
            </tr>
            <tr> 
              <td>Status</td>
              <td><input type='text' id='edit-status' value='{$row["STATUS"]}'></td>
            </tr>
            <tr>
              <td></td>
              <td><input type='submit' id='edit-submit' value='save'></td>
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
  echo "Error: STUDENT_ID is not set in the POST array.";
}

?>