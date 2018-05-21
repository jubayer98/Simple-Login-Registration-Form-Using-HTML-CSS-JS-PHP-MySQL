<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Seven Inc.</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body bgcolor="#191919">

	<h1 style="font-size:56px; color:#f7b32d">&nbsp;SE7EN<img src="logo.png" alt="Logo" style="width:100px; height:115px" align="left"></h1>
	<hr style="border-width:3px; border-color:#f7b32d">

	<h5 align="right" style="color:#f7b32d">
		<a href="index.php" style="text-decoration:none; color:#f7b32d"> HOME </a> &nbsp; | &nbsp; 
		<a href="register.php" style="text-decoration:none; color:#f7b32d"> REGISTRATION </a> &nbsp; | &nbsp; 
		<a href="index.php" style="text-decoration:none; color:#f7b32d"> LOGIN </a> &nbsp;
	</h5>
	<div id="main-wrapper">
		<center>
			<h2>User Login</h2>
			<img src="imgs/avatar.png" class="avatar"/>
		</center>
	
		<form class="myform" action="index.php" method="post">
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
			<input name="login" type="submit" id="login_btn" value="Login"/><br>
			<a href="register.php"><input type="button" id="register_btn" value="Register"/></a>
		</form>
		<?php
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$query="select * from userinformation WHERE username='$username' AND password='$password'";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				$row = mysqli_fetch_assoc($query_run);
				// valid
				$_SESSION['username']= $row['username'];
				$_SESSION['imglink']= $row['imglink'];
				header('location:homepage.php');
			}
			else
			{
				// invalid
				echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
			}
			
		}
		
		
		?>
		
	</div>
	<footer align="right" style="font-size:10px; color:#191919">&copy; 2018 | Jubayer Alam | 1420268042 | NSU</footer>
		
</body>
</html>