<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "admin";  
    
    //Connecting to mysql database using the mysqli_connect function
    $connect = mysqli_connect($host, $user, $password, $db_name);  
    //Using if(mysqli_connect_errno()) to check the connection of PHP and mysql database
    if(mysqli_connect_errno()) 
    {  
        //Using die function to exit from the program
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  