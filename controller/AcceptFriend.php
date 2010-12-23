<?php
	include '../model/Model.php';
	$ownID=$_COOKIE["ownID"];
	//setcookie("ownID",$ownID,time()+3600);
	$friendID=$_POST["friendID"];
	$model=new Model();
	$model->confirmFriend($friendID,$ownID);
	Header("Location: ../controller/News.php");
	
?>