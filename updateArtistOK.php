<?php
    $id = $_GET['id2'];
    $artistName = $_POST['artistName'];

    include_once "phpConnection.php";

    if(isset($artistName) && isset($_POST['ArtistIamge']))
    {
        $artistImage = $_POST['ArtistIamge'];
        $query1 = "UPDATE artist SET Name='$artistName', imagePath='$artistImage' WHERE ID=$id;";
        $query2 = "SELECT * FROM artist WHERE ID=$id";
        $result1 = $con->query($query1);
        $result2 = $con->query($query2);
        $artist = $result2->fetch_object();
        if($result1)
        {
            echo "New Data<br>";
            echo "Artist Name is: $artist->Name <br>";
            echo "Artist Image: <br><img src='$artist->imagePath'><br>";
            echo "<br>If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
            header("refresh:3;url=selectAll.php");
        }else{
            echo("Error Happen :(<br>");
            echo "If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
            header("refresh:3;url=selectAll.php");
        }
    }else if(isset($artistName)){
        $query1 = "UPDATE artist SET Name='$artistName' WHERE ID=$id;";
        $query2 = "SELECT * FROM artist WHERE ID=$id";
        $result1 = $con->query($query1);
        $result2 = $con->query($query2);
        $artist = $result2->fetch_object();
        if($result1)
        {
            echo "New Data<br>";
            echo "Artist Name is: $artist->Name";
            echo "<br>If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
            header("refresh:3;url=selectAll.php");
        }else{
            echo("Error Happen :(<br>");
            echo "If you not redirect automaticaly in 10 seconds press <a href='selectAll.php'>Admin Page</a>";
            header("refresh:3;url=selectAll.php");
        }
    }
?>