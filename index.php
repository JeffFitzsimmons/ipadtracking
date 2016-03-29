<?php
date_default_timezone_set('America/Denver');

include('checkLogin.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
    header("location: main.php");
}

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

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome core CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container login-container">
        <form class="form-signin" method="post" action="">
            <h1>Please Login</h1>
            <br>
            <div class="form-group">
                <input type="text" name="username" id="username" class="form-control" placeholder="User Name" required autofocus>
            </div>

            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <br>

            <div>
                <input name="submit" type="submit" class="btn btn-lg btn-primary" value="Login">
            </div>
            <br><br>

            <div>
                <span><?php echo $error; ?></span>
            </div>
            <br>
        </form>
        <img src="img/main-logo.jpg" class="center-block"></img>
    </div> <!-- /container -->

    <!-- Javascript -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
