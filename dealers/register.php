<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="../assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../assets/css/theme.css" rel="stylesheet" media="all">

</head>
<body class="animsition">
<?php
    require('../db.php');
    // When form submitted, insert values into the database.
    $emailexist = '';
    if (isset($_POST['submit'])) {
        // removes backslashes
        $username = $_POST['username'];
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = $_POST['email'];
        $email    = mysqli_real_escape_string($con, $email);        
        $mobile = $_POST['mobile'];
        $mobile = mysqli_real_escape_string($con, $mobile);
        $cityId = $_POST['cityid'];
        $cityId = mysqli_real_escape_string($con, $cityId);
        $password = $_POST['password'];
        $password = mysqli_real_escape_string($con, $password);
        $cpassword = $_POST['cpassword'];
        $cpassword  = mysqli_real_escape_string($con, $cpassword);
        $token = uniqid();
        //$role      = 0;
        //$token     = uniqid();       
        $sql="select * from dealers where (dealer_email='$email');";
        $res=mysqli_query($con,$sql);
        if (mysqli_num_rows($res) > 0) {
           
                $emailexist= "Email already exists";
        }
        else{
           //echo "alright"; // don't put it here
            if($password == $cpassword){
                echo "ok"; // don't put it here
                $query   = "INSERT INTO `dealers` (dealer_name, dealer_email, mobile, city_id, password, token )
                VALUES ('$username', '$email', '$mobile','$cityId', '". md5($password) ."','$token')";
                
                $result   = mysqli_query($con, $query);
                //$result1   = mysqli_query($con, $query1);
                if ($result) {           
                    echo "<div class='page-wrapper'>
                            <div class='page-content--bge5'>
                                <div class='container'>
                                    <div class='login-wrap'>
                                        <div class='login-content'>
                                            <div class='form'>
                                                <h3>You are registered successfully.</h3><br/>
                                                <p class='link'>Click here to <a href='login.php'>Login</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                } 
            }
        }
        
         
    } 
?>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                Origin8solutions
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                                <div class="form-group">
                                    <label>Dealer Name</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                    <div class="error"><?php echo $emailexist;?></div>
                                </div>
                                <div class="form-group">
                                    <label>Mobile No</label>
                                    <input class="au-input au-input--full" type="tel" name="mobile" placeholder="Enter Mobile No." required>
                                </div>
                                <div class="form-group">
                                    <label>Select City</label>
                                    <select class="au-input au-input--full" name="cityid">
                                        <option value='0'>Select City</option>
                                        <?php 
                                           $sql = "SELECT cities.id ,city_name
                                           FROM  cities
                                           LEFT JOIN dealers
                                          ON cities.id = dealers.city_id WHERE dealers.city_id is null";
                                            $result=mysqli_query($con, $sql);
                                           // $row = mysqli_fetch_assoc($sql);
                                            $i   =1;
                                            //echo json_encode( $row);
                                            while ($row = mysqli_fetch_array($result)) {
                                                //echo $row['id'];
                                                echo "<option value='".$row['id']."'>".$row['city_name']."</potion>";                                              
                                            }
                                            
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" name="cpassword" placeholder="Confirm Password" required>
                                </div>
                                
                                <input class="au-btn au-btn--block au-btn--green m-b-20" type="submit" value="Register" name="submit">
                                
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login.php">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Jquery JS-->
    <script src="../assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../assets/vendor/slick/slick.min.js">
    </script>
    <script src="../assets/vendor/wow/wow.min.js"></script>
    <script src="../assets/vendor/animsition/animsition.min.js"></script>
    <script src="../assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../assets/js/main.js"></script>

</body>
</html>
