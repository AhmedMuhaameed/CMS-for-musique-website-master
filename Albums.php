<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Albums</title>
	<link rel="stylesheet" type="text/css" href="css/homestyle.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/albumstyle.css"> -->
	
</head>
<body>
	<div class="main">

		<div class="header">
			<a href="home.php" class="logo"><h2 class="logo"><?php echo $_SESSION['Name']; ?></h2></a>
			<div class="header-right">
				<a href="home.php">Home</a>
				<a href="login.html">Log out</a>
			</div>
		</div>
		

		<h2>Albums</h2>

		<!-- Portfolio Gallery Grid -->
		<div class="row">
			<?php
		include "phpConnection.php";
		$id = $_GET["artistID"];


		$q = "SELECT * FROM album Where ArtistID = $id";
		$result = $con->query($q);

		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo '<div class="column">';
			echo '<div class="content">';
			$id = $row["ID"];
			$ProfileImage = $row['ProfileImage'];
			$AlbumName = $row['Name'];
			echo "<a href = 'Songs_Page.php?id=$id'> <img src='$ProfileImage' alt = '$AlbumName' style = 'width:100%'  width='218' height='218'> </a>";
			echo '<h3>' . $row["Name"] . '</h3>';
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