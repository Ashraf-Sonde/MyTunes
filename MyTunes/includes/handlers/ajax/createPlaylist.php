<?php
    include("../../config.php");

    if(isset($_POST['name']) and isset($_POST['username'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $date = date("Y-m-d");

        $query = mysqli_query($con, "INSERT INTO playlists VALUES ('', '$name', '$username', '$date')");
    }
    else{
        echo "Name or Username parameter not passed into the file";
    }

?>