<?php
include 'UserDetail.php';
$ownID=$_COOKIE['ownID'];
$model=new Model();
$friendList=$model->getFriendList($ownID);
	foreach ($friendList as $item)
	{
		$friendName[]= $item->getUserName();
		$friendAvatar[]=$item->getUserAvatar();
		$friendID[]=$item->getUserID();	
	}
include "../view/CreateEvent.php";
?>
	
