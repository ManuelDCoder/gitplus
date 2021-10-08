<?php
    include "./connection.php";
    // include "./controller.php";

    session_start();
    $_SESSION['search_error'] = "";
    

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        .demo {
            border:1px solid #C0C0C0;
            border-collapse:collapse;
            padding:5px;
        }
        .demo th {
            border:1px solid #C0C0C0;
            padding:5px;
            background:#F0F0F0;
        }
        .demo td {
            border:1px solid #C0C0C0;
            padding:5px;
        }
</style>
<a href="./index.php">Home</a>
<a href="./home.php">Back</a>
<div class="searchBar">
        <form action="" method="POST">
        <label for="">Search</label>
        <input type="text" name="search" value="">
        <input type="submit" name="submit" value="=>">
        </form>
    </div>
    

    

        <table class="demo">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>

        
            <tbody>
        <?php
            if(isset($_POST['submit'])){
                echo "Submiting ";
                $searchField = $_POST['search'];
                if(!empty($searchField)){
        
                    $getData = "SELECT * FROM tblmember WHERE first_name LIKE '%$searchField%'";
                    
                    $result = mysqli_query($connection, $getData);
                    
                    // $ofLastname = mysqli_num_rows($getData);
                    echo " Displaying Queries of:  ". $searchField;
                    echo " Search field has value ". $searchField;
                    
                    echo " Found Queries: "; 
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            // echo $row['id']. $row['first_name'];
                            ?>
                                <tr>
                                    <td><?php echo $row['first_name'] ?></td>
                                    <td><?php echo $row['last_name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                </tr>
                            <?php
                        }
                    } else{
                        echo "No Queries";
                        }
                    }
                    else{
                        echo "Search input required";
                        // $_SESSION['search_error'] = "Search Input Required";
                    }
            }
            mysqli_close($connection);
        ?>
        </table>
</body>
</html>