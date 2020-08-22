<!DOCTYPE html>
<html>
<head>
    <title>musique</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/homestyle.css">
	<link rel="stylesheet" type="text/css" href="css/artiststyle.css">
</head>
<body >
<div class="">
			<div class="header-right">
				<a href="home.php" class="btn btn-warning">Home</a>
				<a href="login.html" class="btn btn-warning">Log out</a>
			</div>
		</div>
  <div class="shown">
    <?php
    include_once "phpConnection.php";
    $albumid = $_GET['albumID'];
    $q = "SELECT * FROM album Where id = $albumid";
    if ($result = $con->query($q)) {
        while ($row = $result->fetch_row()) {
            $Coverimage = $row[4];
            echo "<div class='background' style='background-image: url($Coverimage)'></div>";
        }
    }
    ?>
    <section>

      <div class="album-info">
      <?php
        include_once "phpConnection.php";
        $albumid = $_GET['albumID'];
        $q = "SELECT * FROM album Where id = $albumid";
        if ($result = $con->query($q)) {
            while ($row = $result->fetch_row()) {
                $profileimage = $row[3];
                echo "<div class='album-art'><img src='$profileimage'>";
            }
        }
        ?>
          <div class="actions">
              <?php
                $albumID = $_GET['albumID'];
                $artistID = $_GET['artistID'];
                echo "<div class='play'><a href='insertSongForm.php?albumID=$albumID&artistID=$artistID'>Insert Song</a></div>"
                ?>
          </div>
        </div>
        <div class="album-details">
        <?php
        include_once "phpConnection.php";
        $albumid = $_GET['albumID'];
        $q = "SELECT * FROM album Where id = $albumid";
        if ($result = $con->query($q)) {
            while ($row = $result->fetch_row()) {
                $albumname = $row[1];
          //$artistid = $row["ArtistID"];

                echo "<h1>$albumname</h1> <span> <span>Music</span>";
            }
        }
        ?>
        </div>
      </div>
      <div class="album-tracks">
        <ol>
        <?php

        $albumID = $_GET['albumID'];
        $artistID = $_GET['artistID'];

        include_once "phpConnection.php";
        $query = "SELECT * FROM songs WHERE AlbumID=$albumID";
        $result = $con->query($query);
        if ($result) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $songId = $row['ID'];
                echo "<li> <span>" . $row['Name']
                    . "</span> <span><a href=deleteSong.php?songId=$songId&artistID=$artistID&albumID=$albumID class='play'>Delete</a></span></li>"
                    . "<br><audio src='" . $row['musicPath'] . "' controls id='audioPlayer'>"
                    . "Sorry, your browser doesn't support html5!"
                    . "</audio>"
                    . "<script src='jQuery/jquery-2.2.0.js'></script>"
                    . "<script src='js/audioPlayer.js'></script>"
                    . "<script>"
                    . "// loads the audio player"
                    . "audioPlayer();"
                    . "</script>";
            }
        }

        ?>
        </ol>
      </div>
    </section>
  </div>
</body>
</html>