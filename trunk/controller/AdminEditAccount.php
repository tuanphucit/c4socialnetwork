<?php
	include '../model/Model.php';
	$model=new Model();
	$allUserBanned=$model->getBannedUserAccount();
	foreach($allUserBanned as $item)
	{
		$allUserBannedID[]=$item->getUserID();
		$allUserBannedName[]=$item->getUserName();
		$allUserBannedAvatar[]=$item->getUserAvatar();
	}
	include '../view/AdminEditAccount.php';
?>