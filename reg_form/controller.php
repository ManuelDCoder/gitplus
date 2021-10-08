<?php

session_start();
include "./connection.php";
$_SESSION['error'] = "";
$_SESSION['required'] = "";
$_SESSION['success'] = "";
$_SESSION['err'] = "";


    // INSERTION AND AUTHENTICATION

        if (isset($_POST['submit'])) {                        
                $firstname = trim($_POST['firstname']);
                $lastname = trim($_POST['lastname']);
                $email = trim($_POST['email']);
                $gender = $_POST['gender'];
                $contact = trim($_POST['contact']);
                $location = trim($_POST['location']);
                $region = trim($_POST['region']);
            
                
                if(empty($firstname) || empty($lastname) || empty($email) || empty($contact) || empty($location) || empty($region)){
                    $_SESSION['required'] = "*";

                    if (isset($_POST['gender'])) {
                        if (isset($_POST['gender']) == "Null") {
                            $_SESSION['err'] = "Select gender";

                        }
                        else echo $_POST['gender'];
                    }
                    
                }
                else{
                        $sql = mysqli_query($connection, "SELECT email,phone FROM tblmember where email = '$email' AND phone='$contact'");
                        if (mysqli_num_rows($sql)) {
                        $_SESSION['error'] = "Email already exits";
                            
                    }
                    else {

                        if(mysqli_num_rows($sql)){
                            $_SESSION['error'] = "Contact already exist";
                        }else{
                            $sql = "INSERT INTO `tblmember` (`first_name`, `last_name`, `email`, `gender`, `phone`, `location`, `region`) 
                            VALUES ('$firstname', '$lastname', '$email', '$gender', '$contact', '$location', '$region')";

                    $insert = mysqli_query($connection, $sql);

                    if($insert){
                        $_SESSION['success'] = "Registratered";
                        header("location: ./home.php");
                    }else{
                        $_SESSION['error'] = "registration Failed";
                     }
                        }
                            
                    }
            }     
    }
       
    // FETCHING DATA

    $getData = mysqli_query($connection, "SELECT * FROM tblmember ORDER BY first_name ASC");
    
    // Displaying Number of registered members
    $totalRows = mysqli_num_rows($getData);
    // echo "Number of Registered Members: " . $totalRows . "<br/>";

    // Getting all females 
    $getFemales = mysqli_query($connection, "SELECT * FROM tblmember WHERE gender = 'female'");
    $totalFemales = mysqli_num_rows($getFemales);
    // echo "Number of females: " . $totalFemales . "<br/>";

    // Getting all males
    $getMales = mysqli_query($connection, "SELECT * FROM tblmember WHERE gender = 'male'");
    $totalMales = mysqli_num_rows($getMales);
    // echo "Number of Males: " . $totalMales;

    
    
    
    
?>