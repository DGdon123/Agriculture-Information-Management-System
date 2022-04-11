<?php
	$FullName = $_POST['FullName'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	$PhoneNumber = $_POST['PhoneNumber'];
	$Address = $_POST['Address'];
	$Gender = $_POST['Gender'];
    $DateofBirth = $_POST['DateofBirth'];

	//Establishing connection of database
	$conn = new mysqli('localhost','root','','register');
	//Using if statement to check ($conn->connect_error)
	if($conn->connect_error)
	{
		echo "$conn->connect_error";
		//Using die function to exit from the program
		die("Connection Failed : ". $conn->connect_error);
	} 
	else
	{
		$stmt = $conn->prepare("insert into registration(FullName, Email, Password, PhoneNumber, Address, Gender, DateofBirth) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $FullName, $Email, $Password, $PhoneNumber, $Address, $Gender, $DateofBirth);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>