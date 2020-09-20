<!doctype html>
 <html>
   <body>
        <!-- Add your site or application content here -->
	<div class="row">
	   <div class="col-lg-12">
		<div class="container main"align="center">
			<form method = "post" action = "<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h1>Employees information </h1>
		<table class="table table-hover"border="2">
			<tr>
				 <td>Employee Name</td>
				 <td><input maxlength="30" type="text" name="name" value=""></td>
			</tr>
			<tr>
				<td>Work Shift:</td>
                                         <td>
                                         <input type="radio" name="workshift" value="morning"/>Morning
                                         <input type="radio" name="workshift" value="day"/>Day
				</td>
			</tr>
			<tr>
				<td>Department:</td>
				<td>
				<select id="department" name="department">
				<option value="null">Select Department</option>
                                         <option value="marketing">Marketing</option>
                                         <option value="sales">Sales</option>
                                         <option value="financial">Financial</option>
                                         <option value="others">Others</option>
                                         </select>
				</td>
			</tr>
			<tr>
				<td>E-Mail </td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<td>Birthday</td>
				<td><input type="date" name="bday"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
		<input type="radio" id="male" name="gender" value="Male">Male &nbsp;
		<input type="radio" id="female" name="gender" value="Female">Female &nbsp;
				</td>
			</tr>
			<tr>
				<td>Country</td>
				<td>
				<select class="country" name="country">                            
				<option value="null">Select Country</option>
				<option value="Bangladesh">Bangladesh</option>
				<option value="India">India</option>
				<option value="Nepal">Nepal</option>
				<option value="Bhutan">Bhutan</option>
				</select>
                                         </td>
			</tr>
			<tr>
				<td></td>
				<td>
				<input id="submit" type="submit" value="Submit" name="submit">
				<input id ="reset" type="reset" value="Reset" name="sreset">
				</td>
			</tr>
		</table>
	</form
      </div>
  </div>
</div>
		
		<?php
      $name=$workshift=$department=$email=$birthday=$gender=$country="";
	$namerr=$workshiftrr=$departmentrr=$emailrr=$birthdayrr=$genderrr=$countryrr="";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if (empty($_POST["name"])) {
			$namerr = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			  $namerr = "Only letters and white space allowed";
			}
		}
		
		if (empty($_POST["workshift"])) {
			$workshiftrr = "Name is required";
		} else {
			$workshift = test_input($_POST["workshift"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$workshift)) {
			  $workshiftrr = "Only letters and white space allowed";
			}
		}
		
		if (empty($_POST["department"])) {
			$departmentrr = "Name is required";
		} else {
			$department = test_input($_POST["department"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$department)) {
			  $departmentrr = "Only letters and white space allowed";
			}
		}
		
		 if (empty($_POST["email"])) {
			$emailrr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  $emailErr = "Invalid email format";
			}
		}
		
		if (empty($_POST["bday"])) {
			$birthday = "";
		} else {
			$birthday = test_input($_POST["bday"]);
		}
		
		if (empty($_POST["gender"])) {
			$gender = "";
		} else {
			$gender = test_input($_POST["gender"]);
		}
		
		if (empty($_POST["country"])) {
			$country = "";
		} else {
			$country = test_input($_POST["country"]);
		}
		echo "Name: ". $name."<br/>";
		echo "workshift: ". $workshift."<br/>";
		echo "department:  ". $department."<br/>";
		echo "E-mail: ". $email."<br/>";
		echo "birthday: ". $birthday."<br/>";
		echo "gender: ". $gender."<br/>";
		echo "country: ". $country."<br/>";
      }
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
	</body>

</html>
 
