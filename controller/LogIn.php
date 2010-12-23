<?php
include '../model/Model.php';

$userLogin=$_POST['userLogin'];
$userPass=$_POST['userPass'];

$model=new Model();
//$user=new UserAccount();
$user=$model->getUserAccount($userLogin);
$userRole=$user->getUserRole();
if($userRole==0)
{ 
//Header("Location: ../controller/Home.php?id=$userID");
echo "Banned";
}
else{
if(md5($userPass)==$user->getUserPassword()){
	$userID=$user->getUserID();
	setcookie("ownID",$user->getUserID(),time()+3600);
 	setcookie("ownLogin",$user->getUserLogin(),time()+3600);
	Header("Location: ../controller/Home.php?id=$userID");
}
else{
	echo "Sai pass roi";
}
}
?>