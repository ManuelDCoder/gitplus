<?php 

// session_start();
include "./connection.php";
include "./controller.php";


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>
    
    <form action="" method="POST">
        <div class="form_registration">
            <!-- <div class="left">

            </div> -->

            <div class="register">
                <div class="top">
                    <p>
                        Registration form
                    </p>
                </div>
                <div class="bottom">
                    <span>
                        <?php echo $_SESSION['success'] ?>
                    </span>
                    <span>
                        <?php echo $_SESSION['error'] ?>
                    </span>
                    <div class="name">
                        <input type="text" name="firstname" placeholder="First Name" value="<?php if (isset($_POST['firstname'])) {
                            echo $_POST['firstname'];
                        } ?>">
                            <span>
                                <?php if(empty($_POST['firstname'])){echo $_SESSION['required'];} ?>
                            </span>
                        <input type="text" name="lastname" placeholder="Last Name" value="<?php if (isset($_POST['lastname'])) {
                            echo $_POST['lastname'];
                        } ?>" >
                            <span>
                                <?php if(empty($_POST['lastname'])){echo $_SESSION['required'];} ?>
                            </span>
                    </div>

                    <div class="email_gender">
                        <input type="email" name="email" placeholder="Email" value="<?php if (isset($_POST['email'])) {
                            echo $_POST['email'];
                        } ?>">
                            <span>
                                <?php if(empty($_POST['email'])){echo $_SESSION['required'];} ?>
                            </span>
                        <select name="gender" value="<?php if (isset($_POST['gender'])) {
                            echo $_POST['gender'];
                        } ?>" required>
                            <option value="Null" disabled selected>-- Gender --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>

                            <span>
                            <?php echo $_SESSION['err'] ?>
                        </span>
                        </select>
                        
                        <!-- <input type="text" name="gender" placeholder="Gender" "> -->
                        <input type="tel" name="contact" placeholder="contact" value="<?php if (isset($_POST['contact'])) {
                            echo $_POST['contact'];
                        } ?>">
                        <span>
                            <?php if(empty($_POST['contact'])){echo $_SESSION['required'];} ?>
                        </span>
                    </div>

                    <div class="location">
                        <input type="text" name="location" placeholder="Location" value="<?php if (isset($_POST['location'])) {
                            echo $_POST['location'];
                        } ?>">
                            <span>
                                <?php if(empty($_POST['location'])){echo $_SESSION['required'];} ?>
                            </span>
                        <input type="text" name="region" placeholder="Region" value="<?php if (isset($_POST['region'])) {
                            echo $_POST['region'];
                        } ?>">
                            <span>
                                <?php if(empty($_POST['region'])){echo $_SESSION['required'];} ?>
                            </span>
                    </div>

                    <input type="submit" name="submit" value="submit">
                </div>
            </div>
        </div>
    </form>

</body>
</html> 