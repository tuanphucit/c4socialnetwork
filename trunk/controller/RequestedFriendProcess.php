<?php
	include '../model/Model.php';
	$ownID=$_COOKIE["ownID"];
	//setcookie("ownID",$ownID,time()+3600);
	$friendID=$_POST["friendID"];
	$model=new Model();
	if($_POST['accept'])
	{
		$model->confirmFriend($friendID,$ownID);
	}
	if($_POST['deny'])
	{
		$model->refuseFriend($friendID,$ownID);
	}
	Header("Location: ../controller/News.php");
	
?>