<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Insert Artist</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/homestyle.css">
	</head>
	<body>
	<div class="header">
			<div class="header-right">
				<a href="home.php">Home</a>
				<a href='Insert_Artist.html' class='active'>Insert New Artist</a>
				<a href="login.html">Log out</a>
			</div>
		</div>
		<div class="main">

		

		<h2>Artists</h2>

		<!-- Portfolio Gallery Grid -->
		<div class="row">
			<?php
		include "phpConnection.php";

		$q = "SELECT * FROM artist";
		$result = $con->query($q);

		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo '<div class="column">';
			echo '<div class="content">';
			$id = $row["ID"];
			$ProfileImage = $row['imagePath'];
			$ArtistName = $row['Name'];
			echo "<a href='view.php?id2=$id'><img src='$ProfileImage' alt = '$ArtistName' style = 'width:100%'  width='218' height='218'></a>";
			echo '<h3>' . $row["Name"] . '</h3>';
			echo "<a href='updateArtist.php?id2=$id' class='btn btn-primary' class='shift'>Update</a>";
			echo "<a href='deleteArtist.php?id2=$id' class='btn btn-primary' class='shift'>Delete</a>";
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