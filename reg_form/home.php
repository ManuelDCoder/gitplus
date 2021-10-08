<?php

include "./controller.php";
include "./connection.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./home.css">
</head>
<body>

    <div class="backhome">
        <li>
            <a href="./index.php">Home</a>
            <a href="./search.php">Search</a>
        </li>
    </div>
    
    
    <h1>Registered Members</h1>
        <div class="dashboard">
            <div class="reg_members">
                <table class="demo">
                    <tr>
                        <th colspan="2">Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Location</th>
                        <th>Region</th>
                    </tr>

                        <?php 

                            while($row = mysqli_fetch_assoc($getData))
                            {
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['first_name'] ?></td>
                            <td><?php echo $row['last_name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['location'] ?></td>
                            <td><?php echo $row['region'] ?></td>
                            
                        </tr>  
                        <?php
                            }
                        ?>
                </table>
            </div>

            <div class="memberInfo">
                <table class="demo">
                    <tr>
                        <th>Number of registerd members</th>
                        <th>Number of Females</th>
                        <th>Number of Males</th>
                    </tr>

                    <tr>
                        <td><?php echo $totalRows ?></td>
                        <td><?php echo $totalFemales ?></td>
                        <td><?php echo $totalMales ?></td>
                    </tr>
                </table>
            </div>
        </div>
    
    
</body>
</html>