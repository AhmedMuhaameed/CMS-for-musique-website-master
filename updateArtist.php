<?php

$id = $_GET['id2'];
include_once "phpConnection.php";
$query = "SELECT * FROM artist WHERE ID=$id";
$result = $con->query($query);
$artist = $result->fetch_object();
if($result)
{
    echo "<form action='updateArtistOK.php?id2=$id' method='post' enctype='multipart/form-data'>";
    echo "Artist Name";
	echo "<input type='text' name='artistName' id='artistName' value=$artist->Name>";
	echo "<br>";
	echo "Select image to upload:";
    echo "<input type='file' name='ArtistIamge' id='ArtistIamge'>";
	echo "<br>";
    echo "<input type='submit' value='Upload Image' name='submit'>";
    echo "</form>";
}

?>