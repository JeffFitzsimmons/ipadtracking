<?php
require ('dbLoginlocal.php');

$pid = mysqli_real_escape_string($mysqli, $_POST['pid']);

$query = "SELECT Last_Name FROM students WHERE PID = '$pid' LIMIT 1";

if ($result = mysqli_query($mysqli, $query)) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["Last_Name"];
    }
}

?>
