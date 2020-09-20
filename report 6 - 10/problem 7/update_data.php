<!doctype html>
<?php
$con=new mysqli("localhost", "root", "", "Teacher");
if ($con->connect_error) {
			die("Connection failed: " . $con->connect_error);
		          }
?>
<html>
<body>
 <?php
	$match=$_GET['email'];
	$sql="select * from information where email='$match'";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
?>
<div class="main" align="center">
	<h1>Teachers's Profile</h1>
	<form action="" method="post" enctype="multipart/form-data"name="teacherprofile">
	<table border="1">
		<tbody>
                     <tr>
			<td>Name:</td>
		<td><input type="text" name="name" value="<?php echo $row["name"];?>"></td>
		</tr>
		<tr>
                               <td>Designation: </td>
                            <td><input type="text" name="designation"value="<?php echo      $row["designation"];?>"/></td>
                     </tr>
		<tr>
			<td>Deptartment:</td>
			<td>
				<?php echo $row["department"]?>
				<select id="deptartment" name="deptartment">
				<option value="null">Select Department</option>
                                         <option value="CSE">CSE</option>
                                         <option value="EEE">EEE</option>
                                         <option value="ESE">ESE</option>
                                         <option value="Statistics">Statistics</option>
                                         </select>
			</td>
		</tr>
		<tr>
                               <td>Gender </td>
                                <td>
				<?php echo $row["gender"]?>
                                         <input type="radio" name="gender" value="Male"/>Male
                                         <input type="radio" name="gender" value="Female"/>Female
                                </td>
                     </tr>
		<tr>
			<td>Email:</td>
			td><input type="text" name="email" value="<?php echo $row["email"];?>"/></td>
		</tr>
		<tr>
			<td>Address:</td>
			<td><input type="text" name="address" value="<?php echo $row["address"];?>"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			<input type="submit" name="submit" value="Update">
			a href="index.php"><input name="back" type="button" value="Back"></a>
			</td>
			</tr>
						
		</tbody>
					
		</table>
	</form>
	?php
		}
					
	}
	$con->close();
	?>	
	</div>
</body>
</html>
<?php
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
		
	$con=new mysqli("localhost", "root", "", "Teacher");
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
 if(isset($_POST['submit'])){
		$name = test_input($_POST["name"]);
		$designation = test_input($_POST["designation"]);
		$deptartment = test_input($_POST["deptartment"]);
		$gender = test_input($_POST["gender"]);
                     $email = test_input($_POST["email"]);
		$address = test_input($_POST["address"]);
		$sql = "UPDATE information SET name='$name',designation='$designation',department='$deptartment',gender='$gender',email='$email',address='$address'WHERE email='$match'";
		if ($con->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $con->error;
		}
	}
	?>

