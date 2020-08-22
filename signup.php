<?php
session_start();
$Name = $_POST['name'];
$Email = $_POST['email'];
$Password = $_POST['pass'];

include_once "phpConnection.php";
  //$q = mysqli_query($con, "Insert Into user (Name, Email, Password, admin) values('$Name', '$Email', '$Password', '0')");
$query1 = "INSERT INTO user (Name, Email, Password, admin) values('$Name', '$Email', '$Password', '0')";
$query2 = "SELECT * From user Where Email='$Email' and Password='$Password'";
$result1 = $con->query($query1);
$result2 = $con->query($query2);
$user = $result2->fetch_object();

if ($result1) {
  echo ("Registration Done Successfully :)");
  $_SESSION['ID'] = $user->ID;
  $_SESSION['Name'] = $user->Name;
  $_SESSION['Email'] = $user->Email;
  $_SESSION['Password'] = $user->Password;
  if ($user->admin == 1)
    $_SESSION['admin'] = true;
  else
    $_SESSION['admin'] = false;
  header("refresh:3;url=Home.php");
} else {
  echo ("Registration Failed :(");
  header("refresh:3;url=signup.php");
}
?>