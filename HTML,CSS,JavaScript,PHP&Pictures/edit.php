<?php
    include "connection.php"; // Using database connection file here

    $Email = $_GET['Email']; // get id through query string
 
    $update = "UPDATE `updates` SET `FullName` = '$FullName', `Email` = '$Email', `PhoneNumber` = '$PhoneNumber', `Province` = '$Province', `WardNo` = '$WardNo', `FamilyMembers` = '$FamilyMembers', `CropsName` = '$CropsName', `Passwords` = '$Passwords' where `Email` = '$Email'"; 
    mysqli_query($connect, $update);

    if($update)
    {
        header("location:admindetails.php"); // redirects to all records page
        exit;	
    }
    else
    {
        echo "Error deleting record"; // display error message if not delete
    }
?>