<?php
	$ownID=$_COOKIE["ownID"];
	setcookie("ownID",$ownID,time()-3600);
	Header("Location: ../index.html");
?>