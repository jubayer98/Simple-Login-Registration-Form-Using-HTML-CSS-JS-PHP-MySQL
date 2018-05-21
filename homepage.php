<?php
	session_start();
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
			<h2>Profile Page</h2>
			<h3>Welcome
				<?php echo $_SESSION['username'] ?>
			</h3>
			<?php echo '<img class="avatar" src="'.$_SESSION["imglink"].'">';?>
		</center>
	
		<form class="myform" action="homepage.php" method="post">
			<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>
			
		</form>
		
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:index.php');
			}
		?>
	</div>
	<footer align="right" style="font-size:10px; color:#191919">&copy; 2018 | Jubayer Alam | 1420268042 | NSU</footer>
		
</body>
</html>