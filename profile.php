<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body class="main">


    <form class="heaven" action="login.php" method="post">
			<div style="text-align: center;">
 				 <img src="assets/logo.PNG" alt="" width="50" height="50">
 			 </div>
     <h1>Welcome <?php echo $_SESSION['name']; ?>!</h1>
     <h2>
       Name: <?php echo $_SESSION['name']; ?>
     <br>
       User Name: <?php echo $_SESSION['user_name']; ?>
     <br>
       Age: <?php echo $_SESSION['age']; ?>
     <br>
       Contact: <?php echo $_SESSION['contact']; ?>
     </h2><br>
     <h3><a href="logout.php" class="ca last">Logout</a></h3>

</form>


</body>
</html>


<?php
}else{
     header("Location: index.html");
     exit();
}
 ?>
