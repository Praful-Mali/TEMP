<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
	<body>
		<center>
			<h1>Registration From</h1>
			<form method="post" name="data" action="control.php" enctype="multipart/form-data">
				<table >
                <tr>
                    <td>First Name:-</td>
                    <td><input type="text" name="fname" id="fname" maxlength="15" onkeypress="return charteronly(event); " required placeholder="Enter First Name" ></td>
                </tr>
                 <tr>
                    <td>Last Name:-</td>
                    <td><input type="text" name="lname" id="lname" maxlength="15" onkeypress="return charteronly(event); " required placeholder="Enter Last Name" ></td>
                </tr>
                 <tr>
                    <td>Gender:-</td>
                    <td><input type="radio" name="gender" value="m">Male
                        <input type="radio" name="gender" value="f">Female</td>
                </tr>
                <tr>
                    <td>DOB:-</td>
                    <td><input type="datetime" name="dob" id="dob" placeholder="2015/06/29" required></td>
                </tr>
                 <tr>
                    <td>Email ID:-</td>
                    <td><input type="text" name="email" id="email" onchange="return chekmail();" placeholder="Enter Email ID" required></td>
                </tr>
                 <tr>
                    <td>Mobile No.:-</td>
                    <td><input type="text" name="mobile" id="mobile" maxlength="10" onkeypress="return numberonly(event);" placeholder="9876543210"  required> </td>
                </tr>
                <tr>
                    <td>Profile Photo:-</td>
                    <td><input type="file" name="image" height="100" size="2mb" width="100"</td>
                </tr>
                 <tr>
                    <td>Address:-</td>
                    <td><textarea name="address" cols="15" rows="5" placeholder="Address"  id="address"></textarea></td>
                </tr>
                <tr>
                    <td>Username:-</td>
                    <td><input type="text" name="username" id="username" maxlength="15" onkeypress="return charteronly(event);" placeholder="Enter username"  required> </td>
                </tr> 
                <tr>
                    <td>Password:-</td>
                    <td><input type="password" name="password" id="password" placeholder="Enter password"  required> </td>
                </tr>   
                <tr>
                    <td>Conform Password:-</td>
                    <td><input type="password" name="cpassword" id="cpassword" onchange="return checkpass()" placeholder="Enter re-password"  required> </td>
                </tr>          
                 <tr>
                    <td>Skill:-</td>
                    <td>
						<input type="checkbox" name="skill[]" value="html5">HTML5<br/>
                        <input type="checkbox" name="skill[]" value="css3">CSS3<br/>
                        <input type="checkbox" name="skill[]" value="php">PHP<br/>
                        <input type="checkbox" name="skill[]" value="asp.net">ASP.Net<br/>
                        <input type="checkbox" name="skill[]" value="java">JAVA<br/>
                        <input type="checkbox" name="skill[]" value="javascript">JAVAScript<br/>
                    </td>
                </tr>
                <tr>
                    <td>Hobby:-</td>
                    <td>
						<select name="hobby[]" multiple="multiple"> 
                            <option value="progaming">Programming</option>
                            <option value="designing">Designing</option>
                            <option value="reading">Reading</option>
                            <option value="learning">Learning</option>
                            <option value="surfing">surfing </option>
						</select>
					</td>
                </tr>
                
                <tr>
                    <td><input type="submit" name="submit" value="Save"></td>
                </tr>
			<form>
		</center>
	</body>
</html>