<?php

if(!empty($_SESSION['login_user'])){
    header("location: index.php");
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

    <title>Admin</title>

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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel with-nav-tabs">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Home" data-toggle="tab"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="#Devices" data-toggle="tab"><i class="fa fa-tablet"></i> Manage Devices</a></li>
                            <li><a href="#Students" data-toggle="tab"><i class="fa fa-user"></i> Manage Students</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="Home">
                                <div class="btn-group btn-group-lg btn-block">
                                    <a href="checkout.php" class="btn btn-primary col-sm-6" role="button"><i class="fa fa-arrow-up"></i> Check Out</a>
                                    <a href="checkin.php" class="btn btn-primary col-sm-6" role="button"><i class="fa fa-arrow-down"></i> Check In</a>
                                </div>
                                <br></br>

                                <div>
                                    <a href="logout.php" class="btn btn-lg btn-primary" role="button">Logout</a>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="Devices">
                                Content for Device Management
                            </div>

                            <div class="tab-pane fade" id="Students">
                                Content for Student Management
                            </div>
                        </div>
                    </div><!-- /.panel-body -->
                </div>
            </div>
        </div><!-- /.div-row -->
    </div>



    <!-- Javascript -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>

</body>

</html>
