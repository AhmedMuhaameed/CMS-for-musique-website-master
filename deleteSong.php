<?php

$songId = $_GET['songId'];
$artistID = $_GET['artistID'];
$albumID = $_GET['albumID'];

include_once "phpConnection.php";
$query = "DELETE FROM songs WHERE ID=$songId;";
if ($con->query($query)) {
    echo ("Delete Done<br>");
    echo "<br>If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
    header("refresh:3;url=insertSong.php?artistID=$artistID&albumID=$albumID");
} else {
    echo ("Some problem happened :(");
    echo "<br>If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
    header("refresh:3;url=insertSong.php?artistID=$artistID&albumID=$albumID");
}
?>