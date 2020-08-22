<?php
$name = $_FILES['musicfile']['name'];
$artistID = $_GET['artistID'];
$albumID = $_GET['albumID'];
echo $_FILES['musicfile']['type'] . "<br>";
if ($name != "") {
	$path = "uploads/Music/" . $name;
	move_uploaded_file($_FILES["musicfile"]["tmp_name"], $path);

	$con = mysqli_connect("localhost", "root", "");

	mysqli_select_db($con, "musique");
	$q = mysqli_query($con, "INSERT INTO songs(Name, ArtistID, AlbumID, musicPath) VALUES('$name', '$artistID', '$albumID', '$path')");

	if ($q) {
		echo "File has been stored in your uploads directory . ";
		header("refresh:3;url=insertSongForm.php?artistID=$artistID&albumID=$albumID");
	} else {
		echo "Not Inserted";

	}
	mysqli_close($con);
} else {
	echo " Please enter a file . ";
}

?> 
		

