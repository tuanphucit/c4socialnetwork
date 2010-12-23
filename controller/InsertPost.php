<?php
date_default_timezone_set("	Asia/Ho_Chi_Minh");
include '../model/Model.php';
//include '../model/Post.php';

$content=$_POST['comment'];
$id=$_COOKIE["ownID"];
$curtime=date("y-m-d H:i:s");
$desID=$_COOKIE["desID"];
$model=new Model();
$postID=$model->getPostID();
$post=new Post($postID,$desID,$id,'0',$curtime,$content,'','0','1');
$check=$model->setNewPost($post);
$user=$model->getUserAccountByID($id);
//echo $content;

$userAvatar=$user->getUserAvatar();
$userName=$user->getUserName();

$datas="$postID:$userName:$userAvatar";
echo $datas;
//echo $userName;
//echo $userAvatar;

//echo ("$userName:$userAvatar");
//$date_added = time();
//$date_added = date("l j F Y, g:i a",time());

	//if($check)
	//	echo $date_added;
	//else
	//	echo "0";
?>

