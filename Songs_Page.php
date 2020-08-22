<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>musique</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/homestyle.css">
	<link rel="stylesheet" type="text/css" href="css/artiststyle.css">
</head>
<body >
<div class="header-right">
			<div class="play">
				<a href="home.php" class="btn btn-warning">Home</a>
				<a href="login.html" class="btn btn-warning">Log out</a>
			</div>
		</div>
  <div class="shown">
    <?php
    include_once "phpConnection.php";
    $albumid = $_GET['id'];
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
      $albumid = $_GET['id'];
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
    include_once "phpConnection.php";
    $albumid = $_GET['id'];
    $q = "SELECT ArtistID FROM album Where ID=$albumid";
    if ($result = $con->query($q)) {
      $row = $result->fetch_row();
      $artistid = $row[0];
      $q1 = "SELECT Name FROM artist Where ID=$artistid";
      if ($result = $con->query($q1)) {
        $row = $result->fetch_row();
        $artistname = $row[0];
        echo "<div class='play'>$artistname</div>";
      }
    }
    ?>
          </div>
        </div>
        <div class="album-details">
        <?php
        include_once "phpConnection.php";
        $albumid = $_GET['id'];
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

        $albumID = $_GET['id'];

        include_once "phpConnection.php";
        $query = "SELECT * FROM songs WHERE AlbumID=$albumID";
        $result = $con->query($query);
        if ($result) {
          //$counter = 1;
          while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $songId = $row['ID'];
            echo "<li> <span>" . $row['Name']
              . "<li><audio src='" . $row['musicPath'] . "' controls id='audioPlayer'>"
              . "Sorry, your browser doesn't support html5!"
              . "</audio></li>"
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
  <!-- <script src="jQuery/jquery-2.2.0.js"></script>
    <script src="js/audioPlayer.js"></script>
    <script>
        // loads the audio player
        audioPlayer();
    </script> -->
</body>
</html>