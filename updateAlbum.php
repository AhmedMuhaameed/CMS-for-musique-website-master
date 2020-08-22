<?php
$albumID = $_GET["id2"];
include_once "phpConnection.php";
$query = "SELECT * FROM album WHERE ID=$albumID";
$result = $con->query($query);
$Album = $result->fetch_object();


echo "<form action='updateAlbumOK.php?albumID=$Album->ID' method='post' enctype='multipart/form-data'>";
echo "Album Name";
echo " <input type = 'text' name = 'AlbumName' id = 'AlbumName' value='$Album->Name'>";
echo "<br >";
echo "Number Of Tracks";
echo "<input type =  'Number' name = 'NumberOfTracks' id ='NumberOfTracks'>";
echo "<br >";
echo "Profile image";
echo "<input type = 'file' name = 'ProfileImage' id ='ProfileImage'>";
echo "<br >";
echo "Cover image";
echo "<input type = 'file' name = 'CoverImage' id = 'CoverImage'>";
echo "<br >";
echo "<input type = 'submit' value = 'Update'>";
echo "</form>";
?>