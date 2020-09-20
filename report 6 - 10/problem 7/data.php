<!DOCTYPE HTML>
<?php
$conn = new mysqli("localhost","root","") or die("Connection failed: " . $conn->connect_error);
$db="CREATE DATABASE Teacher";
$conn->query($db);
$conn->close();
$conn = new mysqli ("localhost","root","","Teacher");
$table="CREATE TABLE information(
                                    name VARCHAR(30)PRIMARY KEY,
                                    designation VARCHAR(20),
                                    department  VARCHAR(20),
                                    gender VARCHAR(30),
                                    email VARCHAR(30),
                                    address VARCHAR(30)
                                    )";
$conn->query($table);
if(isset($_POST['Update'])){
                                   $name=$_POST['name'];
                                   $designation=$_POST['designation'];
                                   $department=$_POST['department'];
                                   $gender=$_POST['gender'];
                                   $email=$_POST['email'];
                                   $address=$_POST['address'];
	   
$sql="INSERT INTO`information`(`name`,`designation`,`department`,`gender`,`email`,`address`) VALUES ('$name','$designation','$department','$gender','$email','$address')";
if ($conn->query($sql) === TRUE) {
                                   echo "<script>alert('Data inserted.');</script>";
                                       } else {
                                           echo "";
                                         }
                                     }
	
?>
<html>
<body>
     <div class="row">
        <div class="col-lg-12">
           <div class="container main">
               <h1>Teacher's Profile</h1>
               <table class="showtable table-hover" border="2">
                <tr>
                      <th>NAME</th>
                      <th>Designation</th>
                      <th>Department</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Action</th>
                 </tr>
<?php
$sql ="SELECT * FROM information";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc())
                                    {
?>
                     <tr>
                             <td> <?php echo $row["name"]?></td>
                             <td> <?php echo $row["designation"]?></td>
                             <td> <?php echo $row["department"]?></td>
                             <td> <?php echo $row["gender"]?></td>
                             <td> <?php echo $row["email"]?></td>
                             <td> <?php echo $row["address"]?></td>
                             <th><a href="update.php?email=<?php echo $row["email"];?>">Edit</a></th>

		 </tr>
					 
<?php
                    }
            }
      else{
                        echo "";
                 }
mysqli_close($conn);
?>
            </table> 
         </div>
     </div>
  </div>
</body>
</html>
