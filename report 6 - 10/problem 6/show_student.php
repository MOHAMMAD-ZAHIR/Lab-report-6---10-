<!DOCTYPE HTML>
<?php
$conn = new mysqli("localhost","root","") or die("Connection failed: " . $conn->connect_error);
 $db="CREATE DATABASE Student";
 $conn->query($db);
 $conn->close();
 $conn = new mysqli ("localhost","root","","Student");
 $table="CREATE TABLE information(
           Name VARCHAR(30),
		   Roll VARCHAR(20)PRIMARY KEY,
		   Reg  VARCHAR(20),
		   Dept  VARCHAR(20),
		   Session VARCHAR(30),
		   Gender VARCHAR(30),
		   Email VARCHAR(30),
		   Address VARCHAR(30)
		   )";
   $conn->query($table);
   if(isset($_POST['submit'])){
	   $Name=$_POST['name'];
	   $Roll=$_POST['roll'];
	   $Reg=$_POST['reg'];
	   $Dept=$_POST['dept'];
	   $Session=$_POST['session'];
	   $Gender=$_POST['gender'];
	   $Email=$_POST['email'];
	   $Address=$_POST['address'];
	   
	   $sql="INSERT INTO `information`(`Name`, `Roll`, `Reg`, `Dept`, `Session`,`Gender`,`Email`,`Address`) VALUES ('$Name','$Roll','$Reg','$Dept','$Session','$Gender','$Email','$Address')";
		if ($conn->query($sql) === TRUE) {
			echo "<script>alert('Data inserted.');</script>";
		} else {
			echo "";
		}
   }
	
?>
<html>
    <body>
	<div class="main" align="center">
	   <h1>Student Profile</h1>
	      <form action="" method="post">
		<table border="1">
		     <tbody>
                                <tr>
			           <td>Name:</td>
				<td><input type="text" name="name" value=""></td>
			</tr>
			<tr>
                                          <td>Roll: </td>
                                          <td><input type="text" name="roll"value=""/></td>
                               </tr>
			<tr>
                                          <td>Reg: </td>
                                          <td><input type="text" name="reg"value=""/></td>
                              </tr>
			<tr>
				<td>Dept:</td>
				<td>
				<select id="dept" name="dept">
				<option value="null">Select Department</option>
                                         <option value="CSE">CSE</option>
                                         <option value="EEE">EEE</option>
                                         <option value="ESE">ESE</option>
                                         <option value="Statistics">Statistics</option>
                                         </select>
				</td>
			</tr>
			<tr>
                                          <td>Session: </td>
                                          <td><input type="text" name="session"value=""/></td>
                               </tr>
			<tr>
                                          <td>Gender </td>
                                          <td>
                                          <input type="radio" name="gender" value="Male"/>Male
                                          <input type="radio" name="gender" value="Female"/>Female
                                          </td>
                               </tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" value=""/></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><input type="text" name="address" value=""/></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" name="submit" value="submit">
				<input type="button" name="show" value="show">
				</td>
			</tr>
						
		</tbody>
	     </table>
         </form>
      </div>
   </body>
</html>
