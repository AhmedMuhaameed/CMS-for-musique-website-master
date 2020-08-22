<?php
$id = $_GET['id2'];

include_once "phpConnection.php";
$query1 = "DELETE FROM artist WHERE ID=$id";
$query2 = "DELETE FROM songs WHERE ArtistID=$id";
$query3 = "DELETE FROM album WHERE 	ArtistID=$id";

if ($result = $con->query($query2)) {
    if ($result = $con->query($query3)) {
        if ($result = $con->query($query1)) {
            echo ("Delete Done<br>");
            echo "<br>If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
            header("refresh:3;url=selectAll.php");
        }
    }
}

echo ("Some problem happened :(");
echo "<br>If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
header("refresh:3;url=selectAll.php");


?>