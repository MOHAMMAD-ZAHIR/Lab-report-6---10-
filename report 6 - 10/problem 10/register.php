<?php
	
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$fullname=$username=$email=$password=$contact="";
	if(isset($_POST['signup'])){
		if(empty($_POST["name"])){
			$fullname="";
		}else{
			if (preg_match("/^[a-zA-Z ]*$/",$fullname)){
				$fullname = test_input($_POST["name"]);
			}
		}
		if(empty($_POST["uname"])){
			$username="";
		}else{	
			$username = test_input($_POST["uname"]);	
		}
		if (empty($_POST["email"])) {
			$email = "";
		} else {
			$email = test_input($_POST["email"]);	
		}
		if (empty($_POST["password"])) {
			$password = "";
		} else {
			$password = test_input($_POST["password"]);	
		}
		if (empty($_POST["contact"])) {
			$contact = "";
		} else {
			$contact = test_input($_POST["contact"]);	
		}
		
		$sql=$conn="";
		$conn = new mysqli("localhost", "root", "", "adminpanel");
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// prepare and bind
		$stmt = $conn->prepare("INSERT INTO admin (fullname, username, email, password, contact) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $fullname, $username, $email, $password, $contact);
		if($stmt->execute()){
			echo"<<script>alert('Regester Sucessfully');</script>";
			sleep(2);
			header("location:index.php");
		}else{
			echo"<<script>alert('Faild to regester');</script>";
		}
		$stmt->close();
		$conn->close();
	}
?>
<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<title>Sign up</title>
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
		<div class="register">
			<div id="Register">
				<h3><marquee>Please Sign up whith Valid Information</marquee></h3>
				<form name="registration" method="post" action="" enctype="multipart/form-data">
					<p>Full Name </p>
					<input type="text" class="text" value=""  name="name" required ><br>
					<p>User Name </p>
					<input type="text" class="text" value="" name="uname"  required >
					<p>Email Address </p>
					<input type="email" class="text" value="" name="email"  >
					<p>Password </p>
					<input type="password" value="" name="password" required>
					<p>Contact No. </p>
					<input type="text" value="" name="contact"  required><br>
					<div class="sign-up">
						<input type="reset" value="Reset">
						<input type="submit" name="signup"  value="Sign Up" >
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

