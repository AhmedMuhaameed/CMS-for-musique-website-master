<?php
$albumID = $_GET['albumID'];
if (isset($_POST['AlbumName']) && isset($_POST['ProfileImage']) && isset($_POST['CoverImage'])) {
    $albumName = $_POST['AlbumName'];
    $profileImage = $_POST['ProfileImage'];
    $coverImage = $_POST['CoverImage'];

    include_once "phpConnection.php";
    $query1 = "UPDATE album SET Name='$albumName', ProfileImage='$profileImage', CoverImage='$coverImage' WHERE ID=$albumID;";
    $query2 = "SELECT * FROM album WHERE ID=$albumID";
    $result1 = $con->query($query1);
    $result2 = $con->query($query2);
    if ($result1) {
        $newAlbum = $result2->fetch_object();
        echo "New Data<br>";
        echo "Album Name is: $newAlbum->Name <br>";
        echo "Album ProfileImage: <br><img src='$artist->ProfileImage'><br>";
        echo "Album CoverImage: <br><img src='$artist->CoverImage'><br>";
        echo "<br>If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
        header("refresh:3;url=selectAll.php");
    } else {
        echo ("Error Happen :(<br>");
        echo "If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
        header("refresh:3;url=selectAll.php");
    }
} else if (isset($_POST['AlbumName']) && isset($_POST['ProfileImage'])) {
    $albumName = $_POST['AlbumName'];
    $profileImage = $_POST['ProfileImage'];

    include_once "phpConnection.php";
    $query1 = "UPDATE album SET Name='$albumName', ProfileImage='$profileImage' WHERE ID=$albumID;";
    $query2 = "SELECT * FROM album WHERE ID=$albumID";
    $result1 = $con->query($query1);
    $result2 = $con->query($query2);
    if ($result1) {
        $newAlbum = $result2->fetch_object();
        echo "New Data<br>";
        echo "Album Name is: $newAlbum->Name <br>";
        echo "Album ProfileImage: <br><img src='$artist->ProfileImage'><br>";
        echo "<br>If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
        header("refresh:3;url=selectAll.php");
    } else {
        echo ("Error Happen :(<br>");
        echo "If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
        header("refresh:3;url=selectAll.php");
    }
} else if (isset($_POST['AlbumName']) && isset($_POST['CoverImage'])) {
    $albumName = $_POST['AlbumName'];
    $coverImage = $_POST['CoverImage'];

    include_once "phpConnection.php";
    $query1 = "UPDATE album SET Name='$albumName', CoverImage='$coverImage' WHERE ID=$albumID;";
    $query2 = "SELECT * FROM album WHERE ID=$albumID";
    $result1 = $con->query($query1);
    $result2 = $con->query($query2);
    if ($result1) {
        $newAlbum = $result2->fetch_object();
        echo "New Data<br>";
        echo "Album Name is: $newAlbum->Name <br>";
        echo "Album CoverImage: <br><img src='$newAlbum->CoverImage'><br>";
        echo "<br>If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
        header("refresh:3;url=selectAll.php");
    } else {
        echo ("Error Happen :(<br>");
        echo "If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
        header("refresh:3;url=selectAll.php");
    }
} else if (isset($_POST['AlbumName'])) {
    $albumName = $_POST['AlbumName'];

    include_once "phpConnection.php";
    $query1 = "UPDATE album SET Name='$albumName' WHERE ID=$albumID;";
    $query2 = "SELECT * FROM album WHERE ID=$albumID";
    $result1 = $con->query($query1);
    $result2 = $con->query($query2);

    if ($result1) {
        $newAlbum = $result2->fetch_object();
        echo "New Data<br>";
        echo "Album Name is: $newAlbum->Name <br>";
        echo "<br>If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
        header("refresh:3;url=selectAll.php");
    } else {
        echo ("Error Happen :(<br>");
        echo "If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
        header("refresh:3;url=selectAll.php");
    }
} else {
    echo ("Error Happen :(<br>");
    echo "If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
    header("refresh:3;url=selectAll.php");
}
?>