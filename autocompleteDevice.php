<?php
require ('dbLoginlocal.php');

$pid = mysqli_real_escape_string($mysqli, $_POST['pid']);

$query = "SELECT * FROM devices INNER JOIN checkout ON devices.Device_ID = checkout.Device_ID WHERE PID = '$pid' LIMIT 1";

if ($result = mysqli_query($mysqli, $query)) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["Device_ID"];
    }
}

?>
