<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>7 Inc. Register</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imglink").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
</script>
</head>
<body bgcolor="#191919">

	<h1 style="font-size:56px; color:#f7b32d">&nbsp;SE7EN<img src="logo.png" alt="Logo" style="width:100px; height:115px" align="left"></h1>
	<hr style="border-width:3px; border-color:#f7b32d">

	<h5 align="right" style="color:#f7b32d">
		<a href="index.php" style="text-decoration:none; color:#f7b32d"> HOME </a> &nbsp; | &nbsp; 
		<a href="register.php" style="text-decoration:none; color:#f7b32d"> REGISTRATION </a> &nbsp; | &nbsp; 
		<a href="index.php" style="text-decoration:none; color:#f7b32d"> LOGIN </a> &nbsp;
	</h5>
	
	<form class="myform" action="register.php" method="post" enctype="multipart/form-data" >
		<div id="main-wrapper">
		<center>
			<h2>User Registration</h2>
			<img id="uploadPreview" src="imgs/avatar.png" class="avatar"/><br>
			<input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
		</center>
		
			<label><b>Full Name:</b></label><br>
			<input name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
			<label><b>Email:</b></label><br>
			<input name="email" type="email" class="inputvalues" placeholder="Type your email" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			<label><b>Confirm Password:</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="Back To Login"/></a>
		</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				
				$fullname = $_POST['fullname'];
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				
				$img_name = $_FILES['imglink']['name'];
				$img_size =$_FILES['imglink']['size'];
			    $img_tmp =$_FILES['imglink']['tmp_name'];
				
				$directory = 'uploads/';
				$target_file = $directory.$img_name;
				
				if($password==$cpassword)
				{
					
					$query= "select * from userinformation WHERE username='$username'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else if(file_exists($target_file))
					{
						echo '<script type="text/javascript"> alert("Image file already exists.. Try another image file") </script>';
					}
					else if($img_size>2097152)
					{
						echo '<script type="text/javascript"> alert("Image file size larger than 2 MB.. Try another image file") </script>';
					}
					else
					{
						move_uploaded_file($img_tmp,$target_file); 	
						$query= "insert into userinformation values('','$username','$password','$fullname', '$email', '$target_file')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
					}	
				}
				else
				{
					echo '<script type="text/javascript"> alert("Password and confirm password does not match!")</script>';	
				}
			}
		?>
	</div>
	<footer align="right" style="font-size:10px; color:#191919">&copy; 2018 | Jubayer Alam | 1420268042 | NSU</footer>
</body>
</html>