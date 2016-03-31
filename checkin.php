<?php
session_start();

if(empty($_SESSION['login_user'])){
    header("location: index.php");
}

include ('header.php');
include ('dbloginlocal.php');

// Show modal if device is already checked out
$deviceIn = false;
if (isset($_GET['deviceIn'])) {
    $deviceIn = true;
}

// Fill Device Names from database
$fillOptions = mysqli_query($mysqli, "SELECT Device_Name, Device_ID FROM devices");

// Only process the form if $_POST isn't empty
if (!empty($_POST)) {

    $pid = mysqli_real_escape_string($mysqli, $_POST['pid']);
    $device = mysqli_real_escape_string($mysqli, $_POST['device']);
    $checkInDate = mysqli_real_escape_string($mysqli, $_POST['checkInDate']);
    $comments = mysqli_real_escape_string($mysqli, $_POST['comments']);

    // Check if device is checked out
    $query = mysqli_query($mysqli, "SELECT Checked_Out FROM devices WHERE Device_ID = '$device' AND Checked_Out = 'No'");

    if ($query) {
        if (mysqli_num_rows($query) == 0) {
            $update = mysqli_query($mysqli, "UPDATE history SET Check_In_Date = '$checkInDate', Comments = '$comments' WHERE PID = '$pid' AND Device_ID = '$device'");

            $update2 = mysqli_query($mysqli, "UPDATE devices SET Checked_Out = 'No' WHERE Device_ID = '$device'");

            $delete = mysqli_query($mysqli, "DELETE FROM checkout WHERE PID = '$pid' AND Device_ID = '$device'");
        }
        else {
            header("Location: checkin.php?deviceIn=true");
            exit();
        }
    }

    mysqli_close($mysqli);
    header("location: ./main.php");
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

    <title>Check In</title>

    <!-- Bootstrap/Font Awesome/Custom CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container add-padding">
        <form method="post" action="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="pid" class="col-sm-3 control-label">PID</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="pid" name="pid" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="device" class="col-sm-3 control-label">Device ID</label>
                            <div class="col-sm-9">
                                <select id="device" name="device" class="selectpicker" data-live-search="true" data-width="100%" required>
                                    <?php
                                    while ($row = mysqli_fetch_array($fillOptions)){
                                        echo "<option value=" . $row['Device_ID'] . ">" . $row['Device_Name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="checkInDate" class="col-sm-3 control-label">Check In Date</label>
                            <div class="col-sm-9">
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="checkInDate" name="checkInDate" required title="Please select a check out date"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Comments</label>
                            <div class="col-sm-9">
                                <textarea id="comments" name="comments" class="form-control" rows="4" placeholder="Add a comment here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row text-center">
                <input name="submit" type="submit" class="btn btn-lg btn-primary" value="Check In">
            </div>
        </form>
    </div>

    <!-- Javascript -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/custom.js"></script>

    <?php include ("modals.php"); ?>

    <?php if($deviceIn):?>
        <script> $('#deviceInModal').modal('show');</script>
    <?php endif;?>

</body>

</html>
