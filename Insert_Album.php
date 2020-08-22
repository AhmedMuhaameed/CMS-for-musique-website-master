<?php
$target_dir = "uploads/albums/";
$target_file = $target_dir . basename($_FILES["ProfileImage"]["name"]);
$target_file_CoverImage = $target_dir . basename($_FILES["CoverImage"]["name"]);
$ProfileImage = $target_file;
$CoverImage = $target_file_CoverImage;
$AlbumName = $_POST['AlbumName'];
$ArtistID = $_GET["artistID"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$coverFileType = strtolower(pathinfo($target_file_CoverImage, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["ProfileImage"]["tmp_name"]);
    $check_cover = getimagesize($_FILES["CoverImage"]["tmp_name"]);
    if ($check !== false && $check_cover !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        echo "File is an image - " . $check_cover["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
/*if (file_exists($target_file) && file_exists($target_file_CoverImage)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
/*if ($_FILES["ProfileImage"]["size"] > 10000000 && $_FILES["CoverImage"]["size"] > 10000000) {
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
    if (move_uploaded_file($_FILES["ProfileImage"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["CoverImage"]["tmp_name"], $target_file_CoverImage)) {
        echo "The file " . basename($_FILES["ProfileImage"]["name"]) . " has been uploaded.";
        echo "The file " . basename($_FILES["CoverImage"]["name"]) . " has been uploaded.";
        $con = mysqli_connect("localhost", "root", "");

        mysqli_select_db($con, "musique");

        $q = mysqli_query($con, "insert into album (name, ProfileImage, CoverImage, ArtistID) values('$AlbumName', '$ProfileImage', '$CoverImage', '$ArtistID')");
        if ($q) {
            header("location:selectAll.php");
        } else {
            echo "Not Inserted";

        }
        mysqli_close($con);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>