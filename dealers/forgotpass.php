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
    <title>Forget Password</title>

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
<body>
<?php
require('../db.php');
if (isset($_POST['submit']))
{
    
    $to = $_REQUEST['to'];
    echo $to;
    $to = htmlspecialchars($to);
    $host=$_SERVER['SERVER_NAME'];
    $ip=$_SERVER['SERVER_ADDR'];
    $from="sanjay.prajapati80@gmail.com";
    $subject="PHP Mail Test";
    $message=" ";
    $headers="From: $from" . "\r\n" . "Reply-To: sanjay.prajapati80@gmail.com" . "\r\n" . "X-Mailer: PHP/" . phpversion();
    $success=mail($to,$subject,$message,$headers);
    $checkmail = $_REQUEST['to'];
    $sqlCheckmail = "SELECT * FROM dealers WHERE dealer_email='$to'";
    echo $sqlCheckmail;
    $row = mysqli_fetch_assoc($sqlCheckmail);
    echo $row['token']; 
    if(mysqli_num_rows($sqlCheckmail)>0){
        echo 'yes';
        $row =mysqli_fetch_assoc($sqlCheckmail);
        $token=$row['token'];
        $base = "http://$_SERVER[HTTP_HOST]/dealers/resetpass.php?restp="+$token;
       // $url = 
        $message = "$base";
    
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        if (preg_match($regex, $to)) {

            if($success) {
            //echo "The email was sent successfully";
            echo "<div class='page-wrapper'>
            <div class='page-content--bge5'>
                <div class='container'>
                    <div class='login-wrap'>
                        <div class='login-content'>
                <div class='form'>
                <h3>The email was sent successfully</h3><br/>
                <p class='link'>Please check your mail.</p>
                </div>
                </div>
                </div>
                </div>
                </div>";
            }
            else {
            echo "An error occurred, and the email was not sent. Check your domains' error logs and mail log for more info.";
            }

        } 
        else {?>

<div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                Origin8Solutions
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="text" name="to" placeholder="Email">
                                </div>
                                <input class="au-btn au-btn--block au-btn--green m-b-20" name="submit" value="Send Mail" type="submit">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
<?php }
    }
else {?>

    <div class="page-wrapper">
            <div class="page-content--bge5">
                <div class="container">
                    <div class="login-wrap">
                        <div class="login-content">
                            <div class="login-logo">
                                <a href="#">
                                    Origin8Solutions
                                </a>
                            </div>
                            <div class="login-form">
                                <p class="error">Email Not Registerd With Us</p>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input class="au-input au-input--full" type="text" name="to" placeholder="Email">
                                    </div>
                                    <input class="au-btn au-btn--block au-btn--green m-b-20" name="submit" value="Send Mail" type="submit">
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    
    <?php }
}
else
{ 
?>
<div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                Origin8Solutions
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="text" name="to" placeholder="Email">
                                </div>
                                <input class="au-btn au-btn--block au-btn--green m-b-20" name="submit" value="Send Mail" type="submit">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php }

?>
</body>
</html>
