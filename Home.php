<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/homestyle.css">
</head>
<body>
	<div class="header">
		<a href="home.php" class="logo">Musiqe</a>
		<div class="header-right">
			<a class="active" href="home.php">Home</a>
			<?php 
				if(isset($_SESSION['admin'])){
					echo "<a href='logout.php'>Log out</a>";
				}else{
					echo "<a href='logout.php'>Log in</a>";
				}
			?>
		</div>
	</div>
	<!-- main content -->
	<div class="main">
		<div class="shown">
			<?php
		if (isset($_SESSION['admin']) && $_SESSION['admin']) {
			echo "<h2> Welcome " . $_SESSION['Name'] . "</h2>";
			echo "<a href='selectAll.php' >Admin Page</a>";
		} else if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0){
			echo "<h3> Welcome " . $_SESSION['Name'] . "</h3>";
		}
		?>
		</div>
		<h1>musique.com</h1>
		<hr>

		<h2>Artist</h2>

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
			echo "<a href = 'Albums.php?artistID=$id'> <img src='" . $row['imagePath'] . "' alt = '" . $row['Name'] . "' style = 'width:100%'  width='218' height='218'> </a>";
			echo '<h3>' . $row["Name"] . '</h3>';
			echo '</div>';
			echo '</div>';
		}
		?>
		</div>

		<!-- END MAIN -->
	</div>

</body>
</html>