<!DOCTYPE html>
<html>
<head>
  <title>Log IN</title>
</head>
<body>
<?php
session_start();
$Email = $_POST['email'];
$Password = $_POST['your_pass'];

include_once "phpConnection.php";
$query = "SELECT * From user Where Email='$Email' and Password='$Password'";
$result = $con->query($query);
$user = $result->fetch_object();



if ($result && $result->num_rows == 1) {
  if ($user->Email == $Email && $user->Password == $Password) {
  //echo($user->ID);
    echo ("Welcome");
    $_SESSION['ID'] = $user->ID;
    $_SESSION['Name'] = $user->Name;
    $_SESSION['Email'] = $user->Email;
    $_SESSION['Password'] = $user->Password;
    if ($user->admin == 1)
      $_SESSION['admin'] = true;
    else
      $_SESSION['admin'] = false;
    echo "<div class='spinner-border text-success' role='status'>"
      . "<span class='sr-only'>Loading...</span>"
      . "</div>";
    header("refresh:3;url=Home.php");

  } else {
    echo ("Error Database");
    echo ("\n");
    header("refresh:3;url=login.html");
  }
} else {
  echo ("Email or Password invalid");
  echo ("\n");
  header("refresh:3;url=login.html");
}


?>
</body>
</html>
