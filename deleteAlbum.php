<?php
$id = $_GET['id2'];
include_once "phpConnection.php";
$query = "DELETE FROM album WHERE ID=$id";
$query2 = "DELETE FROM songs WHERE AlbumID=$id";
if ($con->query($query2)) {
    if ($con->query($query)) {
        echo ("Delete Done<br>");
        echo "<br>If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
        header("refresh:3;url=selectAll.php");
    }
}
else{echo ("Some problem happened :(");
	 echo "<br>If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
	header("refresh:3;url=selectAll.php");
	}

?>