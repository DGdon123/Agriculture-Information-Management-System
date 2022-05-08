<?php
	$FullName = $_POST['FullName'];
	$Email = $_POST['Email'];
	$PhoneNumber = $_POST['PhoneNumber'];
	$Province = $_POST['Province'];
	$WardNo = $_POST['WardNo'];
    $FamilyMembers = $_POST['FamilyMembers'];
    $CropsName = $_POST['CropsName'];
    $Password = $_POST['Password'];

	//Establishing connection of database
	$conn = new mysqli('localhost','root','','register');
	//Using if statement to check ($con->connect_error)
	if($conn->connect_error)
	{
		echo "$conn->connect_error";
		//Using die function to exit from the program
		die("Connection Failed : ". $conn->connect_error);
	} 
	else
	{	
        // database insert SQL code
        $sql = "INSERT INTO `update` (`FullName`, `Email`, `PhoneNumber`, `Province`, `WardNo`, `FamilyMembers`, `CropsName`, `Password`) VALUES ('$FullName', '$Email', '$PhoneNumber', '$Province', '$WardNo', '$FamilyMembers', '$CropsName', '$Password')";
        // insert in database 
        mysqli_query($conn, $sql);
        echo "Update successfully...";
	}
?>
