<?php
unset($_SESSION['admin']);
unset($_SESSION['Name']);
unset($_SESSION['ID']);
unset($_SESSION['Email']);
unset($_SESSION['Password']);

session_destroy();
header("location:login.html");
?>