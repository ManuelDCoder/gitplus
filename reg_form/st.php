<?php

session_start();
$servername = "localhost";
$username = "manuel";
$password = "1234";
$db = "db_membership";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

// if(isset($_POST['submit'])){
//     echo "submit";
//     $search = $_POST['search'];
//     if(!empty($search)){

//         $sql = "SELECT * FROM tblmember WHERE first_name LIKE '%$search%'";
        
//         $result = $conn->query($sql);
        
//         // if ($result->num_rows > 0){
//         // while($row = $result->fetch_assoc() ){
//         //     if(isset($search)){
//         //         echo $row["first_name"];
//         //     }
//         // }
//         // } else {
//         //     echo "0 records";
//         // }
//     }else{
//         echo "input required";
//     }
// }



?>

<html>
<body>

<form action="" method="post">
    Search <input type="text" name="search"><br>
    <input type ="submit" name="submit">

    
        <table border="2">
        <?php
            if(isset($_POST['submit'])){
                echo "submit";
                $search = $_POST['search'];
                if(!empty($search)){
            
                    $sql = "SELECT * FROM tblmember WHERE first_name OR id or email LIKE '%$search%'";
                    
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)> 0){
                        while($row = mysqli_fetch_assoc($result) ){
                            // if(isset($search)){
                            //     echo $row["first_name"];
                            // }
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
            </tr>
        <?php
            // echo count($result). "Rocords Available";
                
            }
             }else {

                echo "0 records";
            }
        }else{
                echo "input required";
        }
    }
    $conn->close();

        ?>
        </table>
   
</form>

</body>
</html>