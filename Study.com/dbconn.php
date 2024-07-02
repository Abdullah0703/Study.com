<?php
$conn = mysqli_connect("localhost", "root", "", "study");
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}

?>