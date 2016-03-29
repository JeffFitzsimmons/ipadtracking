<?php
// Begin session
session_start();

// Connect to MySQL
include ("dbLoginlocal.php");
// include ("dbLogin.php");

if(isset($_SESSION['login_user'])){
    header("location: main.php");
}

$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password incorrect";
    }
    else
    {
        // Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];

        // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($mysqli, $username);
        $password = mysqli_real_escape_string($mysqli, $password);

        // SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query($mysqli, "SELECT * FROM users WHERE Password = '$password' AND Username = '$username'");
        $rows = mysqli_num_rows($query);

        if ($rows == 1) {
            $_SESSION['login_user'] = $username;
            header("location: main.php");
        } else {
            $error = "Username or Password incorrect";
        }
        mysqli_close($mysqli);
    }
}

?>
