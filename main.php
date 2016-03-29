<?php
session_start();

if(empty($_SESSION['login_user'])){
    header("location: index.php");
}

include ('header.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Welcome</title>

    <!-- Bootstrap/Font Awesome/Custom CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container home-container">
        <div class="btn-group btn-group-lg btn-block">
            <a href="checkout.php" class="btn btn-default col-sm-6" role="button"><i class="fa fa-arrow-up"></i> Check Out</a>
            <a href="checkin.php" class="btn btn-default col-sm-6" role="button"><i class="fa fa-arrow-down"></i> Check In</a>
        </div>
        <br></br>

        <h2 class="text-center">iPad Check In/Check Out System</h2><br>
        <img src="img/main-logo.jpg" class="center-block"></img>

    </div>

    <!-- Javascript -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>

</body>

</html>
