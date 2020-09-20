<!doctype html>
<?php
	ob_start();
	session_start();
	if($_SESSION["printemail"] && $_SESSION["password"] && $_SESSION["printname"]){
?>


<html>
	<head></head>
	<body>
		<p><strong>Welcome <?php echo $_SESSION["printname"];}session_destroy()?></strong></p>
		<form action="index.php"method="post">
			<input type="submit" name="submit" value="Logout"/>
		</form>
	</body>
</html>
