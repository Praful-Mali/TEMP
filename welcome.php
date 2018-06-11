<!DOCTYPE HTML>
<?php session_start(); 
    

?>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
   </head>
<body>
    <h1>Welcome to  <?php echo $_SESSION['username']; ?></h1><a href="logout.php" >Logout</a>
<?php
include_once 'controller.php';
include_once 'model.php';
$d = new Controller();
$m = new Model();
$id=$_SESSION['reg_id'];
$q = $d->select('registration', "reg_id='$id'");
$row = mysqli_fetch_array($q);
?>
    <div style="width:500px;height: 100px;">
        <img src="img/<?php echo $row['image'] ?>" width="500" height="200">
    </div>
    <div style=" width: 50%; height: 50%; margin-top:100px;">
    <table>
        <tr><td>Name:-<b><?php echo $row['fname']." ".$row['lname']?></b></td></tr>
        <tr><td>Gender:-<b><?php if($row['gender']=='m'){echo "Male";}else{echo"Female";} ?></b></td></tr>
        <tr><td>Date of Birth:-<b><?php echo $row['dob'] ?></b></td></tr>
        <tr><td>Email:-<b><?php echo $row['email'] ?></b></td></tr>
        <tr><td>mobile:-<b><?php echo $row['mobile'] ?></b></td></tr>
        <tr><td>Address:-<b><?php echo $row['address'] ?></b></td></tr>
        <tr><td>Skill:-<b><?php echo $row['skill'] ?></b></td></tr>
        <tr><td>Hobby:-<b><?php echo $row['hobby'] ?></b></td></tr>
    </table>
    </div>
    <a href="edit.php?id=<?php echo $row[0] ?>"><input type="button" name="edit" value="Update"></a>
</body>
</html>

