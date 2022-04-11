<?php      
    include('admincon.php');  
    $UserName = $_POST['UserName'];  
    $Password = $_POST['Password'];  
      
        //Preventing from mysqli injection  
        $UserName = stripcslashes($UserName);  
        $Password = stripcslashes($Password);  
        $UserName = mysqli_real_escape_string($connect, $UserName);  
        $Password = mysqli_real_escape_string($connect, $Password);  
      
        $sql = "select * from adminlogin where UserName = '$UserName' and Password = '$Password'";  
        $result = mysqli_query($connect, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        //Using if statement to check ($count == 1)
        if($count == 1)
        {  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else
        {  
            echo "<h1> Login failed. Invalid Username or Password.</h1>";  
        }     
?>  