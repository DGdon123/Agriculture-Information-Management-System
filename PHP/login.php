<?php      
    include('connection.php');  
    $Email = $_POST['Email'];  
    $Password = $_POST['Password'];  
      
        //Preventing from mysqli injection 
        $Email = stripcslashes($Email);  
        $Password = stripcslashes($Password);  
        $Email = mysqli_real_escape_string($con, $Email);  
        $Password = mysqli_real_escape_string($con, $Password);  
      
        $sql = "select * from registration where Email = '$Email' and Password = '$Password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
         
        //Using if statement to check $count == 1
        if($count == 1)
        {  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else
        {  
            echo "<h1> Login failed. Invalid Email or Password.</h1>";  
        }     
?>  