<?php 

include_once('controller.php');
include_once('model.php');

$ctr = new Controller();
$m = new Model();

if(isset($_POST['submit'])){

	extract($_POST);
	move_uploaded_file($_FILES['image']['tmp_name'],'img/'.$_FILES['image']['name']);
	$image = $_FILES['image']['name'];
    $hobby=  implode(",", $hobby);
    $skill=  implode(",", $skill);
     
   
    $m->setData("fname", $fname);
    $m->setData("lname", $lname);
    $m->setData("gender", $gender);
    $m->setData("dob", $dob);
    $m->setData("email", $email);
    $m->setData("mobile", $mobile);
    $m->setData("image", $image);
    $m->setData("address", $address);
    $m->setData("username", $username);
    $m->setData("password", $password);
    $m->setData("skill", $skill);
    $m->setData("hobby", $hobby);
	
	 $arry=array("fname" => $m->getData("fname"),
        "lname" => $m->getData("lname"),
        "gender" => $m->getData("gender"),
        "dob" => $m->getData("dob"),
        "email" => $m->getData("email"),
        "mobile" => $m->getData("mobile"),
        "image" => $m->getData("image"),
        "address" => $m->getData("address"),
        "username" => $m->getData("username"),
        "password" => $m->getData("password"),
        "skill" => $m->getData("skill"),
        "hobby" => $m->getData("hobby"));
		
	 $insert=$ctr->insert("registration", $arry);
	
    if($insert)
        header("location:display.php");	
		
	
}



?>