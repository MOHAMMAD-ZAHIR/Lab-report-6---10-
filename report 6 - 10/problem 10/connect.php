<?php 
	$conn=new mysqli("localhost","root","");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "CREATE DATABASE adminpanel";
	if ($conn->query($sql) === TRUE) {
		echo "Database creatted Sucessfully";
	} else {
		echo "";
	}

	$conn->close();
	$con=new mysqli("localhost", "root", "", "adminpanel");
	$sql="";
	$sql = "CREATE TABLE admin (
		fullname VARCHAR(50)NOT NULL,
		username VARCHAR(30) NOT NULL,
		email VARCHAR(50) NOT NULL primary key,
		password VARCHAR(50),
		contact VARCHAR(11),
		reg_date TIMESTAMP
		)";

	if ($con->query($sql) === TRUE) {
		echo "Table admin created sucessesfully";
	} else {
		echo "";
	}
	$con->close();
	
	session_start();
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$uemail=$loginpassword="";
	if(isset($_POST['loginbtn'])){
		
		if (empty($_POST["uemail"])) {
			$uemail = "";
		} else {
			$uemail = test_input($_POST["uemail"]);	
		}
		if (empty($_POST["loginpassword"])) {
			$loginpassword = "";
		} else {
			$loginpassword = test_input($_POST["loginpassword"]);	
		}
		$sql=$conn=$printname="";
		$count=1;
		$conn = new mysqli("localhost", "root", "", "adminpanel");
		$sql = "SELECT * FROM admin where email='$uemail'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if($row["email"]==$uemail && $row["password"]==$loginpassword){
					$count=0;
					$printname=$row["fullname"];
					break;
				}else{
					echo"<script>alert('no such user');</script>";
				}
				
			}
		} else {
			echo "<script>alert('no such user');</script>";
		}
		if($count){
			echo "";
		}else{
			$_SESSION["printname"]=$printname;
			$_SESSION["printemail"]=$_POST[uemail];
			$_SESSION["password"]=$_POST[loginpassword];
			header("location:home.php");
		}
		
		$conn->close();
		
	}
	if($_SESSION){
		header("location:home.php");
	}
	//session_destroy();
?>
<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<title>Admin panel</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:title" content="">
		<meta property="og:type" content="">
		<meta property="og:url" content="">
		<meta property="og:image" content="">
		<link rel="manifest" href="site.webmanifest">
		<meta name="theme-color" content="#fafafa">
		<link rel="stylesheet" href="main.css">
		<script>
			
		</script>
</head>
<body>
<div class="logmain">
<div id="Login">
    <form name="login" action="" method="post" enctype="multipart/form-data">
   <input type="email" name="uemail" value="" placeholder="Enter your registered email"><br>
   <input type="password" value="" name="loginpassword" placeholder="Enter valid password">
<div class="log-in">
      <input type="submit" name="loginbtn"  value="Log in" >
	<a href="regester.php">Sign Up</a>
	    </div>
                 </form>
</div>
</div>
            <script src="js/vendor/modernizr-3.11.2.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
                   <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
		<script>
		window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
		ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
		</script>
		<script src="https://www.google-analytics.com/analytics.js" async></script>
	</body>
</html>
