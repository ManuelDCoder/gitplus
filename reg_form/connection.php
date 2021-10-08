<?php

    $connection = mysqli_connect("localhost", "manuel", "1234", "db_membership");

    if (!$connection) {
        echo 'Database not conected: ' . mysqli_connect_error();
    }

?>