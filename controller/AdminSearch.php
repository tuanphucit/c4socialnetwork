<?php
	include '../model/Model.php';	
	include '../model/UserAccount.php';
	
	$model=new Model();
	$searchValue=$_POST["searchValue"];
	$allUser=$model->searchUser($searchValue); 
	$allEvent=$model->searchEvent($searchValue); 
	foreach($allUser as $item)
	{
		$allUserID[]=$item->getUserID();
		$allUserAvatar[]=$item->getUserAvatar();
		$allUserName[]=$item->getUserName();
		$allUserRole[]=$item->getUserRole();
	}
	include '../view/AdminSearch.php';  // Trang View_admin
	
?>