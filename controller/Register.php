<?php 
	include '../model/Model.php';
	//include '../model/UserAccount.php'; 
	include 'cookie.php';
?>
<html>
<head><title>Register Page Server</title></head>
<body>


<?php
	$avatar="../user/image01.jpg";
	//Get Form value
	$model=new Model();
	
	

	$userLogin=$_POST["userLogin"];
//  Check trung UserLogin	
	
	$userName=$_POST["userName"];
	$userSex=$_POST["userSex"];
				
	$userSchoolYear=$_POST["userSchoolYear"];  // Kieu String,trong csdl la kieu Int

	$userSeniorID=$_POST["userSeniorID"];      // Kieu String,trong csdl la kieu Int
	      //convert String to Int use (int)$str;
	
	$userPasswordPlain=$_POST["userPassword"]; /// them MD5
	$userPassword=md5($userPasswordPlain);
	$userEmail=$_POST["userEmail"];
	
	$month=$_POST["month"];
	$year=$_POST["year"];
	$day=$_POST["day"];
	$userAvatar=$avatar;
	$userRole=1;     // Role 
	$userStatus=1;       //Status
	$userBirthday="$year-$month-$day";      //// Kieu String,trong csdl la kieu date

	$userID=$model->getID();
// Tao new Object	
	$newUser=new UserAccount($userID,$userPassword,$userLogin,$userName,$userSeniorID
	,$userAvatar,$userRole,$userEmail,$userSchoolYear,$userStatus,$userBirthday,$userSex);
		// Ghi vao CSDL
	
	$check=$model->setNewUser($newUser);
// Check register thanh cong
//Tao thu muc nguoi dung
	$url="../user";          // URL  folder chua thong tin cua nguoi su dung
	mkdir($url."/$userID" , 0755);
	$thisdir="../user/$userID";
	mkdir($thisdir."/avatar" , 0755);
	mkdir($thisdir."/picture" , 0755);
	//var_dump($newUser);
	echo $check;
//Set Cookie
 	//$iduser=new cookie($userID);
 	setcookie("ownID",$userID,time()+3600);
 	setcookie("ownLogin",$userLogin,time()+3600);
 	
 	//        Test
 	Header("Location: ../controller/home.php?id=$userID");                   // Test khi Set = view/HomeTest.php
	//echo $newUser->getUserAvatar();

	
?>
</body>
</html>