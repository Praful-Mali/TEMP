<!DOCTYPE HTML>
<?php
session_start();
session_destroy();
error_reporting(0);
include_once 'controller.php';
include_once 'model.php';
$d = new Controller();
$m = new Model();
$result = $d->select('registration', "");
$count= mysqli_num_rows($result);
?>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>Display</title>
    </head>
    <body>
        <table border="1">
            <form name="delete" method="post">
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>D.O.B</th>
                    <th>EMAIL</th>
                    <th>MOBILE</th>
                    <th>ADDRESS</th>
                    <th>USERNAME</th>
                    <th>SKILL</th>
                    <th>HOBBY</th>
                    <th>IMAGE</th>
                    <th colspan="2">ACTION</th></tr>
                <?php
                $i=1;
                while ($row = mysqli_fetch_row($result)) {
                  ?>
                    <tr>
                        <td><input type="checkbox" name="checkbox[]" id="" value=<?php echo $row[0]; ?> /></td>
                        <td><?php echo $i++; ?> </td>
                        <td><?php echo $row[1]."".$row[2]; ?> </td>
                        <td><?php if($row[3]=='m'){echo "male";}else{echo "femal";}  ?> </td>
                        <td><?php echo $row[4]; ?> </td>
                        <td><?php echo $row[5]; ?> </td>
                        <td><?php echo $row[6]; ?> </td>
                        <td><?php echo $row[8]; ?> </td>
                        <td><?php echo $row[9]; ?> </td>
                        <td><?php echo $row[11]; ?> </td>
                        <td><?php echo $row[12]; ?> </td>
                        <td><img src="img/<?php echo $row[7]; ?>" width="50" height="50"/> </td>
                        <td><a href="edit.php?id=<?php echo $row[0] ?>">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $row[0] ?>">Delete</a></td>
                    </tr>
                <?php } ?>
                     
                    <tr>
                        <td colspan="2"> <input type="submit" value="DELETE" name="delete" /></td>
                        <td><input type="submit" value="ADDNEW" name="add" /></td>
                        <td><input type="submit" value="LOGIN" name="login" /></td></tr>
            </form>

        </table>
    </body>
</html>
<?php
if (isset($_POST['delete'])) {
    for ($i = 0; $i < $count; $i++) {
        $checkbox = $_REQUEST['checkbox'];
        $id = $checkbox[$i];
        $delete=$d->delete("registration", "reg_id='$id'");
        if ($delete) {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=display.php\">";
        }
    }
}
if(isset($_POST['add']))
   echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
if(isset($_POST['login']))
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">";
?>