<?php
include "./connection.php";
$search = $_POST['search'];

// $servername = "localhost";
// $username = "bob";
// $password = "123456";
// $db = "classDB";

// $conn = new mysqli($servername, $username, $password, $db);

// if ($conn->connect_error){
	// die("Connection failed: ". $conn->connect_error);
// }

$sql = "select * from tblmember where first_name like '%$search%'";

$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_assoc($result) ){
	echo $row["first_name"];
}
} else {
	echo "0 records";
}

$connection->close();

?>