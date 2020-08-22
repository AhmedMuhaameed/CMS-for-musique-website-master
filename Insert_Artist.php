<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["ArtistIamge"]["name"]);
$imageName = $target_file;
$artistName = $_POST['artistName'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["ArtistIamge"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
/*if ($_FILES["ArtistIamge"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["ArtistIamge"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["ArtistIamge"]["name"]) . " has been uploaded.";
		$con=mysqli_connect("localhost","root", "");

		mysqli_select_db($con, "musique");

		$q=mysqli_query($con,"insert into artist (name,imagePath) values('$artistName','$imageName')");

		if ($q)
		{
			header("location:selectAll.php");
		}
		else
		{
			echo "Not Inserted";

		}
		mysqli_close($con);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>