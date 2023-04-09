

<?php
session_start();
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "test1_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['confirm_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
  $name = validate($_POST['name']);
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$con_pass = validate($_POST['confirm_password']);
	$age = validate($_POST['age']);
	$contact = validate($_POST['contact']);



  if(empty($name)){
        header("Location: register.php?error=Name is required");
	    exit();
	}
  else if (empty($uname)) {
		header("Location: register.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: register.php?error=Password is required");
	    exit();
	}
	else if(empty($con_pass)){
        header("Location: register.php?error=Confirm Password is required");
	    exit();
	}
	else if (empty($age)) {
		header("Location: register.php?error=Age is required");
	    exit();
	}
	else if (empty($contact)) {
		header("Location: register.php?error=Contact is required");
	    exit();
	}

	else if($pass !== $con_pass){
        header("Location: register.php?error=The confirmation password  does not match");
	    exit();
	}

	else{
        $pass = md5($pass);

	    $sql = "SELECT * FROM users1 WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: register.php?error=The username is taken try another");
	        exit();
		}else {
           $sql2 = "INSERT INTO users1(user_name, password, name, age, contact) VALUES('$uname', '$pass', '$name', '$age','$contact')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: register.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: register.php?error=unknown error occurred");
		        exit();
           }
		}
	}

}else{
	header("Location: register.php");
	exit();
}
