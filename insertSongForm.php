
<!DOCTYPE html>
<html>

<head>
	<title>Insert Artist</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/homestyle.css">
	<!-- Font Icon -->
	<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

	<!-- Main css -->
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="header">
		<div class="header-right">
			<a class="active" href="home.php">Home</a>
			<a href="logout.php">Log out</a>
		</div>
	</div>
	<div class="main">
		<!-- Sing in  Form -->
		<section class="sign-in">
			<div class="container">
				<div class="signin-content">
					<div class="signin-image">
						<figure><img src="images/signin.jpg" alt="sing up image"></figure>
					</div>

					<div class="signin-form">
						<h2 class="form-title">Insert Song</h2>
						<form <?php echo "action='insertSongOK.php?artistID=" . $_GET['artistID'] . "&albumID=" . $_GET['albumID'] . "'"; ?> method="POST" class="register-form" id="login-form" enctype="multipart/form-data">
							<div class="form-group form-button">
								<span class="badge badge-primary">Choose Song file</span>
								<input type='file' name='musicfile' id='musicfile' />
							</div>

							<div class="form-group form-button">
								<input type="submit" name="submit" id="submit" class="form-submit" value="Insert" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
</body>

</html>