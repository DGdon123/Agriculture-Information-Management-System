<?php
    include "connection.php"; // Using database connection file here

    $Email = $_GET['Email']; // get id through query string
 
    $del = "DELETE FROM `updates` where `Email` = '$Email'"; 
    mysqli_query($connect, $del);

    if($del)
    {
        header("location:admindetails.php"); // redirects to all records page
        exit;	
    }
    else
    {
        echo "Error deleting record"; // display error message if not delete
    }
?>