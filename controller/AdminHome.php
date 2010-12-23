<?php
	include '../model/Model.php';	
	include '../model/Post.php';
	$model=new Model();
	$derogationPostList=$model->getDerogationPostList(); // List Post sai pham,flag=1;
	if($derogationPostList!=null)
	{
		foreach($derogationPostList as $item)
		{
			$derogationPostContent[]=$item->getPostContent();
			$derogationPostID[]=$item->getPostID();
			$derogationPostCreatorID[]=$item->getPostCreator();
			$derogationPostCreator[]=$model->getUserAccountByID($item->getPostCreator())->getUserName();
			$derogationPostCreatorAvatar[]=$model->getUserAccountByID($item->getPostCreator())->getUserAvatar();
		}
	}
	include '../view/AdminHome.php';  // Trang View_admin
	
?>