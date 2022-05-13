<?php
include("famdetails.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
   <link rel="stylesheet" href="CSS/deatils.css">
</head>
<body>
    <form action="famdetails.php" method="post">
        <!--Home Page Header-->
    <header>
        <div class="header">
        <div class="h-log">
            <img src="pictures/logo.png" class="logo">
           <h4 class="tex"><b>Life is Short Play in Dirt</b></h4>
        </div>
        <br>
        <!--header's Navigation-->
            <div class="navga">
                <ul>
                    <li>
                        <a href="home.html">Home</a>
                    </li>
                    <li>
                        <a href="home.html#product">Products</a>
                    </li>
                    <li>
                        <a href="user.php">Farmer Details</a>
                    </li>
                    <li>
                        <a href="home.html#section-team">Our Team</a>
                    </li>
                    <li>
                        <a href="home.html#contact-section">Contact Us</a>
                    </li>
                </ul>            
            </div>
        </div>
    </header>
        <!--Header- Side Navigation Bar-->
    <div id="sideNav">
        <nav>
            <ul>
                <li><a href="user.html">My Profile</li>
                <li><a href="home.html">Home</li>
                <li><a href="user.php">Farmer Details</li>
                <li><a href="home.html#section.team">Our Team</li>
                <li><a href="LoginPage.html">Log Out</li>
            </ul>
        </nav>
    </div>
    <div id="menubtn">
        <a href="user.html">
        <img src="Pictures/user.png" id="menu"></a>
    </div>
    <script>
        var menubtn = document.getElementById("menubtn")
        var sideNav = document.getElementById("sideNav")
        var menu = document.getElementById("menu")
        menubtn.onclick =function(){
            if(sideNav.style.right =="-250px"){
                sideNav.style.right = "0";
            }
            else{
                sideNav.style.right ="-250px";
            }
        }
    </script>
    <table>
    <caption>Users of AGRO</caption>
        <tr>
            <th>S.No</th>
            <th>Full Name </th>
            <th>Email </th>
            <th>Phone Number</th>
            <th>Province</th>
            <th>Ward Number</th>
            <th>Family Members</th>
            <th>Crops Name </th>
        </tr>
        <tbody>
        <?php
            if(is_array($fetchData))
            {      
                foreach($fetchData as $data)
                {
                    ?>
                    <tr>
                    <td><?php echo $data['SNo']??''; ?></td>
                    <td><?php echo $data['FullName']??''; ?></td>
                    <td><?php echo $data['Email']??''; ?></td>
                    <td><?php echo $data['PhoneNumber']??''; ?></td>
                    <td><?php echo $data['Province']??''; ?></td>
                    <td><?php echo $data['WardNo']??''; ?></td>
                    <td><?php echo $data['FamilyMembers']??''; ?></td>
                    <td><?php echo $data['CropsName']??''; ?></td>
                    </tr>
                    <?php
                }
            }
            else
            { 
                ?>
                <tr>
                <td colspan="8">
                <?php echo $fetchData; ?>
                </td>
                <tr>
                <?php
            }?>
        </tbody>
    </table> 
    </form>
    <form method='post' action='export.php'>
    <input type='submit' value='Download csv file' name='Download csv file'>
        <?php 
            $query = "SELECT * FROM `updates` ORDER BY SNo asc";
            $result = mysqli_query($connect,$query);
            $user_arr = array();
            while($row = mysqli_fetch_array($result))
            {
                $SNo = $row['SNo'];
                $FullName = $row['FullName'];
                $Email = $row['Email'];
                $PhoneNumber = $row['PhoneNumber'];
                $Province = $row['Province'];
                $WardNo = $row['WardNo'];
                $FamilyMembers = $row['FamilyMembers'];
                $CropsName = $row['CropsName'];
                $user_arr[] = array($SNo,$FullName,$Email,$PhoneNumber,$Province,$WardNo,$FamilyMembers,$CropsName);
            }
        ?>
        <?php 
            $serialize_user_arr = serialize($user_arr);
        ?>
        <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
    </form>
<div class="download">
    <div class="print">
        <button class="print" onClick="window.print()">Print</button>
</div>
<a href="LoginPage.html">
    <div class="out">
        <button>Log Out</button>
    </div>
</a>   
</body>
</html>
