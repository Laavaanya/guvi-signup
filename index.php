<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet"  href="css/style.css">
</head>
<body>
     <form action="login.php" method="post">
			 <div style="text-align: center;">
 				<img src="assets/logo.PNG" alt="" width="50" height="50">
 			</div>
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
			<a href="register.php" class="ca">Create an account</a>
     </form>
</body>
</html>
