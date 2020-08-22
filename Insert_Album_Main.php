<!DOCTYPE html>
<html>

<head>
	<title>Insert Album</title>
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
						<h2 class="form-title">Insert Album</h2>
						<form <?php echo "action='Insert_Album.php?artistID=" . $_GET['id2'] . "'"; ?> method="POST" class="register-form" name="myForm"  id="login-form" enctype="multipart/form-data" onsubmit="return validateForm();">
							<div class="form-group">
								<label for="artist_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="text" name="AlbumName" id="AlbumName" placeholder="album name" />
							</div>

							<div class="form-group form-button">
								<span class="badge badge-primary">Profile Image</span>
								<input type="file" name="ProfileImage" id="ProfileImage" />
							</div>

							<div class="form-group form-button">
								<span class="badge badge-primary">Cover Image</span>
								<input type="file" name="CoverImage" id="CoverImage"/>
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
	<!-- JS -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    var albumForm = document.querySelector('#login-form');
    albumForm.addEventListener('submit', validateForm);

    function validateForm(/*event*/) {
      //event.preventDefault();
      //console.log(event);
      var albumName = document.forms["myForm"]["AlbumName"];
      var profileImage = document.forms["myForm"]["ProfileImage"];
	  var coverImage = document.forms["myForm"]["CoverImage"];

      if (albumName.value == "" || profileImage.value == "" || coverImage.value == "") {
        window.alert("all fields must be filled");
        //albumName.focus();
        return false;
      }
		/*
      if (profileImage.value.indexOf("@", 0) < 0) {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
      }

      if (password.value == "") {
        window.alert("password must be filled out");
        password.focus();
        return false;
      }
	  */
	  return true;
      //albumForm.submit();
    }
  </script>
</body>

</html>