<?php
error_reporting(0);
include_once "controller.php";
include "./model.php";
$d= new Controller();
$m= new Model();
$id=$_GET['id'];
$query=$d->select("registration","reg_id=$id");
$row= mysqli_fetch_array($query);
?>
<head><title>Update</title></head>
<script type="text/javascript">
            function chekmail() {
                var email = document.data.email.value;
                    var atpos = email.indexOf("@");
                    var dotpos = email.indexOf(".");
                    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.lenght){
                        alert("unvalid email");
                         return false;}
                 }  
                 
            function numberonly(e){
                var unicode = e.charCode?e.charCode:e.keyCode;
                  if (unicode != 8){
                       if (unicode < 46 || unicode > 96)
                       return false;}
               }
               
            function charteronly(e){
                var unicode = e.charCode?e.charCode:e.keyCode;
                    if (unicode != 8){
                        if (unicode < 48 || unicode < 97)
                 return false;}
         }
            function checkpass(){
                var pass=document.data.password.value;
                var cpass=document.data.cpassword.value;
                if(cpass==pass)
                    return true
                else
                    alert("worng re-password");
                    return false;
            }
</script>
<center>
    <h1>Update recored</h1>
    <form method="post" name="data" action="update.php" enctype="multipart/form-data">
            <table >
                <input type="hidden" name="id" value="<?php echo $row[0];?>">
                <input type="hidden" name="oldimage" value="<?php echo $row[7];?>">
                <tr>
                    <td>First Name:-</td>
                    <td><input type="text" name="fname" id="fname" value="<?php echo $row[1];?>" onkeypress="return charteronly(event); " required  ></td>
                </tr>
                 <tr>
                    <td>Last Name:-</td>
                    <td><input type="text" name="lname" id="lname" required value="<?php echo $row[2];?>" onkeypress="return charteronly(event); " ></td>
                </tr>
                 <tr>
                    <td>Gender</td>
				<?php if($row[3]=="m"){?>
					<td><input type="radio" checked=checked name="gender"  value="m" id="" />Male
					<input type="radio" name="gender" id="" value="f" />Female</td>
					<?php } else{?>
					<td><input type="radio"  name="gender"  value="m" id="" />Male
					<input type="radio" checked=checked name="gender" id="" value="f" />Female</td>
					<?php } ?>
                </tr>
                <tr>
                    <td>DOB:-</td>
                    <td><input type="datetime" name="dob" id="dob" value="<?php echo $row[4];?>" required></td>
                </tr>
                 <tr>
                    <td>Email ID:-</td>
                    <td><input type="text" name="email" id="email" value="<?php echo $row[5];?>" onchange="return chekmail();" required></td>
                </tr>
                 <tr>
                    <td>Mobile No.:-</td>
                    <td><input type="text" name="mobile" id="mobile" maxlength="10" value="<?php echo $row[6];?>" onkeypress="return numberonly(event);" required> </td>
                </tr>
                <tr>
                    <td>Profile Photo:-</td>
                    <td><input type="file" name="image" height="100" size="2mb" width="100"</td>
                </tr>
                 <tr>
                    <td>Address:-</td>
                    <td><textarea name="address" cols="15" rows="5" id="address"><?php echo $row[8];?></textarea></td>
                </tr>
                <tr>
                    <td>Username:-</td>
                    <td><input type="text" name="username" id="username" value="<?php echo $row[9];?>" onkeypress="return charteronly(event);" required> </td>
                </tr> 
                <tr>
                    <td>Password:-</td>
                    <td><input type="password" name="password" id="password" value="<?php echo $row[10];?>"  required> </td>
                </tr>   
                <tr>
                    <td>Conform Password:-</td>
                    <td><input type="password" name="cpassword" id="cpassword" value="<?php echo $row[10] ; ?>" onchange="return checkpass();" required> </td>
                </tr>          
                 <tr>
                    <td>Skill:-</td>
                    <td>
                     
              <?php   $old=array('html5','css3','php','asp.net','java','javascript');
                           $skill=explode(",",$row[11]);
                           for($i=0;$i<count($old);$i++){
                              if(in_array($skill[$i], $old))
                                 echo" <input type='checkbox'  checked ='checked'  name='skill[]'  value='$old[$i]'/>".$old[$i]."<br/>";
                             else                                
                                echo" <input type='checkbox' name='skill[]'  value='$old[$i]'/>".$old[$i]."<br/>"; } ?>
                    <td>
                </tr>
                <tr>
                    <td>Hobby:-</td>
                    <td><select name="hobby[]" multiple="multiple"> 
                            
                         <?php $oldhoby=array('progaming','designing','reading','learning');
                            $hobby=  explode(",",$row[12]);
                           for($j=0;$j<count($oldhoby);$j++){
				if(in_array($hobby[$j],$oldhoby)){
                                	echo"<option selected=selected value='$oldhoby[$j]'>".$oldhoby[$j]."</option>";}
				else{
                                    echo"<option value='$oldhoby[$j]'>".$oldhoby[$j]."</option>"; }
                           } ?> 
                        </select></td></tr>
                 <tr>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
                
            </table>
    </form>