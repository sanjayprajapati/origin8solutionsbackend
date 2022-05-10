<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
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
    <link href="assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/theme.css" rel="stylesheet" media="all">

</head>
<body>
    
<div class="page-wrapper">
        <!-- HEADER MOBILE-->
       
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
       
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop-user">
                <div class="section__content ">
                    <div class="container-fluid">
                        <div class="header-wrap">
                           
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['username'];?></a>
                                            <?php echo $_SESSION['email'];?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>Create Profile</h3>
                                        
                                    </div>
                                    <div class="au-task js-list-load">
                                        
                                        <div class="form-wrap">
                                        <?php
                                            require('db.php');

                                            if (isset($_POST['submit'])) {
                                                $email   = $_SESSION['email'];
                                                $appart  = $_POST['appartment_type'];
                                                $query    = "INSERT INTO `appartment` (email, appartment_type) 
                                                            VALUES ('$email', '$appart')";
                                                // $query1    = "INSERT INTO `kitchen` (email, appartment_type) 
                                                //             VALUES ('$email', '$appart')";
                                                // $query3    = "INSERT INTO `appartment` (email, appartment_type) 
                                                //             VALUES ('$email', '$appart')";
                                                
                                                $result  = mysqli_query($con, $query);
                                                // $result1  = mysqli_query($con, $query1);
                                                // $result3  = mysqli_query($con, $query3);
                                                if($result){
                                                    if($appart == 'onebhk'){
                                                        header("Location: onebhk/home.php");
                                                    }
                                                    if($appart == 'twobhk'){
                                                        header("Location: twobhk/home.php");
                                                    }
                                                }else {
                                                    echo "<div class='login-content'>
                                                            <div class='form'>
                                                                <h3>Somthing went wrong</h3><br/>
                                                                <p class='link'>Click here to <a href='createprofile.php'>registration</a> again.</p>
                                                                </div>
                                                        </div>";
                                                }

                                            }else {

                                            
                                        ?>
                                                <form action="" method="post"  class="form-horizontal">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="appartment_type" class=" form-control-label">Appartment Type</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="appartment_type" id="SelectLm" class="form-control-sm form-control">
                                                                <option value="0">Please select</option>
                                                                <option value="onebhk">One BHK</option>
                                                                <option value="twobhk">Two BHK</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                        
                                                        </div>
                                                        <div class="col col-md-9">
                                                            <input value="Submit" name="submit" type="submit" class="btn btn-primary btn-sm">
                                                                
                                                            <button type="reset" class="btn btn-danger btn-sm">
                                                                <i class="fa fa-ban"></i> Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                        <?php }

                                        ?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>
        
      </div>

    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are in user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/vendor/slick/slick.min.js">
    </script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/animsition/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>


</body>
</html>
