<?php
session_start();

include ('dbloginlocal.php');

if(empty($_SESSION['login_user'])){
    header("location: index.php");
}

// Fill infromation requested from database
$fillCheckedOut = mysqli_query($mysqli, "SELECT * FROM devices INNER JOIN checkout ON devices.Device_ID = checkout.Device_ID WHERE devices.Checked_Out = 'Yes'");

$search = mysqli_query($mysqli, "SELECT * FROM history INNER JOIN devices ON history.Device_ID = devices.Device_ID");

mysqli_close($mysqli);
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

    <title>Devices</title>

    <!-- Bootstrap/Font Awesome/Custom CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php include ('header.php'); ?>

    <div class="container add-padding">
        <h3 class="text-center">Devices currently checked out</h3><br>
        <table id="deviceTable" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Serial Number</th>
                    <th>Device Name</th>
                    <th>PID</th>
                    <th>Last Name</th>
                    <th>Check Out Date</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($fillCheckedOut)){ ?>
                    <tr>
                        <td><?php echo $row['Device_ID']; ?></td>
                        <td><?php echo $row['Device_Name']; ?></td>
                        <td><?php echo $row['PID']; ?></td>
                        <td><?php echo $row['Last_Name']; ?></td>
                        <td><?php echo $row['Check_Out_Date']; ?></td>
                        <td><?php echo $row['Due_Date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br><br>

        <!-- History view from range selection -->
        <h3 class="text-center">History</h3><br>
        <table id="history" class="table table-striped" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>PID</th>
                    <th>Last Name</th>
                    <th>Serial Number</th>
                    <th>Device Name</th>
                    <th>Check Out Date</th>
                    <th>Due Date</th>
                    <th>Assets</th>
                    <th>Check In Date</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($search)){ ?>
                    <tr>
                        <td><?php echo $row['PID']; ?></td>
                        <td><?php echo $row['Last_Name']; ?></td>
                        <td><?php echo $row['Device_ID']; ?></td>
                        <td><?php echo $row['Device_Name']; ?></td>
                        <td><?php echo $row['Check_Out_Date']; ?></td>
                        <td><?php echo $row['Due_Date']; ?></td>
                        <td><?php echo $row['Assets']; ?></td>
                        <td><?php echo $row['Check_In_Date']; ?></td>
                        <td><?php echo $row['Comments']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <br><br>


    <!-- Javascript -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.table').DataTable();
    });
    </script>

</body>

</html>
