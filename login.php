<!DOCTYPE HTML>
<?php
session_start();
if (isset($_SESSION['username'])) 
    header("location:welcome.php");

?>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<center>
    <h1>Please Login......</h1>
    <form method="post">
        <table>
            <tr>
                <td>Username :-</td>
                <td><input type="text" name="uname" id="uname" placeholder="Username" required></td>
            </tr>
            <tr>
                <td>Password :-</td>
                <td><input type="password" name="upass" id="upass" placeholder="Password" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="login" id="submit" value="Login"></td>
            </tr>
        </table>
        
    </form>
</body>
</html>
<?php
include_once 'controller.php';
include_once 'model.php';
$d = new Controller();
$m = new Model();

    if(isset($_POST['login']))
    {
          extract($_POST);
         
    $q = $d->select('registration', 'username="' . $uname . '" and password="' . $upass . '"');
    $data = mysqli_fetch_array($q);
    if($data)
    {
        $_SESSION['username'] = $uname;
        $_SESSION['reg_id']=$data['reg_id'];
        header("location:welcome.php");
    }
    }

?>
