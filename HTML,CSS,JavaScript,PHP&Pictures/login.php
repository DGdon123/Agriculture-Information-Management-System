<?php      
    include('connection.php');  
    $Email = $_POST['Email'];  
    $Password = $_POST['Password']; 
    
    //Preventing from mysqli injection  
    $Email = stripcslashes($Email);  
    $Password = stripcslashes($Password);  
    $Email = mysqli_real_escape_string($connect, $Email);  
    $Password = mysqli_real_escape_string($connect, $Password);  
  
    $sql = "select * from registration where Email = '$Email' and Password = '$Password'";  
    $result = mysqli_query($connect, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  

    //Using if statement to check ($count == 1)
    if($count == 1)
    {  
        echo '<script type="text/JavaScript"> 
        window.location = "home.html" 
        </script>'
        ;
    }  
    else
    {  
        echo "
        <script>alert('Login Failed!! Invalid Email or Password.')</script>
        <script> 
        window.location = 'LoginPage.html' 
        </script>"
        ;
    }    
?>
