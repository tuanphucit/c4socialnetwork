<?php
	include '../model/Model.php';
	$postID=$_GET["postID"];
	//$responce="hello $postID";
	//echo $responce;
	$model=new Model();
	$model->updatePostApproved($postID,0);
	

?>