<?php
session_start();
session_unset();
session_destroy();
session_start();

$conn = new mysqli("localhost", "root", "", "study") or die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
  if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = substr($username, 0, 1);
    if ($user == "a" || $user == "A") {
      $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $_SESSION['username'] = "admin";
        header("Location: Admin.php");
        exit;
      } else {
        $error_message = "Invalid username or password";
      }
    } elseif ($user == "K" || $user == "k") {
      $sql = "SELECT * FROM Student WHERE email='$username' AND password='$password' AND status ='1'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $_SESSION['username'] = "student";
        $studentData = $result->fetch_assoc();
        // Store the student's email in the session
        $_SESSION['email'] = $studentData['EMAIL'];
        header("Location: Student.php");
        exit;
      } else {
        $error_message = "Invalid username or password";
      }
    } elseif ($user == "f" || $user == "F") {
      $sql = "SELECT * FROM Faculty WHERE email='$username' AND password='$password' AND status ='1'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $_SESSION['username'] = "faculty";
        $facultyData = $result->fetch_assoc();
        //storing the faculty email here
        $_SESSION['email'] = $facultyData['EMAIL'];
        header("Location: Faculty.php");
        exit;
      } else {
        $error_message = "Invalid username or password";
      }
    } else {
      $error_message = "Invalid user type";
    }
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
  header('location: Signup.php');
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <?php include "header.php"; ?>
  <divs
    class="container d-flex justify-content-center align-items-center flex-column border border-2 rounded-4 w-75 h-75 p-5 my-5">
    <h2>Login</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username"
          autocomplete="username">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"
          autocomplete="current-password">
      </div>
      <button type="submit" class="btn btn-primary" name="login">Login</button>
      <button type="submit" class="btn btn-primary" name="signup">Sign-Up</button>
    </form>
    <?php if (isset($error_message))
      echo "<p style='color:red;'>$error_message</p>"; ?>
    </div>


</body>

</html>