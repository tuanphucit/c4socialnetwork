<?php
	include '../model/Model.php';
	include '../model/UserAccount.php';
	$userID=$_GET["userID"];
	
	//echo $responce;
$model=new Model();
	$user=$model->getUserAccountByID($userID);
	$userName=$user->getUserName();
	//$responce="hello $userName";
	//echo $responce;
	$user->setUserRole(0);
	$model->updateUserAccount($user);
	
	//$model->updatePostApproved($postID,0);
	

?>