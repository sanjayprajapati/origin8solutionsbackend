<?php
    include("auth_session.php");
    include("../db.php");
    $username = '';
    if(isset($_GET['key'])){
        //echo 'YES';
        $sql = "SELECT * FROM users WHERE usertoken='".$_GET['key']."'";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($result);
        $userid=($row['id']);
        $delswitchcontrol = "DELETE FROM switch_controller WHERE users_id= '$userid'";
        $delswitches      = "DELETE FROM switches WHERE user_id= '$userid'";
        $delusers         = "DELETE FROM users WHERE id= '$userid'";
        if(mysqli_query($con,$delswitchcontrol) && mysqli_query($con,$delswitches) && mysqli_query($con,$delusers)){
            echo 'User Delete Successfully';
        }
        //$username = $row['username'];
    }
    //echo $username;
?>