<!DOCTYPE html>
<html>
<head>
	<title>Albums</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/homestyle.css">
</head>
<body>
<div class="header">
			<div class="header-right">
				<a href="home.php">Home</a>
				<?php
			$artistID = $_GET['id2'];
			echo "<a href='Insert_Album_Main.php?id2=$artistID' class='active'>Insert New Album</a>";
			?>
				<a href="login.html">Log out</a>
			</div>
		</div>
	<div class="main">

		

		<h2>Albums</h2>

		<!-- Portfolio Gallery Grid -->
		<div class="row">
			<?php
		include "phpConnection.php";
		$artistID = $_GET["id2"];


		$q = "SELECT * FROM album Where ArtistID = $artistID";
		$result = $con->query($q);

		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo '<div class="column">';
			echo '<div class="content">';
			$id = $row["ID"];
			$ProfileImage = $row['ProfileImage'];
			$AlbumName = $row['Name'];
			echo "<a href='insertSong.php?albumID=$id&artistID=$artistID'><img src='$ProfileImage' alt = '$AlbumName' style = 'width:100%'  width='218' height='218'></a>";
			echo '<h3>' . $row["Name"] . '</h3>';
			echo "<a href='updateAlbum.php?id2=$id' class='btn btn-primary' class='shift'>Update</a>";
			echo "<a href='deleteAlbum.php?id2=$id' class='btn btn-primary' class='shift'>Delete</a>";
			echo '</div>';
			echo '</div>';
		}
		?>
		</div>

		<!-- END MAIN -->
	</div>

</div> 
</body>
</html>