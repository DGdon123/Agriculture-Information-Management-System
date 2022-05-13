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
   <link rel="stylesheet" href="CSS/adminhome.css">
</head>
<body>
    <h1>Farmers of AGRO</h1>
    <form action="famdetails.php" method="post">
    <table>
        <tr>
            <th>S.No</th>
            <th>Full Name </th>
            <th>Email </th>
            <th>Phone Number</th>
            <th>Province</th>
            <th>Ward Number</th>
            <th>Family Members</th>
            <th>Crops Name </th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
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
                    <td><?php echo $data['Passwords']??''; ?></td>  
                    <td><a href="edit.php?Email=<?php echo $data['Email']; ?>">Edit</a></td>
                    <td><a href="delete.php?Email=<?php echo $data['Email']; ?>">Delete</a></td>
                    </tr>
                    <?php
                }
            }
            else
            { 
                ?>
                <tr>
                <td colspan="9">
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
                $Passwords = $row['Passwords'];
                $user_arr[] = array($SNo,$FullName,$Email,$PhoneNumber,$Province,$WardNo,$FamilyMembers,$CropsName,$Passwords);
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
<a href="Adminlog.html">
    <div class="out">
        <button>Log Out</button>
    </div>
</a>   
</body>
</html>
